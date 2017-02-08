<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

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
        // return $authUser -> name;
        return view('edit',[
            'authUser'          => $authUser
        ]);
    }

    public function profileUpdate(Request $request, $id)
    {
        return hello ;
    }

}
