<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\VolunteeringSkill;
use App\Notification;


class VolunteeringSkillController extends Controller
{
    //
    public function index() {
        $authUser = Auth::user();
        $volunteeringskills = Volunteeringskill::all();

        $isread = Notification::where('is_read', 0)->get();
        $notif_count = $isread->count();

        return view('volunteeringskill.index_card', [
        'authUser' => $authUser
            ])
            ->with('volunteeringskills', $volunteeringskills)
            ->with('notif_count', $notif_count)
            ;
    }
    
    //
    public function create() {
        $authUser = Auth::user();

        $isread = Notification::where('is_read', 0)->get();
        $notif_count = $isread->count();

        return view('volunteeringskill.create_card', [
            'authUser' => $authUser
        ])
            ->with('notif_count', $notif_count)
            ;
    }





    public function store(Request $request) {

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

        $volunteeringskill = new Volunteeringskill();
        $volunteeringskill->name = $data['name'];

        if($volunteeringskill->save()) {
            return redirect()->route('volunteeringskill.index')->with('success','volunteeringskill Successfully Added');
        } else {
            return redirect()->route('volunteeringskill.index')->with('error','Something went wrong');
        }
    }

    public function edit($id) {

        $authUser = Auth::user();
        $volunteeringskill = Volunteeringskill::findOrFail($id);

        $isread = Notification::where('is_read', 0)->get();
        $notif_count = $isread->count();

        return view('volunteeringskill.edit_card', [
            'authUser' => $authUser
        ])
            ->with('volunteeringskill', $volunteeringskill)
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

        $volunteeringskill = Volunteeringskill::find($id);
        $volunteeringskill->name = $data['name'];
        if($volunteeringskill->save()) {
            return redirect()->route('volunteeringskill.index')->with('success','volunteeringskill Successfully Updated');
        } else {
            return redirect()->route('volunteeringskill.index')->with('error','Something went wrong');
        }
    }

    public function destroy($id)
    {
        try{
            Volunteeringskill::destroy($id);

            return redirect()->route('volunteeringskill.index')->with('success','volunteeringskill Deleted Successfully.');

        }catch(Exception $ex){
            return redirect()->route('volunteeringskill.index')->with('error','Something went wrong.Try Again.');
        }
    }
}
