<?php

use Illuminate\Database\Seeder;
use App\UserSkill;
class UserSkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        UserSkill::create([ 'user_id' => '1', 'skill_id'=>'1' ]);
        UserSkill::create([ 'user_id' => '1', 'skill_id'=>'3' ]);
        UserSkill::create([ 'user_id' => '1', 'skill_id'=>'4' ]);
        UserSkill::create([ 'user_id' => '1', 'skill_id'=>'5' ]);
        UserSkill::create([ 'user_id' => '1', 'skill_id'=>'7' ]);
        UserSkill::create([ 'user_id' => '2', 'skill_id'=>'8' ]);
        UserSkill::create([ 'user_id' => '2', 'skill_id'=>'1' ]);
        UserSkill::create([ 'user_id' => '2', 'skill_id'=>'4' ]);
        UserSkill::create([ 'user_id' => '2', 'skill_id'=>'6' ]);

        UserSkill::create([
            'user_id' => '2',
            'skill_id'=>'7'
        ]);

        /*User::create([
            'name' => 'R D Akash',
            'email' => 'akash@gmail.com',
            'password' => bcrypt('a'),
            'image' => 'ImagePath',
            'contact' => '01719424849',
            'adress' => 'Mirzajangal',
            'CV' => 'CvPath',
        ]);*/
    }
}
