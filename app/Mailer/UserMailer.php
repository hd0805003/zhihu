<?php
namespace App\Mailer;

/**
* 
*/
class UserMailer extends Mailer{
	
	// function __construct(argument)
	// {
	// 	# code...
	// }
	public function RegisterSendToEamil($user){
		$subject='用户激活';
		$view='zhihu_register';
		$data=['%name%'=>[$user->name],'%url%' =>[route('email.verify',['token'=>$user->confirmation_token])]];
		$this->sendTo($user,$subject,$view,$data);
	}
}