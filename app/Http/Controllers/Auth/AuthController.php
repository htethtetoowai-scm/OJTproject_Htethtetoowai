<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Services\Auth\AuthServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;

class AuthController extends Controller
{
  private $authInterface;
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(authServiceInterface $authInterface)
  {
      $this->authInterface = $authInterface;
  }
  /**
   * Display Login Page.
   */
  public function login()
  {
    return view('auth.login');
  }
  /**
   * Authenticate User.
   */
  public function authenticate(Request $request)
  {
    $request->validate([
    'email' => 'required|string|email',
            'password' => 'required|string',]);
    $credentials = $request->only('email', 'password');
    $results=$this->authInterface->authenticateUser($credentials);
    if ($results=='true')
    {
      return redirect('posts');
    }
    else
    {
      return redirect('login')->with('error', 'Oppes! You have entered invalid credentials');
    }
  }
   /**
   * Logout Section.
   */
  public function logout()
  {
    Auth::logout();
    return redirect('/');
  }
}