<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'roll_num' => 'required|integer|unique:users',
            'address' => 'required|string',
            'age' => 'required|integer',
        ]);
        $user = User::create($request->all());

        return response()->json($user,201);
    }
    public function index()
    {
        return User::all();
       // return response()->json(['users' => $users],200);
    }
    public function show($id)
    {
        return User::find($id);
        // if(!$user){
        //     return response()->json(['message'=>'User not found'],404);
        // }
        // return response()->json(['user'=>'$user'],200);
    }
    public function update(Request $request,$id)
    {
        $user = User::find($id);

    //     if(!$user){
    //     return response()->json(['message'=>'User not found'],404);
    //     }
    // $validatedData = $request->validate([
    //     'name' => 'string',
    //     'roll_num' => 'string|unique:users,roll_num,' . $id,
    //     'address' => 'string',
    //     'age' => 'integer',
    // ]);
    $user->update($request.all());

    return response()->json($user,200);
    }
    public function destroy($id)
    {
        User::destroy($id);
     
            return response()->json(['message'=>'User deleted successfully'],200);
    }
}

