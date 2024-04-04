<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class CreateDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $database = "convertedin";
        $username = config('database.connections.mysql.username');
        $password = config('database.connections.mysql.password');


        $connection = DB::connection('mysql');


        $connection->statement("CREATE DATABASE IF NOT EXISTS $database CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

        Config::set('database.connections.mysql.database', $database);

        $this->info("Database '$database' created successfully.");
    }
}
