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
use App\Notification;


class ProjectController extends Controller
{
    //
    public function index() {

        $projects = Project::all();
        /*$people = ['Lopa', 'Abir', 'Partho'];*/
        $authUser = Auth::user();
        $users = User::all();

        $isread = Notification::where('is_read', 0)->get();
        $notif_count = $isread->count();


        return view('project.index', [
            'authUser' => $authUser
        ])
            ->with('projects', $projects)
            ->with('users', $users)
            ->with('notif_count', $notif_count)
            ;
    }

    public function create() {


        $authUser = Auth::user();

        $isread = Notification::where('is_read', 0)->get();
        $notif_count = $isread->count();

        return view('project.create_card', [
            'authUser' => $authUser
        ])
            ->with('notif_count', $notif_count);
        //return view('project.create');

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

        //Nothing in the project model
        $project = new Project();

        $project->name = $data['name'];
        $project->link = $data['link'];
        $project->details = $data['details'];
        $project->	project_partners = "";
        $project->user_id = Auth::user()->id;


        if($project->save()) {
            return redirect()->route('home')->with('success','project Successfully Added');
        } else {
            return redirect()->route('home')->with('error','Something went wrong');
        }
    }

    public function edit($id) {
        $project = Project::findOrFail($id);
        $authUser = Auth::user();

        $isread = Notification::where('is_read', 0)->get();
        $notif_count = $isread->count();

        return view('project.edit_card', [
            'authUser' => $authUser
        ])
            ->with('project', $project)
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

        //Nothing in the project model
        $project = Project::find($id);

        $project->name = $data['name'];
        $project->link = $data['link'];
        $project->details = $data['details'];
        $project->	project_partners = "";
        //$project->user_id = Auth::user()->id;


        if($project->save()) {
            return redirect()->route('home')->with('success','project Successfully Added');
        } else {
            return redirect()->route('home')->with('error','Something went wrong');
        }
    }

    public function destroy($id)
    {
        try{
            Project::destroy($id);

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
