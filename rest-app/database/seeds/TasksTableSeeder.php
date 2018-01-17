<?php

use Illuminate\Database\Seeder;
use App\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->delete();

        $tasks = [
            [
                'id' => 1, 
                'name' => 'task 1-1', 
                'summary' => 'task', 
                'description' => 'task', 
                'status' => 'new', 
                'priority' => 1, 
                'due_dt' => '2018-02-01', 
                'project_id' => 1,
                'created_at' => '2018-01-18',
                'updated_at' => '2018-01-18'
            ],
            [
                'id' => 2, 
                'name' => 'task 2-1', 
                'summary' => 'task', 
                'description' => 'task', 
                'status' => 'new', 
                'priority' => 1, 
                'due_dt' => '2018-02-01', 
                'project_id' => 1,
                'created_at' => '2018-01-18',
                'updated_at' => '2018-01-18'
            ],
            [
                'id' => 3, 
                'name' => 'task 3-1', 
                'summary' => 'task', 
                'description' => 'task', 
                'status' => 'new', 
                'priority' => 1, 
                'due_dt' => '2018-02-05', 
                'project_id' => 1,
                'created_at' => '2018-01-18',
                'updated_at' => '2018-01-18'
            ],
            [
                'id' => 4, 
                'name' => 'task 4-2', 
                'summary' => 'task', 
                'description' => 'task', 
                'status' => 'new', 
                'priority' => 3, 
                'due_dt' => '2018-02-06', 
                'project_id' => 2,
                'created_at' => '2018-01-18',
                'updated_at' => '2018-01-18'
            ],
            [
                'id' => 5, 
                'name' => 'task 5-3', 
                'summary' => 'task', 
                'description' => 'task', 
                'status' => 'new', 
                'priority' => 2, 
                'due_dt' => '2018-02-07', 
                'project_id' => 3,
                'created_at' => '2018-01-18',
                'updated_at' => '2018-01-18'
            ]
        ];

        Task::insert($tasks);
    }
}
