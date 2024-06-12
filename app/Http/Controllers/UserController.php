<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function index(Request $request)
    {
        $users= User::get();
		if(!$request->ajax()) return view();
		return response()->json(['users' => $users], 200);
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $user = new User($request->all());
		$user->save();
		if(!$request->ajax()) return back()->with('sucess', 'User created');
		return response()->json(['status' => 'User created', 'user' => $user], 201);
    }


    public function show( Request $request, User $user)
    {
        if(!$request->ajax()) return view();
		return response()->json(['user' => $user], 200);
    }
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
