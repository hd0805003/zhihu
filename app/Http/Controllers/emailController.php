<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User
class emailController extends Controller
{
    public function verify($token){
    	$user=User::where('token',$token)->first();
    	if(is_null($user)){
    		return redirect('/');
    	}
    	$user->is_active=1;
    	$user->confirmation_token=str_random(40);
    	$user->save();
    	return redirect('/home');
    }
}
