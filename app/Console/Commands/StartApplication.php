<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class StartApplication extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:app';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs the application';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Execute multiple commands sequentially
        $this->call('serve');
        $this->call('queue:work');

        // Add more commands as needed

        $this->info('Application started.');
    }
}
