<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\User;
use App\Post;
use App\Comment;


class postController extends Controller
{
    //
    public function index() {

        $posts = Post::all();
        /*$people = ['Lopa', 'Abir', 'Partho'];*/
        $authUser = Auth::user();
        $users = User::all();
        return view('post.index', [
            'authUser' => $authUser
            ])
            ->with('posts', $posts)
            ->with('users', $users)
            ;
    }

    public function create() {


        $authUser = Auth::user();
        return view('post.create', [
            'authUser' => $authUser
        ]);
        //return view('post.create');

    }

    public function store(Request $request) {

        // $data = $request->all();
        // return $data;
        $rules = [
            'title' => 'required',
            'category' => 'required',
            'body' => 'required'
        ];

         $data = $request->all();
        $validation = Validator::make($data, $rules);

        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation);
        }

        //Nothing in the post model
        $post = new Post();

        $post->title = $data['title'];
        $post->category = $data['category'];
        $post->details = $data['body'];
        $post->user_id = Auth::user()->id;

        
        if($post->save()) {
            return redirect()->route('post.index')->with('success','Post Successfully Added');
        } else {
            return redirect()->route('post.index')->with('error','Something went wrong');
        }
    }

    public function edit($id) {
        $post = Post::findOrFail($id);
        $authUser = Auth::user();
        return view('post.edit', [
            'authUser' => $authUser
            ])
            ->with('post', $post)
            ;
    }
    public function update(Request $request, $id) {

        // $data = $request->all();
        // return $data;
        $rules = [
            'title' => 'required',
            'category' => 'required',
            'details' => 'required'
        ];

        $data = $request->all();
        $validation = Validator::make($data, $rules);

        if ($validation->fails()) {

            return redirect()->back()->withInput()->withErrors($validation);
        }

        //"Nothing in the post model";
        $post = Post::find($id);

        $post->title = $data['title'];
        $post->category = $data['category'];
        $post->details = $data['details'];
        //$post->user_id = Auth::user()->id;


        if($post->save()) {
            return redirect()->route('post.index')->with('success','Post Successfully Added');
        } else {
            return redirect()->route('post.index')->with('error','Something went wrong');
        }

    }

    public function destroy($id)
    {
        try{
            Post::destroy($id);

            return redirect()->route('post.index')->with('success','Skill Deleted Successfully.');

        }catch(Exception $ex){
            return redirect()->route('post.index')->with('error','Something went wrong.Try Again.');
        }
    }

    public function show_post($id) {

        $post = Post::findOrFail($id);
        $authUser = Auth::user();
        $comments =Post::find($id)->comments;

        return view('post.show_post', [
                'authUser' => $authUser
            ])
            ->with('post', $post)
            ->with('comments', $comments)
            ;
    }
}
