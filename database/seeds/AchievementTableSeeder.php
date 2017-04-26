<?php

use Illuminate\Database\Seeder;
use App\Achievement;

class AchievementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Achievement::create([
            'title' => 'Runners up',
            'issuer' => 'Competetion',
            'year' => '2016',
            'details' => 'Won it by working very hard',
            'user_id' => '1'
        ]);

        Achievement::create([
            'title' => 'Champion',
            'issuer' => 'Competetion',
            'year' => '2017',
            'details' => 'Won it by working very hard',
            'user_id' => '2'
        ]);

        Achievement::create([
            'title' => 'Champion',
            'issuer' => 'Developer Contest',
            'year' => '2017',
            'details' => 'Won it by working very hard',
            'user_id' => '3'
        ]);

        Achievement::create([
            'title' => 'Champion',
            'issuer' => 'Developer Contest',
            'year' => '2017',
            'details' => 'Won it by working very hard',
            'user_id' => '4'
        ]);

        /*VolunteeringSkill::create([ 'name' => 'Winter Cloth distribution' ]);
        VolunteeringSkill::create([ 'name' => 'Disaster Help' ]);*/
    }
}
