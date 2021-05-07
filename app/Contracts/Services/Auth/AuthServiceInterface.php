<?php

namespace App\Contracts\Services\Auth;

interface AuthServiceInterface
{
     //Authentication & Change Password
    public function authenticateUser($credentials);
    public function changePassword($new_password);
}
