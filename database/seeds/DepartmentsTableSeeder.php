<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'id' => '1',
            'name' => 'WP',
            'slug' => 'wp',
            'created_at' => '2018-07-16 05:48:24',
            'updated_at' => '2018-07-16 05:48:24',
        ]);
        DB::table('departments')->insert([
            'id' => '2',
            'name' => 'JS',
            'slug' => 'js',
            'created_at' => '2018-07-16 05:48:24',
            'updated_at' => '2018-07-16 05:48:24',
        ]);
        DB::table('departments')->insert([
            'id' => '3',
            'name' => 'Laravel',
            'slug' => 'laravel',
            'created_at' => '2018-07-16 05:48:24',
            'updated_at' => '2018-07-16 05:48:24',
        ]);
    }
}
