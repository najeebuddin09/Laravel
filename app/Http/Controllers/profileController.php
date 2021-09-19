<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\File;

class profileController extends Controller
{
    public function profile($id){
        $user_data = User::find($id);
        $image_url = File::where('uid','=',$id)->first();

        if ($image_url === null){
            return view('profile.show')->with('user_data', $user_data)->with('id',$id);
        } else {
            $image_url = $image_url->url;
            return view('profile.show')->with('user_data', $user_data)->with('image_url', $image_url);
        }


    }
}
