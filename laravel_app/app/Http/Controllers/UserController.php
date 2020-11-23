<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role_id',2)->get()->toArray();
        return array_reverse($users);
    }

    public function add(Request $request)
    {
        $user = new User([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'gender' => $request->gender,
            'password' => \Hash::make($request->password),
            'image' => $request->image,
        ]);
        $user->save();

        return response()->json('The User successfully added');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    public function update($id, Request $request)
    {
        $User = User::find($id);
        $User->update($request->all());

        return response()->json('The User successfully updated');
    }

    public function delete($id)
    {
        $User = User::find($id);
        $User->delete();

        return response()->json('The User successfully deleted');
    }
}
