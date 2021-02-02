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
  public function postCreate($post)
  {
    Post::create([
      'title' => $post['title'],
      'description' => $post['description'],
      'status' => $post['status'],
      'create_user_id' => $post['create_user_id'],
      'create_at' => $post['created_at'],
  ]);
  }
  public function postUpdate($post,$id)
  {
    $Post=Post::find($id);
    $Post->title=$post['title'];
    $Post->description=$post['description'];
    $Post->status=$post['status'];
    $Post->updated_user_id=Auth::user()->id;
    $Post->updated_at=now();
    $Post->update();
    return $Post;
    $post->update($Post->all());
  }
  public function postDel($post,$id)
  {
    $Post=Post::find($id);
    $Post->deleted_at=now();
    $Post->deleted_id='1';
    $Post->save();
    return $Post;
  }
  public function searchPost($search)
  {
    $posts= Post::where('title', '=',$search)
        ->orwhere('description','=',$search)
        ->paginate(5);
        return $posts;
  }
}
