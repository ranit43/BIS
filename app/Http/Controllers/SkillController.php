<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Skill;
use App\Notification;

class SkillController extends Controller
{
	public function index() {
		$skills = Skill::all();
        $authUser = Auth::user();

        $isread = Notification::where('is_read', 0)->get();
        $notif_count = $isread->count();


        return view('skill.index_card', [
            'authUser' => $authUser
            ])
            ->with('skills', $skills)
            ->with('notif_count', $notif_count)
            ;
	}
    //
    public function create() {
	    $authUser = Auth::user();

        $isread = Notification::where('is_read', 0)->get();
        $notif_count = $isread->count();

        return view('skill.create_card', [
            'authUser' => $authUser
        ])
            ->with('notif_count', $notif_count);
    }

    

    

    public function store(Request $request) {
    	
    	// $data = $request->all();
    	// return $data;
    	$rules = [
            'name' => 'required',
            'field' => 'required',
            ];

        $data = $request->all();
        $validation = Validator::make($data, $rules);

        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation);
        }

        $skill = new Skill();
        $skill->name = $data['name'];
        $skill->field = $data['field'];

        if($skill->save()) {
            return redirect()->route('skill.index')->with('success','skill Successfully Added');
        } else {
            return redirect()->route('skill.index')->with('error','Something went wrong');
        }
    }

    public function edit($id) {
        
        $skill = Skill::findOrFail($id);
        $authUser = Auth::user();

        $isread = Notification::where('is_read', 0)->get();
        $notif_count = $isread->count();


        return view('skill.edit_card', [
            'authUser' => $authUser
            ])
            ->with('skill', $skill)
            ->with('notif_count', $notif_count)
            ;
    }

    

    public function update(Request $request, $id) {
        
        // $data = $request->all();
        // return $data;
        $rules = [
            'name' => 'required'
            ];

        $data = $request->all();
        $validation = Validator::make($data, $rules);

        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation);
        }

        $skill = Skill::find($id);
        $skill->name = $data['name'];
        if($skill->save()) {
            return redirect()->route('skill.index')->with('success','skill Successfully Updated');
        } else {
            return redirect()->route('skill.index')->with('error','Something went wrong');
        }
    }

    public function destroy($id)
    {
        try{
            Skill::destroy($id);

            return redirect()->route('skill.index')->with('success','Skill Deleted Successfully.');

        }catch(Exception $ex){
            return redirect()->route('skill.index')->with('error','Something went wrong.Try Again.');
        }
    }


}