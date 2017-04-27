<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;


use App\Notification;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Skill;
use App\UserSkill;
use App\VolunteeringSkill;
use App\UserVolunteeringSkill;
use Input;
use Validator;

class UserController extends Controller
{
    //

    public function index()
    {
        $users = USER::orderBy('created_at', 'desc')->paginate(4);
        $authUser = Auth::user();

        $isread = Notification::where('is_read', 0)->get();
        $notif_count = $isread->count();


        return view('user.index', [
            'authUser'          => $authUser
        ])
            ->with('users', $users)
            ->with('notif_count', $notif_count)
            ;
    }

    public function usertable()
    {
        $users = USER::orderBy('created_at', 'desc')->paginate(10);
        $authUser = Auth::user();

        $isread = Notification::where('is_read', 0)->get();
        $notif_count = $isread->count();


        return view('user.index', [
            'authUser'          => $authUser
        ])
            ->with('users', $users)
            ->with('notif_count', $notif_count)
            ;
    }

    public function user_edit($id, Request $request) {

        $user = User::findOrFail($id);
        $authUser = Auth::user();

//        return view('user.user_edit', [
//            'authUser'          => $authUser
//        ])
//            ->with('user', $user)
//            ;

//        $authUser = Auth::user();

        $skills = Skill::all();

        $mySkills = [];
        foreach ($user->skills as $skill) {
            $mySkills[] = $skill->id;
        }

        $volunteeringSkills = VolunteeringSkill::all();
        $myVolunteeringSkills = [];
        foreach ($user->volunteeringskill as $volunteeringSkill) {
            $myVolunteeringSkills[] = $volunteeringSkill->id;
        }
        $redirect_url = $request->get('redirect_url', 'userslist');

        $isread = Notification::where('is_read', 0)->get();
        $notif_count = $isread->count();


        return view('user.user_edit', [
            'authUser'          => $authUser
        ])
            ->with('user', $user)
            ->with('skills', $skills)
            ->with('mySkills', $mySkills )
            ->with('volunteeringSkills', $volunteeringSkills )
            ->with('myVolunteeringSkills', $myVolunteeringSkills )
            ->with('redirect_url', $redirect_url)
            ->with('notif_count', $notif_count)
            ;
    }

    public function user_update(Request $request, $id)
    {

//        $request->all();
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
//            'contact' => 'required',
            'role' => 'required'
            /*'address' => '',
            'cv' => '',
            'image' => '',*/
        ];

        $data = $request->all();
        $validation = Validator::make($data, $rules);

        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation);
        }

        $user = User::findOrFail($id);

        $img_url = null;
        if( $request->hasFile('image') ) {

            $file = $request->file('image');

            $destination = public_path().'/uploads/images/users/';
            $filename = time().'_users.'.$file->getClientOriginalExtension();
            $file->move($destination, $filename);
            $img_url = '/uploads/images/users/'.$filename;
            $user->image = $img_url;
        }
        /*else {

            return redirect()->back()->withInput()->withErrors('Image Required');
        }*/

        $cv_url = null;
        if( $request->hasFile('cv') ) {

            $file = $request->file('cv');

            $destination = public_path().'/uploads/cv/users/';
            $filename = time().'_users.'.$file->getClientOriginalExtension();
            $file->move($destination, $filename);
            $cv_url = '/uploads/cv/users/'.$filename;
            $user->CV = $cv_url;

        }


        $user->name = $request->name;
        $user->email = $request->email;
        $user->adress = $request->adress;
        $user->contact = $request->contact;
        $user->role = $request->role;

        $notification = Notification::where('user_id', $id)->first();

        //dd($notification);
        if($notification != null) {
            $notification->is_read = 1;
            $notification->save();
        }

        /*return $request->volunteeringSKill;*/

        if($user->save()) {
            //$user->skills()->attach($request->skill);
            if($request->skill != null) $user->skills()->sync($request->skill);
            if($request->volunteeringSkill != null ) $user->volunteeringskill()->sync($request->volunteeringSkill);

            return redirect()->to($request->get('redirect_url'))->with('success','User Profile successfully updated');
        }
        else return redirect()->to($request->get('redirect_url'))->with('error','ERROR!!!');


    }

    public function destroy($id)
    {
        try{
            User::destroy($id);

            return redirect()->route('user.index')->with('success','User Deleted Successfully.');

        }catch(Exception $ex){
            return redirect()->route('user.index')->with('error','Something went wrong.Try Again.');
        }
    }
}
