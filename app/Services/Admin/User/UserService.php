<?php

namespace App\Services\Admin\User;

use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserService
{
    public function store($data)
    {
        if(isset($data['generate_new_password'])){
            $data['password']=Str::random(10);
        }
        Mail::to($data['email'])->send(new PasswordMail($data['password']));
        $data['password'] = Hash::make($data['password']);
        $user = User::firstOrCreate(['email' => $data['email']], $data);
        event(new Registered($user));
    }

    public function update($data, $user){
        if($data['password'] == NULL){
            unset($data['password']);
        }
        else{
            $data['password'] = Hash::make($data['password']);
        }
        $user->update($data);
    }
}
