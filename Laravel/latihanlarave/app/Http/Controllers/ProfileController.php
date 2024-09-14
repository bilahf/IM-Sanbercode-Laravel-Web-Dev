<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function index(){
        $iduser= Auth::id();
        $detailProfile =Profile::where('user_id', $iduser)->first();
        return view('profile.index', ['detailProfile'=>$detailProfile]);

    }
    public function update(Request $request, $id){
        $request->validate([
            'age'=>'required',
            'bio'=>'required',
        ]);
        $profile =Profile::find($id);
        $profile->age=$request->age;
        $profile->bio=$request->bio;
        $profile->save();
        return redirect('/profile');




    }
}
