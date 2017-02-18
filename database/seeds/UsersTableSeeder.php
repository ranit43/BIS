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
       $faker = Faker\Factory::create();

       /*$u = new App\User();

       $u->name = 'Admin';
       $u->role = 'Admin';
       $u->password = '1';
       $u->save();

       
		   	for ($i=1; $i < 5; $i++) 
		   	{ 
			   	$u = new App\User();
			   	$u->name = $faker->name;
			   	$u->email = $faker->email;
			   	$u->password = bcrypt(1);
			   	$u->save();
		   	}
        */
      User::create([
        'name' => 'R D Akash', 
        'email' => 'akash@gmail.com', 
        'password' => bcrypt('a'),
        'image' => 'ImagePath',
        'contact' => '01719424849',
        'adress' => 'Mirzajangal',
        'CV' => 'CvPath',
        ]);

      User::create([
           'name' => 'T D',
           'email' => 'td@gm.com',
           'password' => bcrypt('a'),
           'image' => 'ImagePath',
           'contact' => '01719429',
           'adress' => 'Chhatak',
           'CV' => 'CvPath',
       ]);
   }
}