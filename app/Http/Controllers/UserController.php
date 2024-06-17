<?php

namespace App\Http\Controllers;
use App\Http\Requests\User\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function index(Request $request)
    {
        $users= User::get();
		if(!$request->ajax()) return view();//users.index,compact('users')
		return response()->json(['users' => $users], 200);
    }

    public function create()
    {
        // return view('users.create');
    }

    public function store(UserRequest $request)
    {
        $user = new User($request->all());
		$user->save();
		if(!$request->ajax()) return back()->with('sucess', 'User created');
		return response()->json(['status' => 'User created', 'user' => $user], 201);
    }

    public function edit($id)
    {
        //return view('users.edit',compact('user'))
    }


    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());
		if(!$request->ajax()) return back()->with('success','User updated');
		return response()->json([],204);
    }

    public function destroy(Request $request, User $user)
    {
		$user->delete($request->all());
		if(!$request->ajax()) return back()->with('success','User deleted');
		return response()->json([],204);
    }
}
