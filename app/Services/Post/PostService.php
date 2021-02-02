<?php

namespace App\Services\Post;

use App\Contracts\Dao\Post\PostDaoInterface;
use App\Contracts\Services\Post\PostServiceInterface;

class PostService implements PostServiceInterface
{
  private $postDao;
  /**
   * Class Constructor
   * @param OperatorPostDaoInterface
   * @return
   */
  public function __construct(PostDaoInterface $postDao)
  {
    $this->postDao = $postDao;
  }

  /**
   * Get Post List
   * @param Object
   * @return $postList
   */
  public function getPostList()
  {
    return $this->postDao->getPostList();
  }
  public function postCreate($post)
  {
    return $this->postDao->postCreate($post);
  }
  public function postUpdate($post,$id)
  {
    return $this->postDao->postUpdate($post,$id);
  }
  public function postDel($post,$id)
  {
    return $this->postDao->postDel($post,$id);
  }
  public function searchPost($search)
  {
    return $this->postDao->searchPost($search);
  }
}
