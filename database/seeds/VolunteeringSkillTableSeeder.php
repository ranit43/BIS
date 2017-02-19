<?php

use Illuminate\Database\Seeder;
use App\VolunteeringSkill;

class VolunteeringSkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        VolunteeringSkill::create([ 'name' => 'Blood Donation' ]);
        VolunteeringSkill::create([ 'name' => 'Teaching Poor Students' ]);
        VolunteeringSkill::create([ 'name' => 'Cleaning Campus' ]);
        VolunteeringSkill::create([ 'name' => 'Winter Cloth distribution' ]);
        VolunteeringSkill::create([ 'name' => 'Disaster Help' ]);
        /*Skill::create([ 'name' => 'Java' ]);
        Skill::create([ 'name' => 'PHP' ]);
        Skill::create([ 'name' => 'Laravel' ]);
        Skill::create([ 'name' => 'C#' ]);
        Skill::create([ 'name' => 'NodeJS' ]);
        Skill::create([ 'name' => 'Python' ]);*/
    }
}
