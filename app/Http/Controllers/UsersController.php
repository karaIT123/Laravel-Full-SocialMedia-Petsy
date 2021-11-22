<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    private $auth;
    public function __construct(Guard $auth)
    {
        $this->middleware('auth');
        $this->auth = $auth;
    }

    public function edit(){
        $user = $this->auth->user();
        return view('users.edit', array('user' => $user));
    }

    public function update(Request  $request){
        $user = $this->auth->user();

        #dd($request->all());

        $this->validate($request, [
            'name' => "required|min:2|unique:users,name,$user->id",
            'avatar' => "image"
        ]);

        $user->update($request->only('name','firstname','lastname','avatar'));
        return redirect()->back()->with('success','Votre profil a bien été modifié');
    }
}
