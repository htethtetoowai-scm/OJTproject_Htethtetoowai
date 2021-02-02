<?php

namespace App\Contracts\Services\Post;

interface PostServiceInterface
{
  //get post list
  public function getPostList();
  public function postCreate($post);
  public function postUpdate($post,$id);
  public function postDel($post,$id);
  public function searchPost($search);
 
}
