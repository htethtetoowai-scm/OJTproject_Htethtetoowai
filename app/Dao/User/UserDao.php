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
  public function userCreate($user)
  {
    User::create([
      'name' => $user['name'],
      'email' => $user['email'],
      'password' => Hash::make($user['password']),
      'type' => $user['type'],
      'phone'=>$user['phone'],
      'address'=>$user['address'],
      'dob'=>$user['dob'],
      'profile'=>$user['profile'],
      'create_user_id' => $user['create_user_id'],
      'create_at' => $user['created_at'],
  ]);

  }
  public function userUpdate($user,$id)
  {
    $User=User::find($id);
    $User->name=$user['name'];
    $User->email=$user['email'];
    $User->type=$user['type'];
    $User->phone=$user['phone'];
    $User->address=$user['address'];
    $User->dob=$user['dob'];
    $User->updated_user_id=$user['updated_user_id'];
    $User->updated_at=$user['updated_at'];
    $User->update();
    return $User;
    $User->update($User->all());
  }
   public function userDel($id)
  {
    $User=User::find($id);
    $User->deleted_at=now();
    $User->deleted_user_id='1';
    $User->save();
    return $User;
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
