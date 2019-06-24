<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Hike;

class UserController extends Controller
{
    public function index(){
        //
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
