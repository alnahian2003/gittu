<?php

namespace App\Http\Controllers;

use App\Models\Repository;
use Illuminate\Support\Facades\Http;

class RepositoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $repositories = cache()->remember('top-repos', now()->addMinutes(60), fn () => Repository::all());

        return view('repositories.index', ['repositories' => $repositories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        // Get Repos from API
        $repos = Http::get('https://api.github.com/search/repositories', [
            'q' => 'stars:>1',
            'sort' => 'stars',
            'order' => 'desc',
        ]);

        // If repos is OK then Store them in the database
        if ($repos->successful()) {
            info('Attempting to Store Repos');

            // Invalidate the cache before updating repos.
            cache()->delete('repos');

            foreach ($repos->collect('items') as $repoData) {
                Repository::updateOrCreate(
                    ['name' => $repoData['name']],
                    [
                        'name' => $repoData['name'],
                        'description' => $repoData['description'],
                        'url' => $repoData['svn_url'],
                        'stars_count' => $repoData['stargazers_count'],
                        'topics' => array_slice($repoData['topics'], 0, 5),
                        'owner_name' => $repoData['owner']['login'],
                        'owner_avatar' => $repoData['owner']['avatar_url'],
                        'owner_url' => $repoData['owner']['html_url'],
                        'owner_type' => $repoData['owner']['type'],
                    ]
                );
            }

            info('Repos Stored Successfully!');
        }

        if ($repos->failed()) {
            logger()->error('Something went wrong!');
        }
    }
}
