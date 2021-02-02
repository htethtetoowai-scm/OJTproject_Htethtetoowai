<?php

namespace App\Dao\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Models\User;
use Hash;
use Auth;

class UserDao implements UserDaoInterface
{
  /**
   * Get Operator List
   * @param Object
   * @return $operatorList
   */
  public function getUserList()
  {
    return User::latest()->paginate(5);
  }
  
  public function searchUser($user)
  { 
      if(!empty($user['name']))
    {
        $users=User::where('name', '=',$user['name'])->paginate(5);
    }
    if(!empty($user['email']))
    {
        $users=User::where('email', '=',$user['email'])->paginate(5);
    }
    if(!empty($user['create_to']))
    {
        $users=User::whereDate('created_at','>=',$user['create_to'])->paginate(5);
    }
    if(!empty($user['create_from']))
    {
        $users=User::whereDate('created_at','<=',$user['create_from'])->paginate(5);
    }
    return $users;
  }
}
