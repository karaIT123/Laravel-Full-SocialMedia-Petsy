<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;


class ConfirmEmailController extends Controller
{
    private $auth;
    public function __construct(Guard $auth){
        $this->auth = $auth;
    }
    public function confirm(\Illuminate\Support\Facades\Request $request, $user_id, $token)
    {
        $user = User::findOrFail($user_id);
        if($user->confirmation_token == $token && $user->confirmed == false){
            $user->confirmation_token = null;
            $user->confirmed = true;
            $user->save();
        }
        else{
            return abort(500);
            #return redirect('/')->with('error','Le token ne correspond pas.');
        }

        $this->auth->login($user);
        return redirect('/')->with('success','Votre compte à été validé avec succes.');
    }
}
