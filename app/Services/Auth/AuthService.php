<?php

namespace App\Services\Auth;

use App\Contracts\Dao\Auth\AuthDaoInterface;
use App\Contracts\Services\Auth\AuthServiceInterface;

class AuthService implements AuthServiceInterface
{
  private $authDao;

  /**
   * Class Constructor
   * @param AuthDaoInterface
   * @return
   */
  public function __construct(AuthDaoInterface $authDao)
  {
    $this->authDao = $authDao;
  }
  public function authenticateUser($credentials)
  {
    return $this->authDao->authenticateUser($credentials);
  }
  public function changePassword($new_password)
  {
    return $this->authDao->changePassword($new_password);
  }
}
