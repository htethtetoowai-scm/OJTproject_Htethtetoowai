<?php

namespace App\Services\Guest;

use App\Contracts\Dao\Guest\GuestDaoInterface;
use App\Contracts\Services\Guest\GuestServiceInterface;

class GuestService implements GuestServiceInterface
{
  private $guestDao;
  /**
   * Class Constructor
   * @param OperatorPostDaoInterface
   * @return
   */
  public function __construct(guestDaoInterface $guestDao)
  {
    $this->guestDao = $guestDao;
  }

  /**
   * Get Post List
   * @param Object
   * @return $postList
   */
  public function getPostList()
  {
    return $this->guestDao->getPostList();
  }
  public function searchPost($search)
  {
    return $this->postDao->searchPost($search);
  }
}
