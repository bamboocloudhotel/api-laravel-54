<?php

namespace App\Console\Commands;

use App\Http\Controllers\RategainRequestController;
use Illuminate\Console\Command;

class RemoveOld extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rategain:remove_old';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove old rategain request from the database.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        RategainRequestController::removeOld();
        RategainRequestController::removeOldInventoryUpdates();
        RategainRequestController::removeOldBackups();
    }
}
