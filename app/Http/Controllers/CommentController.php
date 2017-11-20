<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Events\NewComment;
use Illuminate\Http\Request;
/*use Illuminate\Support\Facades\Input;*/
use Illuminate\Support\Facades\Response;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return Response::json(Comment::get());
    }


    public function create()
    {

    }


    public function store(Request $request)
    {

    }


    public function show($id)
    {
        //
    }


    public function storeV(Video $video)
    {
        $comment = $video->comments()->create([
            'body' => request('body'),
            'user_id' => auth()->user()->id,
            'video_id' => $video->id
        ]);

        $comment = Comment::where('id', $comment->id)->with('user')->first();

        broadcast(new NewComment($comment))->toOthers();

        return $comment;
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Comment::destroy($id);

        return Response::json(array('success' => true));
    }
}
