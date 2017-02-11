<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Skill;

class PagesController extends Controller
{
    //
    public function welcome() {
    	return view('welcome');
    }

    public function search()
    {
    	/*$people = ['Lopa', 'Abir', 'Partho'];*/
        return view('search');
		/*return view( 'pages.about', compact('people') );*/
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

    public function edit($id)
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

        /*return $request->all();*/
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($user->save()) {
            //$user->skills()->attach($request->skill);
            $user->skills()->sync($request->skill);
            return redirect()->route('home')->with('success','skill Successfully Added');
        }
        else return redirect()->route('home')->with('error','ERROr');


    }

}
