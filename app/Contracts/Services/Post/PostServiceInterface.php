<?php

namespace App\Contracts\Services\Post;

interface PostServiceInterface
{
  //get post list
  public function getPostList();
   public function searchPost($search);
 
}
