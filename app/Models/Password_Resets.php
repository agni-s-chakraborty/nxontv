<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Event;
use App\Jobs\SendEmailJob;

class Password_Resets extends Model
{
    protected $table = 'password_resets';
    public $timestamps = false;

    protected $fillable = [
        'email','token','created_at'
    ];

    public function forgotLink($token,$email,$name='')
    {
        dispatch(new SendEmailJob([
            '_blade'=>'forgot',
            'subject'=>trans('Reset Your Password'),
            'email'=>$email,
            'name'=>$name,
            'token'=>$token
        ]));
    }
}
