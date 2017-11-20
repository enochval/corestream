<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->delete();

        Comment::create([
            'user_id' => 3,
            'body' => 'Look I am a test comment.'
        ]);

        Comment::create([
            'user_id' => 4,
            'body' => 'This is going to be super crazy.'
        ]);

        Comment::create([
            'user_id' => 6,
            'body' => 'I am a master of Laravel and Angular.'
        ]);
    }
}
