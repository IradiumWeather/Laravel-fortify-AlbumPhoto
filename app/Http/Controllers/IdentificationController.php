<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $images = Auth::User()->images ?? 'Aucune image';
        return view('pages.index',['images' => $images]);
    }

    public function addImg(){
        return view('pages.addImg');
    }

    public function imgUploads(Request $request){
        $User = Auth::user();
        if($request->file('photo')->extension()=='jpg'){;
        $image = new Image();
        $image->name=$request->libphoto;
        $image->path= $request->file('photo')->storeAs($User->name,$request->libphoto.'jpg','public') ;
        $image->user_id= Auth::user()->id;
        $image->save();
        return redirect('')->with('message', 'Image ajouté avec succès');
        }
        else{
            return redirect()->back()->with('message', 'Le fichier doit être au format jpg');
        }
    }
}
