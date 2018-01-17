<?php

use Illuminate\Database\Seeder;

// Ed was here
//use Database\Seeds\ArticlesTableSeeder;

// you need this for the seeder to run
require 'UsersTableSeeder.php';
require 'ProjectsTableSeeder.php';
require 'TasksTableSeeder.php';
require 'UserTasksTableSeeder.php';

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(TasksTableSeeder::class);
        $this->call(UserTasksTableSeeder::class);
    }
}
