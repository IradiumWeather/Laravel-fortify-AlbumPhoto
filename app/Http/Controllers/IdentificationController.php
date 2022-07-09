<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdentificationController extends Controller
{
    //

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function gallery(){
        $images = Auth::User()->images;
        return view('pages.index',['images' => $images]);
    }

    public function addImg(){
        return view('pages.addImg');
    }

    public function imgUploads(Request $request){
        $image = new Image();
        return redirect('pages.index')->with('message', 'Image ajouté avec succès');
    }
}
