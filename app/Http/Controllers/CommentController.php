<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Auth;
use App\User;
use App\Post;
use App\Comment;
use App\Notification;

class CommentController extends Controller
{
    //
    public function index() {

        $comments = Comment::all();
        /*$people = ['Lopa', 'Abir', 'Partho'];*/
        $authUser = Auth::user();
        $users = User::all();

        $isread = Notification::where('is_read', 0)->get();
        $notif_count = $isread->count();

        return view('comment.index', [
            'authUser' => $authUser
             ])
            ->with('comments', $comments)
            ->with('users', $users)
            ->with('notif_count', $notif_count)
            ;
    }

   /* public function create() {


        $authUser = Auth::user();
        return view('comment.create', [
            'authUser' => $authUser
        ]);
        //return view('comment.create');

    }*/

    public function store(Request $request) {

        // $data = $request->all();
        // return $data;

        $rules = [
            'text' => 'required',
        ];


        $data = $request->all();

        $validation = Validator::make($data, $rules);

        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation);
        }

        //Nothing in the comment model
        $comment = new Comment();

        $comment->text = $data['text'];
        $comment->post_id = $data['post_id'];
        $comment->user_id = Auth::user()->id;


        if($comment->save()) {
            return redirect()->route('post.show_post', $comment->post_id)->with('success','Post Successfully Added');
        } else {
            return redirect()->route('post.show_post', $comment->post_id)->with('error','Something went wrong');
        }
    }

    public function edit($id) {
        $comment = Comment::findOrFail($id);
        $authUser = Auth::user();

        $isread = Notification::where('is_read', 0)->get();
        $notif_count = $isread->count();

        return view('comment.edit_card', [
            'authUser' => $authUser
            ])
            ->with('comment', $comment)
            ->with('notif_count', $notif_count)
            ;
    }

    public function update(Request $request, $id) {

        // $data = $request->all();
        // return $data;
        $rules = [
            'text' => 'required',
        ];


        $data = $request->all();

        $validation = Validator::make($data, $rules);

        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation);
        }

        //Nothing in the comment model
        $comment = Comment::find($id);
        $comment->text = $data['text'];

        if($comment->save()) {
            return redirect()->route('post.show_post', $comment->post_id)->with('success','Comment Successfully Added');
        } else {
            return redirect()->route('post.show_post', $comment->post_id)->with('error','Something went wrong');
        }

    }

    public function destroy($id)
    {
        try{
            Comment::destroy($id);

            return redirect()->back()->with('success','Skill Deleted Successfully.');

        }catch(Exception $ex){
            return redirect()->back()->with('error','Something went wrong.Try Again.');
        }
    }

    /*public function show_post($id) {

        $post = comment::findOrFail($id);
        $authUser = Auth::user();
        return view('comment.show_post', [
            'authUser' => $authUser
        ])
            ->with('post', $post)
            ;
    }*/
}
