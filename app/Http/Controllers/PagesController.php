<?php

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


class PagesController extends Controller
{
    //
    public function welcome() {
        $volunteeringSkills = VolunteeringSkill::all();
        $fields = Skill::groupBy('field')->pluck('field', 'field');
        $fields_skills = [];

        foreach ($fields as $field ) {
            $fields_skills[$field] = Skill::where('field' , '=', $field )->get();
        }
        /*return $skills;*/

        /*$people = ['Lopa', 'Abir', 'Partho'];*/
        $authUser = Auth::user();

        $isread = Notification::where('is_read', 0)->get();
        $notif_count = $isread->count();


        return view( 'welcome', [
            'authUser'          => $authUser
        ])
            -> with('fields_skills', $fields_skills)
            ->with('volunteeringSkills', $volunteeringSkills)
            ->with('fields', $fields)
            ->with('notif_count', $notif_count)
            ;
    }

    public function welcome_search() {
        $volunteeringSkills = VolunteeringSkill::all();
        $fields = Skill::groupBy('field')->pluck('field', 'field');
        $fields_skills = [];

        foreach ($fields as $field ) {
            $fields_skills[$field] = Skill::where('field' , '=', $field )->get();
        }
        /*return $skills;*/

        /*$people = ['Lopa', 'Abir', 'Partho'];*/
        $authUser = Auth::user();

        $isread = Notification::where('is_read', 0)->get();
        $notif_count = $isread->count();


        return view( 'welcome_search', [
            'authUser'          => $authUser
        ])
            -> with('fields_skills', $fields_skills)
            ->with('volunteeringSkills', $volunteeringSkills)
            ->with('fields', $fields)
            ->with('notif_count', $notif_count)
            ;
    }


    public function search()
    {
        //$skills = Skill::groupBy('field')->get();
        $volunteeringSkills = VolunteeringSkill::all();
        $fields = Skill::groupBy('field')->pluck('field', 'field');
        $fields_skills = [];

        foreach ($fields as $field ) {
            $fields_skills[$field] = Skill::where('field' , '=', $field )->get();
        }
        /*return $skills;*/

        /*$people = ['Lopa', 'Abir', 'Partho'];*/
        $authUser = Auth::user();

        $isread = Notification::where('is_read', 0)->get();
        $notif_count = $isread->count();


        return view( 'searchres2', [
                'authUser'          => $authUser
                ])
                -> with('fields_skills', $fields_skills)
                    ->with('volunteeringSkills', $volunteeringSkills)
                        ->with('fields', $fields)
                        ->with('notif_count', $notif_count)
                        ;

       /* return view('search')
        ->with('skills', $skills)
        ;*/
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
        $this->validate($request, ['skill'=>'required'] );
        //return $request->all();
        //return $request->skill;
        $skills = $request->skill;
        $authUser = Auth::user();

         $filtered = UserSkill::whereIn('skill_id', $skills)->pluck('user_id');
         $users = User::whereIn('id',$filtered)->get();

         //-----------------------
        $volunteeringSkills = VolunteeringSkill::all();
        $fields = Skill::groupBy('field')->pluck('field', 'field');
        $fields_skills = [];

        foreach ($fields as $field ) {
            $fields_skills[$field] = Skill::where('field' , '=', $field )->get();
        }
        //---------------------------

        /*$filteredVolSkills = UserSkill::whereIn('skill_id', $skills)->pluck('user_id');
        $users = User::whereIn('id',$filteredVolSkills)->get();*/
        $isread = Notification::where('is_read', 0)->get();
        $notif_count = $isread->count();


        return view('searcResult_withSearchBox', [
            'authUser'          => $authUser
        ])
            ->with('users', $users)
            ->with('fields_skills', $fields_skills)
            ->with('volunteeringSkills', $volunteeringSkills)
            ->with('fields', $fields)
            ->with('notif_count', $notif_count)
            ;

       /*return view('search_result')
       ->with('users', $users)
       ;
       $user->skills()->sync($request->skill);
            return redirect()->route('home')->with('success','skill Successfully Added');
        return view('searchResult');
       */
    }
    //--------------------

    public function forum()
    {
        $authUser = Auth::user();

        $isread = Notification::where('is_read', 0)->get();
        $notif_count = $isread->count();


        return view('forum', [
            'authUser' => $authUser
        ])
            ->with('notif_count', $notif_count);
    }

    public function home()
    {
        $authUser = Auth::user();
        $userid = $authUser->id;
        $achievements = User::find($userid)->achievements;
        $projects = User::find($userid)->projects;
        $papers = User::find($userid)->papers;


        if( strcmp($authUser->image, '') == 0) {
            $authUser->image = '/uploads/images/users/annonymus.jpg';

            $authUser->save();
        }

        $isread = Notification::where('is_read', 0)->get();
        $notif_count = $isread->count();


        return view('profile_tp2',
        [
            'authUser'          => $authUser
        ])
            ->with('achievements', $achievements)
                ->with('projects', $projects)
                    ->with('papers', $papers)
                        ->with('notif_count', $notif_count)
                    ;
    }

    public function edit(Request $request, $id )
    {
        $authUser = Auth::user();
        
        $skills = Skill::all();

        $mySkills = [];
        foreach ($authUser->skills as $skill) {
            $mySkills[] = $skill->id;
        }

        $volunteeringSkills = VolunteeringSkill::all();
        $myVolunteeringSkills = [];
        foreach ($authUser->volunteeringskill as $volunteeringSkill) {
            $myVolunteeringSkills[] = $volunteeringSkill->id;
        }

        $isread = Notification::where('is_read', 0)->get();
        $notif_count = $isread->count();


        return view('edit_card',[
            'authUser'          => $authUser
        ])
        ->with('skills', $skills)
            ->with('mySkills', $mySkills )
                ->with('volunteeringSkills', $volunteeringSkills )
                    ->with('myVolunteeringSkills', $myVolunteeringSkills )
                        ->with('notif_count', $notif_count )
                        ;
        // return $authUser -> name;
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

        /*return $request->volunteeringSKill;*/
        //dd($request->volunteeringSkill);

        if($user->save()) {
            //$user->skills()->attach($request->skill);
            if($request->skill != null) $user->skills()->sync($request->skill);
            if($request->volunteeringSkill != null ) $user->volunteeringskill()->sync($request->volunteeringSkill);

            return redirect()->route('home')->with('success','Profile successfully updated');
        }
        else return redirect()->route('home')->with('error','ERROR!!!');


    }

    public function show_user_profile($id) {

        $user = User::findOrFail($id);
        $authUser = Auth::user();
        $userid = $id;
        $achievements = User::find($userid)->achievements;
        $projects = User::find($userid)->projects;
        $papers = User::find($userid)->papers;
//        $comments =Post::find($id)->comments;

        $isread = Notification::where('is_read', 0)->get();
        $notif_count = $isread->count();

//        dd($user);

        return view('show_user_profile', [
            'authUser' => $authUser
            ])
            ->with('user', $user)
            ->with('achievements', $achievements)
            ->with('projects', $projects)
            ->with('papers', $papers)
            ->with('notif_count', $notif_count)
            ;
    }

    public function about_us() {
        $destination = public_path().'/uploads/images/users/';
        $authUser = Auth::user();

        $isread = Notification::where('is_read', 0)->get();
        $notif_count = $isread->count();

        return view('about_us', [
            'authUser' => $authUser
        ])
            ->with('destination', $destination)
            ->with('notif_count', $notif_count)
            ;
    }

    public function notifications() {

        $authUser = Auth::user();
        $notifications =Notification::orderBy('created_at', 'desc')->paginate(10);
        $isread = Notification::where('is_read', 0)->get();
        $notif_count = $isread->count();


        return view('notifications', [
            'authUser' => $authUser
            ])
            ->with('notif_count', $notif_count)
            ->with('notifications', $notifications)

            ;
    }

    public function userslist()
    {
        $users = USER::orderBy('created_at', 'desc')->paginate(4);
        $authUser = Auth::user();

        $isread = Notification::where('is_read', 0)->get();
        $notif_count = $isread->count();


        return view('userslist', [
            'authUser'          => $authUser
        ])
            ->with('users', $users)
            ->with('notif_count', $notif_count)
            ;
    }

}



//dd
//public function userslist()
//{
//    $users = USER::orderBy('created_at', 'desc')->paginate(4);
//    $authUser = Auth::user();
//
//    $isread = Notification::where('is_read', 0)->get();
//    $notif_count = $isread->count();
//
//
//    return view('userslist', [
//        'authUser'          => $authUser
//    ])
//        ->with('users', $users)
//        ->with('notif_count', $notif_count)
//        ;
//}
//
//public function user_edit($id, Request $request) {
//
//    $user = User::findOrFail($id);
//    $authUser = Auth::user();
//
////        return view('user.user_edit', [
////            'authUser'          => $authUser
////        ])
////            ->with('user', $user)
////            ;
//
////        $authUser = Auth::user();
//
//    $skills = Skill::all();
//
//    $mySkills = [];
//    foreach ($authUser->skills as $skill) {
//        $mySkills[] = $skill->id;
//    }
//
//    $volunteeringSkills = VolunteeringSkill::all();
//    $myVolunteeringSkills = [];
//    foreach ($authUser->volunteeringskill as $volunteeringSkill) {
//        $myVolunteeringSkills[] = $volunteeringSkill->id;
//    }
//    $redirect_url = $request->get('redirect_url', 'userslist');
//
//    $isread = Notification::where('is_read', 0)->get();
//    $notif_count = $isread->count();
//
//
//    return view('user.user_edit', [
//        'authUser'          => $authUser
//    ])
//        ->with('user', $user)
//        ->with('skills', $skills)
//        ->with('mySkills', $mySkills )
//        ->with('volunteeringSkills', $volunteeringSkills )
//        ->with('myVolunteeringSkills', $myVolunteeringSkills )
//        ->with('redirect_url', $redirect_url)
//        ->with('notif_count', $notif_count)
//        ;
//}
//
//public function user_update(Request $request, $id)
//{
//
////        $request->all();
//    $rules = [
//        'name' => 'required',
//        'email' => 'required|email',
////            'contact' => 'required',
//        'role' => 'required'
//        /*'address' => '',
//        'cv' => '',
//        'image' => '',*/
//    ];
//
//    $data = $request->all();
//    $validation = Validator::make($data, $rules);
//
//    if ($validation->fails()) {
//        return redirect()->back()->withInput()->withErrors($validation);
//    }
//
//    $user = User::findOrFail($id);
//
//    $img_url = null;
//    if( $request->hasFile('image') ) {
//
//        $file = $request->file('image');
//
//        $destination = public_path().'/uploads/images/users/';
//        $filename = time().'_users.'.$file->getClientOriginalExtension();
//        $file->move($destination, $filename);
//        $img_url = '/uploads/images/users/'.$filename;
//        $user->image = $img_url;
//    }
//    /*else {
//
//        return redirect()->back()->withInput()->withErrors('Image Required');
//    }*/
//
//    $cv_url = null;
//    if( $request->hasFile('cv') ) {
//
//        $file = $request->file('cv');
//
//        $destination = public_path().'/uploads/cv/users/';
//        $filename = time().'_users.'.$file->getClientOriginalExtension();
//        $file->move($destination, $filename);
//        $cv_url = '/uploads/cv/users/'.$filename;
//        $user->CV = $cv_url;
//
//    }
//
//
//    $user->name = $request->name;
//    $user->email = $request->email;
//    $user->adress = $request->adress;
//    $user->contact = $request->contact;
//    $user->role = $request->role;
//
//    $notification = Notification::where('user_id', $id)->first();
//
//    $notification->is_read = 1;
//
//    $notification->save();
//
//
//    /*return $request->volunteeringSKill;*/
//
//    if($user->save()) {
//        //$user->skills()->attach($request->skill);
//        $user->skills()->sync($request->skill);
//        $user->volunteeringskill()->sync($request->volunteeringSkill);
//
//        return redirect()->to($request->get('redirect_url'))->with('success','Role successfully updated');
//    }
//    else return redirect()->to($request->get('redirect_url'))->with('error','ERROR!!!');
//
//
//}
//
