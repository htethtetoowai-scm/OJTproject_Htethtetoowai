<?php

namespace App\Http\Controllers\User;

use App\Contracts\Services\User\UserServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

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
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }
    public function confirmCreateUser(Request $request)
    {   
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' =>'required|min:8',
            'password_confirm' =>'same:password',
            'profile' => 'required',
            'type' => 'required',
            'phone' => 'nullable',
            'address' => 'nullable',
            'dob' =>'nullable',
        ]); 
           if ($files = $request->file('profile') ){
            $destinationPath = 'storage/images/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $user['name']=$request->name;
            $user['email']=$request->email;
            $user['password']=$request->password;
            $user['type']=$request->type;
            $user['phone']=$request->phone;
            $user['address']=$request->address;
            $user['dob']=$request->dob;
            $user['profile']= date('YmdHis') . "." . $files->getClientOriginalExtension();
           
           
        return view('users.confirmCreateUser',compact('user'));}
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveUser(Request $request)
    { 
        $user['name']=$request->name;
        $user['email']=$request->email;
        $user['password']=$request->password;
        if($request->type=='Admin')
        {
            $user['type']=0;
        }
       else{
        $user['type']=1;
       }
        $user['phone']=$request->phone;
        $user['address']=$request->address;
        $user['dob']=$request->dob;
        $user['profile']=$request->profile;
        $user['create_user_id']=Auth::user()->id;
        $user['created_at']=now();
        $result['data']= $this->userInterface->userCreate($user);
        return redirect()->route('users.index')
                        ->with('success','User created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function showUserprofile(user $user)
    {
        return view('users.userProfile',compact('user'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        return view('users.edit',compact('user'));
    }
    public function confirmUpdateUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'profile' => 'nullable',
            'type' => 'required',
            'phone' => 'nullable',
            'address' => 'nullable',
            'dob' =>'nullable',
        ]); 
            if($request->hasfile('profile'))
            {
                $files = $request->file('profile');
                $destinationPath = 'storage/images/'; // upload path
                $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $profileImage);
                $user['id']=$request->id;
                $user['name']=$request->name;
                $user['email']=$request->email;
                $user['password']=$request->password;
                $user['type']=$request->type;
                $user['phone']=$request->phone;
                $user['address']=$request->address;
                $user['dob']=$request->dob;
                $user['profile']= date('YmdHis') . "." . $files->getClientOriginalExtension();
            }
            else
            {
                $user['id']=$request->id;
                $user['name']=$request->name;
                $user['email']=$request->email;
                $user['password']=$request->password;
                $user['type']=$request->type;
                $user['phone']=$request->phone;
                $user['address']=$request->address;
                $user['dob']=$request->dob;
                $user['profile']=Auth::user()->profile;
            }
    return view('users.confirmUpdateUser',compact('user'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function updatingUser(Request $request)
    { 
       
        $user['name']=$request->name;
        $user['email']=$request->email;
        if($request->type=='Admin'){
            $user['type']='0';
        }
        else{
            $user['type']='1';
        }
        
        $user['phone']=$request->phone;
        $user['address']=$request->address;
        $user['dob']=$request->dob;
        $user['profile']=$request->profile;
        $user['updated_user_id']=Auth::user()->id;
        $user['updated_at']=now();
        $id=$request->id;
        $result['data']= $this->userInterface->userUpdate($user,$id);
        return redirect()->route('users.index')
                        ->with('success',' Updated User Profile successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function showDel($id)
    {
        $user=User::find($id);
        return view('users.showDel',compact('user'));
    }
    public function del(Request $request)
    {
        $id=$request->id;
        $result['data']= $this->userInterface->userDel($id);
        return redirect()->route('users.index')
                        ->with('success','User deleted Successfully');
    }
  
}