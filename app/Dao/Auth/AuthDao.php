<?php

namespace App\Dao\Auth;

use App\Contracts\Dao\Auth\AuthDaoInterface;
use App\Models\User;
use Hash;
use Auth;

class AuthDao implements AuthDaoInterface
{
    public function authenticateUser($credentials)
    {
        if (Auth::attempt($credentials))
        {
            $results="true";
            return $results;
        }
        $results="false";
        return $results;
    }
    public function changePassword($new_password)
    {
        User::find(auth()->user()->id)->update(['password'=> Hash::make($new_password)]);
    }
}
