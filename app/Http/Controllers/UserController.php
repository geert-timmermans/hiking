<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        //
    }

    public function edit(){
        return view('editProfile', array('user' => Auth::user()));
    }
    public function update(Request $request){
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $user = User::find(Auth::user()->id);
        $user->email = $request->email;
        $user->name = $request->name;

        if($request->password){
            $validate = $request->validate([
                'password' => ['string', 'min:8', 'confirmed'],
            ]);
            $user->password = Hash::make($request->password);
        }

        if ($validate){
            $user->save();
        }
        return view('editProfile', array('user' => $user));
    }
}
