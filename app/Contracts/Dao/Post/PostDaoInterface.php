<?php

namespace App\Contracts\Dao\Post;

interface PostDaoInterface
{
  //get post list
  public function getPostList();
  public function searchPost($search);

}
