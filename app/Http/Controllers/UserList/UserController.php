<?php

namespace App\Http\Controllers\UserList;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function index(){
    	$users = User::all();
    	return view('userlist.user')->with(['users' => $users]);
    }

    public function make_admin($id){
    	$user = User::find($id);
    	$user->userType = 'Admin';
    	$user->save();

    	return redirect()->back();
    }

    public function make_user($id){
    	$user = User::find($id);
    	$user->userType = 'User';
    	$user->save();

    	return redirect()->back();
    }
}
