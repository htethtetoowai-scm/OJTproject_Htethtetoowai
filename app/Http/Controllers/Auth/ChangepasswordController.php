<?php


namespace App\Http\Controllers\Auth;

use App\Contracts\Services\Auth\AuthServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    private $authInterface;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AuthServiceInterface $authInterface)
    {
        $this->middleware('auth');
        $this->authInterface = $authInterface;
    }
    /**
     * Show the Change Password Page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('Auth.changePassword');
    } 
    /**
     * Change Password Section.
     */
    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        $this->authInterface->changePassword($request->new_password);
        return redirect()->route('logout');
    }
}