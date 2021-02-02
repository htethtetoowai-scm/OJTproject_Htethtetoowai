<?php

namespace App\Contracts\Dao\Guest;

interface GuestDaoInterface
{
  //get post list
  public function getPostList();
  public function searchPost($search);

}
