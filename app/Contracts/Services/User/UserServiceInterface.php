<?php

namespace App\Contracts\Services\User;

interface UserServiceInterface
{
  //get user list
  public function getUserList();
  public function userCreate($user);
  public function userUpdate($user,$id);
  public function userDel($id);
  public function searchUser($user);
}
