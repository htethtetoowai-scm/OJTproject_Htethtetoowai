<?php

namespace App\Contracts\Services\Guest;

interface GuestServiceInterface
{
  //get post list
  public function getPostList();
  public function searchPost($search);
}
