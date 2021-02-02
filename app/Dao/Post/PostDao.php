<?php

namespace App\Dao\Post;

use App\Contracts\Dao\Post\PostDaoInterface;
use App\Models\Post;
use App\Models\User;
use Auth;
use DB;
class PostDao implements PostDaoInterface
{
  /**
   * Get Operator List
   * @param Object
   * @return $operatorList
   */
  public function getPostList()
  {
    $id=Auth::user()->id;
    if(Auth::user()->type==0)
    {
      $posts = DB::table('posts')->paginate(5);
    }
    else
    {
      $posts=Post::where('create_user_id',"=",$id)->paginate(5);
    }
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
