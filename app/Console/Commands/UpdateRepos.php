<?php

namespace App\Console\Commands;

use App\Http\Controllers\RepositoryController;
use Illuminate\Console\Command;

class UpdateRepos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'repos:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update or create top Github repositories.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->line('Updating Repositories...');

        $repoController = new RepositoryController();
        $repoController->store();

        $this->info('Repositories are now updated');
    }
}
