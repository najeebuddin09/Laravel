<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class postController extends Controller
{
    public function submitPost(){
        $new_post = new Post;
        $new_post->title = request('title');
        $new_post->body = request('body');
        $new_post->user_name = auth()->user()->name;
        $new_post->uid = auth()->user()->id;
        $new_post->save();
        return redirect('/home');
    }
}
