<?php

use Illuminate\Database\Seeder;
use App\Skill;

class SkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Skill::create([ 'name' => 'C', 'field'=>'CSE' ]);
        Skill::create([ 'name' => 'C++', 'field'=>'CSE' ]);
        Skill::create([ 'name' => 'Java','field'=>'CSE' ]);
        Skill::create([ 'name' => 'PHP','field'=>'CSE' ]);
        Skill::create([ 'name' => 'Laravel','field'=>'CSE' ]);
        Skill::create([ 'name' => 'C#','field'=>'CSE' ]);
        Skill::create([ 'name' => 'NodeJS','field'=>'CSE' ]);
        Skill::create([ 'name' => 'Python','field'=>'CSE' ]);
        Skill::create([ 'name' => 'PSpice','field'=>'EEE' ]);
        Skill::create([ 'name' => 'Matlab','field'=>'EEE' ]);
        Skill::create([ 'name' => 'Power World','field'=>'EEE' ]);
        Skill::create([ 'name' => 'AutoCAD','field'=>'EEE' ]);
        Skill::create([ 'name' => 'Quartus','field'=>'EEE' ]);
        Skill::create([ 'name' => 'OptiSystem','field'=>'EEE' ]);
        Skill::create([ 'name' => 'SILVACO','field'=>'EEE' ]);
    }
}
