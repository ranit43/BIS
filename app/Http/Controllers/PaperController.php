<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Auth;
use App\User;
use App\Post;
use App\Comment;
use App\Achievement;
use App\Project;
use App\Paper;
use App\Notification;

class PaperController extends Controller
{
    //
    public function index() {

        $papers = Paper::all();
        /*$people = ['Lopa', 'Abir', 'Partho'];*/
        $authUser = Auth::user();
        $users = User::all();

        $isread = Notification::where('is_read', 0)->get();
        $notif_count = $isread->count();


        return view('paper.index', [
            'authUser' => $authUser
        ])
            ->with('papers', $papers)
            ->with('users', $users)
            ->with('notif_count', $notif_count)
            ;
    }

    public function create() {


        $authUser = Auth::user();

        $isread = Notification::where('is_read', 0)->get();
        $notif_count = $isread->count();

        return view('paper.create_card', [
            'authUser' => $authUser
        ])
            ->with('notif_count', $notif_count)
            ;
        //return view('paper.create');

    }

    public function store(Request $request) {

        // $data = $request->all();
        // return $data;
        $rules = [
            'name' => 'required',
        ];

        $data = $request->all();
        $validation = Validator::make($data, $rules);

        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation);
        }

        //Nothing in the paper model
        $paper = new Paper();

        $paper->name = $data['name'];
        $paper->link = $data['link'];
        $paper->details = $data['details'];
        $paper->paper_partners = "";
        $paper->user_id = Auth::user()->id;


        if($paper->save()) {
            return redirect()->route('home')->with('success','paper Successfully Added');
        } else {
            return redirect()->route('home')->with('error','Something went wrong');
        }
    }

    public function edit($id) {
        $paper = Paper::findOrFail($id);
        $authUser = Auth::user();

        $isread = Notification::where('is_read', 0)->get();
        $notif_count = $isread->count();

        return view('paper.edit_card', [
            'authUser' => $authUser
        ])
            ->with('paper', $paper)
            ->with('notif_count', $notif_count)
            ;
    }
    public function update(Request $request, $id) {

        // $data = $request->all();
        // return $data;
        $rules = [
            'name' => 'required',
        ];

        $data = $request->all();
        $validation = Validator::make($data, $rules);

        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation);
        }

        //Nothing in the paper model
        $paper = Paper::find($id);

        $paper->name = $data['name'];
        $paper->link = $data['link'];
        $paper->details = $data['details'];
        $paper->	paper_partners = "";
        //$paper->user_id = Auth::user()->id;


        if($paper->save()) {
            return redirect()->route('home')->with('success','paper Successfully Added');
        } else {
            return redirect()->route('home')->with('error','Something went wrong');
        }
    }

    public function destroy($id)
    {

        try{
            Paper::destroy($id);

            return redirect()->route('home')->with('success','Skill Deleted Successfully.');

        }catch(Exception $ex){
            return redirect()->route('home')->with('error','Something went wrong.Try Again.');
        }
    }

    /*
    public function show_project($id) {

        $project = project::findOrFail($id);
        $authUser = Auth::user();
        $comments =project::find($id)->comments;

        return view('project.show_project', [
                'authUser' => $authUser
            ])
            ->with('project', $project)
            ->with('comments', $comments)
            ;
    }*/
}
