<?php

use Illuminate\Database\Seeder;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('blog_categories')->insert([
         	'id' => '1',
         	'parent_id' => NULL,
            'name' => 'Developer',
            'slug' => 'developer',
            'created_at' => '2018-07-16 05:48:24',
            'updated_at' => '2018-07-16 05:48:24',
        ]); DB::table('blog_categories')->insert([
        	'id' => '2',
        	'parent_id' => NULL,
            'name' => 'Designer',
            'slug' => 'designer',
            'created_at' => '2018-07-16 05:48:24',
            'updated_at' => '2018-07-16 05:48:24',
        ]); DB::table('blog_categories')->insert([
        	'id' => '3',
        	'parent_id' => '1',
            'name' => 'Laravel',
            'slug' => 'laravel',
            'created_at' => '2018-07-16 05:48:24',
            'updated_at' => '2018-07-16 05:48:24',
        ]);
    }
}

