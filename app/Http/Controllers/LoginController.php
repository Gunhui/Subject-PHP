<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    //
	public function __construct() {
		return $this->middleware('guest', ['except'=>'destroy']);
	}

    public function destroy() {
    	auth()->logout();
    	
    	return redirect('bbs')->with('message', '다시뵈요');
    }

    public function create() {
    	return view('sessions.create');
    }

    public function store(Request $request) {
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required|min:6',
		]);
		
		$confirm = DB::table('users')->where('email', $request->email)->value('activated');
		if($confirm != 1){
			return back()->with('message', '본인의 메일에서 인증해주세요');
		}


    	if(!auth()->attempt($request->only('email', 'password'), $request->has('remember'))) {
 
    		return back()->withInput();
    	}
    	//Auth::logoutOtherDevices($request->password);
    	return redirect()->intended('bbs');
    }   
}
