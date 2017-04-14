<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Naux\Mail\SendCloudTemplate;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar','confirmation_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token){
        $bind_data = ['url' => route('password.reset', $token)];
        $template = new SendCloudTemplate('zhihu_register', $bind_data);
        Mail::raw($template, function ($message){
            $message->from('784761017@qq.com', 'zhihu-app');
            $message->to($this->email);
        });
    }
}
