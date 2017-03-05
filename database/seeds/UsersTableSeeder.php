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

       User::create([
           'name' => 'R D Akash',
           'email' => 'akash@gmail.com',
           'password' => bcrypt('a'),
           'image' => '/uploads/images/users/annonymus.jpg',
           'contact' => '01719424849',
           'adress' => 'Mirzajangal',
           'CV' => 'CvPath',
           'role' => 'Admin'
       ]);

       User::create([
           'name' => 'T D',
           'email' => 'td@gm.com',
           'password' => bcrypt('a'),
           'image' => '/uploads/images/users/annonymus.jpg',
           'contact' => '01719429',
           'adress' => 'Chhatak',
           'CV' => 'CvPath',
           'role' => 'Teacher'
       ]);

       User::create([
           'name' => 'tania',
           'email' => 'tania@gmail.com',
           'password' => bcrypt('a'),
           'image' => '/uploads/images/users/annonymus.jpg',
           'contact' => '01719424849',
           'adress' => 'Mirzajangal',
           'CV' => 'CvPath',
           'role' => 'Admin'
       ]);

       $faker = Faker\Factory::create();

       $u = new App\User();
       for ($i=1; $i < 5; $i++)
       {
           $u = new App\User();
           $u->name = $faker->name;
           $u->email = $faker->email;
           $u->password = bcrypt(1);
           $u->image = $faker->imageUrl($width = 640, $height = 480, 'cats');
           $u->contact = $faker->phoneNumber;
           $u->adress = $faker->address;
           $u->CV = $faker->imageUrl($width, $height, 'cats');
           $u->role = 'student';
           $u->save();
       }

   }
}