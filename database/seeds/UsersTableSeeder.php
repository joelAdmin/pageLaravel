<?php 

	/** 
		add new users the database through
 		the seeder (añadimos un nuevo usuario a traves de seeder)
 	**/
 	use Illuminate\Database\Seeder;
 	use App\User;

	class UsersTableSeeder extends Seeder {
					
		public function run(){
			User::create(array(
				'name' => 'admin',
				'user' => 'admin',
				'email'    => 'admin@admin.com',
				'password' => Hash::make('admin'),
				'type' => 'admin',	
				'active' => false,	
				'estatus' => true,	
			));
		}
	}
