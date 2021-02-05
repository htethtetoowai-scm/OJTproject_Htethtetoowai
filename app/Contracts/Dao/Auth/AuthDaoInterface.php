<?php

namespace App\Contracts\Dao\Auth;

interface AuthDaoInterface
{
    //Authentication & Change Password
    public function authenticateUser($credentials);
    public function changePassword($new_password);
}
