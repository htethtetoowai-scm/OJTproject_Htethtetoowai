<?php

namespace App\Http\Controllers\Post;

use App\Contracts\Services\Post\PostServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AdminPostsExport;
use App\Exports\GuestPostsExport;
use Illuminate\Http\Request;
use App\Imports\PostsImport;
use App\Models\Post;
use App\Models\User;

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
        if(!$id==NULL)
        {
            $user=User::find($id);
            $userName=$user->name;
            return  $userName;
        }
        else{
            $userName="-";
            return  $userName;
        }
      
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
    public function create()
    {
        return view('posts.create');
    }
    public function confirmCreatePost(Request $request)
    {   
        $request->validate([
            'title' => 'required|max:255|string|unique:posts',
            'description' => 'required',
        ]);
        $post=$request->only([
            'title',
            'description',
        ]);
        return view('posts.confirmCreatePost',compact('post'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $post=$request->only([
            'title',
            'description',
         ]);
         $post['status']='1';
         $post['create_user_id']=Auth::user()->id;
         $post['created_at']=now();
        try {
            $result['data']= $this->postInterface->postCreate($post);
        }catch(Exception $e)
        {
            $result=[
            'status'=>500,
            'error'=>$e->getMessage()
            ];
        }
        return redirect()->route('posts.index')->with('success','Post Created Successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
         return view('posts.show',compact('post'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        return view('posts.edit',compact('post'));
    }
    public function confirmUpdatePost(Request $request)
    {   
        $request->validate([
            'id'=>'required',
            'title' => 'required|max:255|unique:posts,title,'.$request->id,
            'description' => 'required',
            'status'=>'required'
           
        ]);
        $post['id']=$request->id;
        $post['title']=$request->title;
        $post['description']=$request->description;
        $post['status']=$request->status;
        return view('posts.confirmUpdatePost',compact('post'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function updating(Request $request)
    {
      
        $id=$request->id;
        $post['title']=$request->title;
        $post['description']=$request->description;
        if($request->status==="Active")
        {
            $post['status']='1';
        }
        else
        {
            $post['status']='0';
        }
            $result['data']= $this->postInterface->postUpdate($post,$id);
             return redirect()->route('posts.index')
                        ->with('success','Post Updated Successfully');
    }
    public function uploadCSV()
    {
       return view('posts.uploadCSV');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    *download post by admin
    */
    public function exportByAdmin() 
    {
        return Excel::download(new AdminPostsExport(), 'posts.xlsx');
    }
    /**
    * @return \Illuminate\Support\Collection
     *download post by guest
    */
    public function exportByGuest()
    {
        return Excel::download(new GuestPostsExport(), 'posts.xlsx');
    }
   
    /**
    *Import CSV file 
    * @return \Illuminate\Support\Collection
    */
    public function import(request $request) 
    {
        $request->validate([
            'file'=>'required|max:2048',
       ]);
        Excel::import(new PostsImport,request()->file('file'));
           
        return redirect()->route('posts.index')
        ->with('success','Post Uploaded Successfully');
    }
      /**
     * Show Delete Confirmation..
     */
    public function showDelPost($id)
    {
        $post=Post::find($id);
        return view('posts.showDelPost',compact('post'));
    }
    /**
     *Doing Soft Delete.
     */
    public function delPost(Request $request)
    {
        $request->validate([
            'id'=>'required',
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'create_user' => 'required',
        ]);
        $post=$request->only([
            'id',
            'title',
            'description',
            'status',
            'create_user',
        ]);
        $id=$request->id;
        $result['data']= $this->postInterface->postDel($post,$id);
        return redirect()->route('posts.index')
                        ->with('success','Post deleted Successfully');
    }
}