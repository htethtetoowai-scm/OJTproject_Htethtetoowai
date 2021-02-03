<?php

namespace App\Dao\Guest;

use App\Contracts\Dao\Guest\GuestDaoInterface;
use App\Models\Post;
use DB;

class GuestDao implements GuestDaoInterface
{
  /**
   * Get Operator List
   * @param Object
   * @return $operatorList
   */
  public function getPostList()
  {
    $posts= Post::where('deleted_id', '=',NUll)
    ->orwhere('status','=','1')
    ->paginate(5);
    return $posts;
  }
  public function searchPost($search)
  {
    $posts= Post::where('title', '=',$search)
        ->orwhere('description','=',$search)
        ->paginate(5);
        return $posts;
  }
}
