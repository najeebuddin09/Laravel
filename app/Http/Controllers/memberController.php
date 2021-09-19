<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class memberController extends Controller
{
    public function showMembers(){
        $members = User::all();
        return view('members.show')->with('members',$members);
    }
}
