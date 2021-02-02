<?php

namespace App\Contracts\Services\User;

interface UserServiceInterface
{
  //get post list
  public function getUserList();
  public function searchUser($user);
}
