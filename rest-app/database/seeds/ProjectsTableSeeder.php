<?php

use Illuminate\Database\Seeder;
use App\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->delete();

        //factory(App\Project::class, 30)->create();

        $projects = [
            [
                'id' => 1, 
                'name' => 'project 1', 
                'created_at' => '2018-01-18',
                'updated_at' => '2018-01-18'
            ],
            [
                'id' => 2, 
                'name' => 'project 2', 
                'created_at' => '2018-01-18',
                'updated_at' => '2018-01-18'
            ],
            [
                'id' => 3, 
                'name' => 'project 3', 
                'created_at' => '2018-01-18',
                'updated_at' => '2018-01-18'
            ],
            [
                'id' => 4, 
                'name' => 'project 4', 
                'created_at' => '2018-01-18',
                'updated_at' => '2018-01-18'
            ],
            [
                'id' => 5, 
                'name' => 'project 5', 
                'created_at' => '2018-01-18',
                'updated_at' => '2018-01-18'
            ],
            [
                'id' => 6, 
                'name' => 'project 6', 
                'created_at' => '2018-01-18',
                'updated_at' => '2018-01-18'
            ],
            [
                'id' => 7, 
                'name' => 'project 7', 
                'created_at' => '2018-01-18',
                'updated_at' => '2018-01-18'
            ],
            [
                'id' => 8, 
                'name' => 'project 8', 
                'created_at' => '2018-01-18',
                'updated_at' => '2018-01-18'
            ],
            [
                'id' => 9, 
                'name' => 'project 9', 
                'created_at' => '2018-01-18',
                'updated_at' => '2018-01-18'
            ]
        ];

        Project::insert($projects);
    }
}
