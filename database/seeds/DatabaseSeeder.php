<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);

        $this->call(SkillTableSeeder::class);
        $this->call(VolunteeringSkillTableSeeder::class);

        $this->call(AchievementTableSeeder::class);
        $this->call(ProjectTableSeeder::class);
        $this->call(PaperTableSeeder::class);

        $this->call(PostforumTableSeeder::class);
        $this->call(CommentforumTableSeeder::class);

        $this->call(UserSkillTableSeeder::class);
    }

}
