<?php

use App\Project;
use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Project::create([
            'name' => 'Game',
            'link' => '.com',
            'project_partners' => 'Mr K K',
            'details' => 'worked with java',
            'user_id' => '1'
        ]);

        Project::create([
            'name' => 'WebTT',
            'link' => '.com',
            'project_partners' => 'Mr K K',
            'details' => 'worked with java',
            'user_id' => '2'
        ]);

        Project::create([
            'name' => 'WebTLL',
            'link' => '.com',
            'project_partners' => 'Mr K K',
            'details' => 'worked with java',
            'user_id' => '3'
        ]);

        Project::create([
            'name' => 'WebTLL',
            'link' => '.com',
            'project_partners' => 'Mr K K',
            'details' => 'worked with java',
            'user_id' => '4'
        ]);

//        $table->string('name');
//        $table->string('link');
//        $table->string('project_partners');
//        $table->string('details');
//        $table->string('user_id');
    }
}
