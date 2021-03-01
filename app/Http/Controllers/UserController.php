<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    function showAll(){
        $user = User::all();

        return view('viewAll', compact('user'));
    }
}
