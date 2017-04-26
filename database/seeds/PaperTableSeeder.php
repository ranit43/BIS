<?php

use App\Paper;
use Illuminate\Database\Seeder;

class PaperTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Paper::create([
            'name' => 'A human Robot Interaction . . ',
            'link' => '.com',
            'paper_partners' => 'Mr K K',
            'details' => 'worked with java',
            'user_id' => '2'
        ]);

        Paper::create([
            'name' => 'Cyberbullying Detection . . ',
            'link' => '.com',
            'paper_partners' => 'Mr K K',
            'details' => 'worked with java',
            'user_id' => '1'
        ]);

        Paper::create([
            'name' => 'A human Robot Interaction . . ',
            'link' => '.com',
            'paper_partners' => 'Mr K K',
            'details' => 'worked with java',
            'user_id' => '3'
        ]);

        Paper::create([
            'name' => 'Optimal Bangla Keypad Layout for Mobile Phone based on Ergonomics',
            'link' => '.com',
            'paper_partners' => 'Muhammad Raisul Alam and Shafiul Hasan Md Tareq',
            'details' => 'Accepted for SUST Journal of Science and Technology, Volume 21, April 2015',
            'user_id' => '4'
        ]);


//        $table->increments('id');
//        $table->string('name');
//        $table->string('link');
//        $table->string('paper_partners');
//        $table->string('details');
//        $table->string('user_id');
    }
}
