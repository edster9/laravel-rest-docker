<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $users = [
            [
                'id' => 1, 
                'first_name' => 'first', 
                'last_name' => 'last', 
                'email' => 'name1@maverick.com', 
                'password' => '$2y$10$E.FAqdTPmnsEvZ6I9CDc.e8JNoaLF6GKyd691qEeKY4Jqzbm9HpiW', 
                'remember_token' => '', 
                'created_at' => '2018-01-18',
                'updated_at' => '2018-01-18'
            ]
        ];

        User::insert($users);
    }
}
