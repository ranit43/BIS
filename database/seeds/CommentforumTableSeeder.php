<?php

use App\Comment;
use Illuminate\Database\Seeder;

class CommentforumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Comment::create([

            'user_id' => '1',
            'post_id' => '1',
            'text' => 'Really',

        ]);

        Comment::create([

            'user_id' => '2',
            'post_id' => '1',
            'text' => 'Nothing to do',

        ]);

        Comment::create([

            'user_id' => '1',
            'post_id' => '1',
            'text' => 'Whatevs',
        ]);

        Comment::create([

            'user_id' => '5',
            'post_id' => '1',
            'text' => 'Whatevs',
        ]);

        Comment::create([

            'user_id' => '2',
            'post_id' => '2',
            'text' => 'Whatevs',
        ]);

        Comment::create([

            'user_id' => '4',
            'post_id' => '1',
            'text' => 'Whatevs',
        ]);

        Comment::create([

            'user_id' => '6',
            'post_id' => '2',
            'text' => 'Whatevs',
        ]);

        Comment::create([

            'user_id' => '8',
            'post_id' => '2',
            'text' => 'Whatevs',
        ]);


//        $table->integer('user_id');
//        $table->integer('post_id');
//        $table->string('text');
    }
}
