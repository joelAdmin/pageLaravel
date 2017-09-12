<?php

use Illuminate\Database\Seeder;

class ScopeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *  
     * @return void
     */
	 /*
    	$faker = Faker::create();
		for ($i=0; $i < 50; $i++) {
    		\DB::table('pasteles')->insert(array(
           'nombre' => $faker->firstNameFemale,
           'sabor'  => $faker->randomElement(['chocolate','vainilla','cheesecake']),
           'created_at' => date('Y-m-d H:m:s'),
           'updated_at' => date('Y-m-d H:m:s')
    		));
		}*/
    public function run()
    {
        \DB::table('scope_notices')->insert(array(
           'name_sco' => 'Local',
           'status_sco' => 1,
           'created_at' => date('Y-m-d H:m:s'),
           'updated_at' => date('Y-m-d H:m:s')
    	));

        \DB::table('scope_notices')->insert(array(
           'name_sco' => 'Regional',
           'status_sco' => 1,
           'created_at' => date('Y-m-d H:m:s'),
           'updated_at' => date('Y-m-d H:m:s')
    	));

		\DB::table('scope_notices')->insert(array(
           'name_sco' => 'Nacional',
           'status_sco' => 1,
           'created_at' => date('Y-m-d H:m:s'),
           'updated_at' => date('Y-m-d H:m:s')
    	));

		\DB::table('scope_notices')->insert(array(
           'name_sco' => 'Internacional',
           'status_sco' => 1,
           'created_at' => date('Y-m-d H:m:s'),
           'updated_at' => date('Y-m-d H:m:s')
    	));

    }
}
