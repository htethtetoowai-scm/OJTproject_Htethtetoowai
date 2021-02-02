<?php

namespace App\Contracts\Dao\Post;

interface PostDaoInterface
{
  //get post list
  public function getPostList();
  public function postCreate($post);
  public function postUpdate($post,$id);
  public function searchPost($search);

}
