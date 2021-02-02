<?php

namespace App\Contracts\Dao\User;

interface UserDaoInterface
{
  //get user list
  public function getUserList();
  public function userCreate($user);
  public function userUpdate($user,$id);
  public function userDel($id);
  public function searchUser($user);
}
