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

        Skill::create([ 'name' => 'C' ]);
        Skill::create([ 'name' => 'C++' ]);
        Skill::create([ 'name' => 'Java' ]);
        Skill::create([ 'name' => 'PHP' ]);
        Skill::create([ 'name' => 'Laravel' ]);
        Skill::create([ 'name' => 'C#' ]);
        Skill::create([ 'name' => 'NodeJS' ]);
        Skill::create([ 'name' => 'Python' ]);
    }
}
