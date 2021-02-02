<?php

namespace App\Contracts\Dao\User;

interface UserDaoInterface
{
  //get post list
  public function getUserList();
   public function searchUser($user);
}
