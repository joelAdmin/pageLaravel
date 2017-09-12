<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('category_notices')->insert(array(
           'name_cat' => 'Política',
           'status_cat' => 1,
           'created_at' => date('Y-m-d H:m:s'),
           'updated_at' => date('Y-m-d H:m:s')
    	));

        \DB::table('category_notices')->insert(array(
           'name_cat' => 'Religión',
           'status_cat' => 1,
           'created_at' => date('Y-m-d H:m:s'),
           'updated_at' => date('Y-m-d H:m:s')
    	));
    }
}
