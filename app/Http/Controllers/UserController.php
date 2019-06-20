<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function hikes(){
        return view('hikes');
    }

    public function createHike(){
        return view('createHike', array('user' => Auth::user()));
    }

    public function editHike(){
        return view('editDeleteHike', array('user' => Auth::user()));
    }

    public function editProfile(){
        return view('editProfile', array('user' => Auth::user()));
    }
}
