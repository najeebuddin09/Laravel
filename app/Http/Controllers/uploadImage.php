<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\File;

class uploadImage extends Controller
{
    public function uploadImage(Request $request) {
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $validated = $request->validate([
                    'image' => 'mimes:jpeg,png|max:1014',
                ]);
                $file_name = $request->image->getClientOriginalName();;
                $request->image->storeAs('/public/images', $file_name);
                $url = "/images/".$file_name;
                $store_image = new File;
                $store_image->name = $file_name;
                $store_image->url = $url;
                $store_image->uid = auth()->user()->id;
                $store_image->save();
                return redirect()->back();
            }
        }
        abort(500, 'Could not upload image :(');
    }

    public function viewUploads () {
        $images = File::all();
        return view('view_uploads')->with('images', $images);
    }
}