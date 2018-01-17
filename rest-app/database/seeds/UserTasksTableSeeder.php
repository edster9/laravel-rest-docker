<?php

use Illuminate\Database\Seeder;
use App\UserTask;

class UserTasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usertasks')->delete();

        $userTasks = [
            ['id' => 1, 'task_id' => '1', 'user_id' => '1'],
            ['id' => 2, 'task_id' => '2', 'user_id' => '1'],
            ['id' => 3, 'task_id' => '3', 'user_id' => '1'],
            ['id' => 4, 'task_id' => '4', 'user_id' => '1']
        ];

        UserTask::insert($userTasks);
    }
}

