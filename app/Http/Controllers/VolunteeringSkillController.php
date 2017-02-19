<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\VolunteeringSkill;


class VolunteeringSkillController extends Controller
{
    //
    public function index() {
        $volunteeringskills = Volunteeringskill::all();
        return view('volunteeringskill.index')
            ->with('volunteeringskills', $volunteeringskills);
    }
    
    //
    public function create() {
        return view('volunteeringskill.create');
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

        $volunteeringskill = Volunteeringskill::findOrFail($id);
        return view('volunteeringskill.edit')
            ->with('volunteeringskill', $volunteeringskill);;
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
