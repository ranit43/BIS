<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Skill;
use App\UserSkill;
use Input;
use Validator;


class PagesController extends Controller
{
    //
    public function welcome() {
    	return view('welcome');
    }

    public function search()
    {
        $skills = Skill::all();
        
        /*$people = ['Lopa', 'Abir', 'Partho'];*/
        return view('search')
        ->with('skills', $skills)
        ;
    	/*$people = ['Lopa', 'Abir', 'Partho'];*/
        /*
        return view('search')
        ->with('skills', $skills)
        ;
        */
    }
    //public function searchResult(Request $request, array $skill)
    public function searchResult(Request $request)
    {
        //return $request->all();
        //return $request->skill;
        $skills = $request->skill;

         $filtered = UserSkill::whereIn('skill_id', $skills)->pluck('user_id');
         $users = User::whereIn('id',$filtered)->get();
        
        
        

       return view('search_result')
       ->with('users', $users)
       ;
       /* 
       $user->skills()->sync($request->skill);
            return redirect()->route('home')->with('success','skill Successfully Added');
        
        
        return view('searchResult');
       */
    }

    public function forum()
    {
    	return view('forum');
    }

    public function home()
    {
        $authUser = Auth::user();

    	return view('home',
        [
            'authUser'          => $authUser
        ]);
    }

    public function edit(Request $request, $id )
    {
        $authUser = Auth::user();
        
        $skills = Skill::all();

        // return $authUser -> name;
        return view('edit',[
            'authUser'          => $authUser
        ])
        ->with('skills', $skills);
    }

    public function profileUpdate(Request $request, $id)
    {

        //return $request->all();
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'contact' => 'required',
            /*'address' => '',
            'cv' => '',
            'image' => '',*/
            ];

        $data = $request->all();
        $validation = Validator::make($data, $rules);

        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation);
        }

        $img_url = null;
        if( $request->hasFile('image') ) {

            $file = $request->file('image');

            $destination = public_path().'/uploads/images/users/';
            $filename = time().'_users.'.$file->getClientOriginalExtension();
            $file->move($destination, $filename);
            $img_url = '/uploads/images/users/'.$filename;

        }
        else {

            return redirect()->back()->withInput()->withErrors('Image Required');
        }

        $cv_url = null;
        if( $request->hasFile('cv') ) {

            $file = $request->file('cv');

            $destination = public_path().'/uploads/cv/users/';
            $filename = time().'_users.'.$file->getClientOriginalExtension();
            $file->move($destination, $filename);
            $cv_url = '/uploads/cv/users/'.$filename;

        }

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->adress = $request->address;
        $user->contact = $request->contact;
        $user->CV = $cv_url;
        $user->image = $img_url;

        if($user->save()) {
            //$user->skills()->attach($request->skill);
            $user->skills()->sync($request->skill);
            return redirect()->route('home')->with('success','Profile successfully updated');
        }
        else return redirect()->route('home')->with('error','ERROR!!!');


    }

}
