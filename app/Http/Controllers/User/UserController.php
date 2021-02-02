<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\User;
use App\Contracts\Services\User\UserServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $userInterface;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(userServiceInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userInterface->getUserList();
        return view('users.index', [
            'users' => $users],compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
     /**
     * Display Created User Name in User List.
     */
    public static function getCreateUser($id) {
        $user=User::find($id);
        $userName=$user->name;
        return  $userName;
    }
    /**
     * Search function in user List .
    */
    public function searchUser(Request $request)
    {
        $user['name']=$request->searchName;
        $user['email']=$request->searchEmail;
        $user['create_to']=$request->searchCreated_at;
        $user['create_from']=$request->searchCreated_from;
        $users = $this->userInterface->searchUser($user);
        if($users->isEmpty()){
            return redirect()->route('users.index')->with('success','Oops! Sorry, nothing was Found...');
        }
        else
        {
            return view('users.index', ['users' => $users],compact('users'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }
 
}