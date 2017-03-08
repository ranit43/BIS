<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Auth;
use App\User;
use App\Post;
use App\Comment;
use App\Achievement;

class AchievementController extends Controller
{
    //
    public function index() {

        $achievements = Achievement::all();
        /*$people = ['Lopa', 'Abir', 'Partho'];*/
        $authUser = Auth::user();
        $users = User::all();

        return view('achievement.index', [
            'authUser' => $authUser
        ])
            ->with('achievements', $achievements)
            ->with('users', $users)
            ;
    }

    public function create() {


        $authUser = Auth::user();
        return view('achievement.create_card', [
            'authUser' => $authUser
        ]);
        //return view('achievement.create');

    }

    public function store(Request $request) {

        // $data = $request->all();
        // return $data;
        $rules = [
            'title' => 'required',
            'issuer' => 'required',
            'year' => 'required'
        ];

        $data = $request->all();
        $validation = Validator::make($data, $rules);

        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation);
        }

        //Nothing in the achievement model
        $achievement = new Achievement();

        $achievement->title = $data['title'];
        $achievement->issuer = $data['issuer'];
        $achievement->year = $data['year'];
        $achievement->details = $data['details'];
        $achievement->user_id = Auth::user()->id;


        if($achievement->save()) {
            return redirect()->route('home')->with('success','achievement Successfully Added');
        } else {
            return redirect()->route('home')->with('error','Something went wrong');
        }
    }

    public function edit($id) {
        $achievement = Achievement::findOrFail($id);
        $authUser = Auth::user();
        return view('achievement.edit_card', [
            'authUser' => $authUser
        ])
            ->with('achievement', $achievement)
            ;
    }
    public function update(Request $request, $id) {

        // $data = $request->all();
        // return $data;
        $rules = [
            'title' => 'required',
            'issuer' => 'required',
            'year' => 'required'
        ];

        $data = $request->all();
        $validation = Validator::make($data, $rules);

        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation);
        }

        //Nothing in the achievement model
        $achievement = Achievement::find($id);;

        $achievement->title = $data['title'];
        $achievement->issuer = $data['issuer'];
        $achievement->year = $data['year'];
        $achievement->details = $data['details'];
        $achievement->user_id = Auth::user()->id;


        if($achievement->save()) {
            return redirect()->route('home')->with('success','achievement Successfully Added');
        } else {
            return redirect()->route('home')->with('error','Something went wrong');
        }

    }

    public function destroy($id)
    {
        try{
            Achievement::destroy($id);

            return redirect()->route('home')->with('success','Skill Deleted Successfully.');

        }catch(Exception $ex){
            return redirect()->route('home')->with('error','Something went wrong.Try Again.');
        }
    }

    /*
    public function show_achievement($id) {

        $achievement = Achievement::findOrFail($id);
        $authUser = Auth::user();
        $comments =Achievement::find($id)->comments;

        return view('achievement.show_achievement', [
                'authUser' => $authUser
            ])
            ->with('achievement', $achievement)
            ->with('comments', $comments)
            ;
    }*/
}
