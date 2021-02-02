<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Contracts\Services\Post\PostServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Exports\AdminPostsExport;
use App\Exports\GuestPostsExport;
use App\Imports\PostsImport;
use Maatwebsite\Excel\Facades\Excel;

class PostController extends Controller
{
    private $postInterface;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(postServiceInterface $postInterface)
    {
        $this->postInterface = $postInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts =$this->postInterface->getPostList();
        return view('posts.index', [
            'posts' => $posts],compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Display Created User Name in Post List.
     */
    public static function userName($id) {
        $user=User::find($id);
        $userName=$user->name;
        return  $userName;
    }
    /**
     * Search function in Post List .
     */
    public function searchPost(Request $request)
    {
        $search = $request->get('search');
        $posts =$this->postInterface->searchPost($search);
        if($posts->isEmpty()){
            return redirect()->route('posts.index')->with('success','Oops! Sorry, nothing was Found...');
        }
        else
        {
            return view('posts.index', ['posts' => $posts],compact('posts'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }
   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
}