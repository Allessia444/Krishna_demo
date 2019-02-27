<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '1',
            'department_id' => '3',
            'designation_id' => '1',
            'role' => 'user',
            'name' => 'Ravi Mehta',
            'email' => 'user@gmail.com',
            'password' => Hash::make('krishna'),
            'middle_name' => 'C',
            'last_name' => 'Chavda',
            'active' => '1',
            'team_lied' => '1',
            'created_at' => '2018-07-16 05:48:24',
            'updated_at' => '2018-07-16 05:48:24',
        ]);
        DB::table('users')->insert([
            'id' => '2',
            'department_id' => '3',
            'designation_id' => '2',
            'role' => 'user',
            'name' => 'Krishna Chavda',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('krishna'),
            'middle_name' => 'C',
            'last_name' => 'Chavda',
           	'active' => '1',
            'team_lied' => '0',
            'created_at' => '2018-07-16 05:48:24',
            'updated_at' => '2018-07-16 05:48:24',
        ]);
        DB::table('users')->insert([
            'id' => '3',
            'department_id' => '3',
            'designation_id' => '3',
            'role' => 'user',
            'name' => 'Ravi Sondager',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('krishna'),
            'middle_name' => 'C',
            'last_name' => 'Chavda',
            'active' => '1',
            'team_lied' => '0',
            'created_at' => '2018-07-16 05:48:24',
            'updated_at' => '2018-07-16 05:48:24',
        ]);
        DB::table('users')->insert([
            'id' => '4',
            'department_id' => '3',
            'designation_id' => '3',
            'role' => 'user',
            'name' => 'Rutul Takkar',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('krishna'),
            'middle_name' => 'C',
            'last_name' => 'Chavda',
            'active' => '1',
            'team_lied' => '0',
            'created_at' => '2018-07-16 05:48:24',
            'updated_at' => '2018-07-16 05:48:24',
        ]);
        DB::table('users')->insert([
            'id' => '5',
            'department_id' => '3',
            'designation_id' => '3',
            'role' => 'user',
            'name' => 'Maulik Sondager',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('krishna'),
            'middle_name' => 'C',
            'last_name' => 'Chavda',
            'active' => '1',
            'team_lied' => '0',
            'created_at' => '2018-07-16 05:48:24',
            'updated_at' => '2018-07-16 05:48:24',
        ]);
        DB::table('users')->insert([
            'id' => '6',
            'department_id' => '1',
            'designation_id' => '3',
            'role' => 'user',
            'name' => 'Kajal Pandaya',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('krishna'),
            'middle_name' => 'C',
            'last_name' => 'Chavda',
            'active' => '1',
            'team_lied' => '0',
            'created_at' => '2018-07-16 05:48:24',
            'updated_at' => '2018-07-16 05:48:24',
        ]);
        DB::table('users')->insert([
            'id' => '7',
            'department_id' => '1',
            'designation_id' => '3',
            'role' => 'admin',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('krishna'),
            'middle_name' => 'C',
            'last_name' => 'Chavda',
            'active' => '1',
            'team_lied' => '0',
            'created_at' => '2018-07-16 05:48:24',
            'updated_at' => '2018-07-16 05:48:24',
        ]);
    }
}

