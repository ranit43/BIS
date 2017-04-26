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
           'image' => '/uploads/images/users/ranit.jpg',
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
           'role' => 'Admin'
       ]);

       User::create([
           'name' => 'Tanjila Mawla Tania',
           'email' => 'tani109.bd@gmail.com',
           'password' => bcrypt('a'),
           'image' => '/uploads/images/users/tania.jpg',
           'contact' => '+88-01XXXXXXXXX',
           'adress' => 'Dhaka',
           'CV' => 'CvPath',
           'role' => 'Admin'
       ]);

       User::create([
           'name' => 'Md Masum',
           'email' => 'masum-cse@sust.edu',
           'password' => bcrypt('a'),
           'image' => '/uploads/images/users/MasumSir.jpg',
           'contact' => '+88-01919736248',
           'adress' => 'Sylhet',
           'CV' => 'CvPath',
           'role' => 'Admin'
       ]);

       $faker = Faker\Factory::create();

       $u = new App\User();
       for ($i=1; $i < 10; $i++)
       {
           $u = new App\User();
           $u->name = $faker->name;
           $u->email = $faker->email;
           $u->password = bcrypt(1);
           $u->image = $faker->imageUrl($width = 640, $height = 480, 'cats');
           $u->contact = $faker->phoneNumber;
           $u->adress = $faker->address;
           $u->CV = $faker->imageUrl($width, $height, 'cats');
           $u->role = 'Student';
           $u->save();
       }

   }
}