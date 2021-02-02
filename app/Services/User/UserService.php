<?php

namespace App\Services\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Contracts\Services\User\UserServiceInterface;

class UserService implements UserServiceInterface
{
  private $userDao;
  /**
   * Class Constructor
   * @param OperatorUserDaoInterface
   * @return
   */
  public function __construct(UserDaoInterface $userDao)
  {
    $this->userDao = $userDao;
  }

  /**
   * Get User List
   * @param Object
   * @return $UserList
   */
  public function getUserList()
  {
    return $this->userDao->getUserList();
  }
  public function userCreate($user)
  {
    return $this->userDao->userCreate($user);
  }
  public function userUpdate($user,$id)
  {
    return $this->userDao->userUpdate($user,$id);
  }
  public function userDel($id)
  {
    return $this->userDao->userDel($id);
  }
  public function searchUser($user)
  {
    return $this->userDao->searchUser($user);
  }
}
