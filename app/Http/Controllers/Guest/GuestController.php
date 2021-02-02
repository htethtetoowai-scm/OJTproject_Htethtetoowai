<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Contracts\Services\Guest\GuestServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class GuestController extends Controller
{private $GuestInterface;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(guestServiceInterface $guestInterface)
    {
        $this->guestInterface = $guestInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->guestInterface->getPostList();
        return view('guestIndex', [
            'posts' => $posts],compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public static function getName($id) {
        $user=User::find($id);
        $userName=$user->name;
        return  $userName;
    }
    public function searchByGuest(Request $request)
    {
        $search = $request->get('search');
        $posts =$this->guestInterface->searchPost($search);
        if($posts->isEmpty()){
            return redirect()->route('guestIndex')
                        ->with('success','Oops! Sorry, nothing was Found...');
        }
        else
        {
            return view('guestIndex', [
                'posts' => $posts],compact('posts'))
                ->with('i', (request()->input('page', 1) - 1) * 5);  
        }
    }
  
}