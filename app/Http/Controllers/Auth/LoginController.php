<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Response;
use Validator;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function login(Request $request)
    {
       $this->validate($request, [
            'email'   => 'required',
            'password' => 'required|min:6'
        ]);

        if(is_numeric($request->email)) {
            $field = 'mobile';
         } elseif (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $field = 'email';
         }else{
            $field = 'email';
         }
        if(Auth::attempt([$field => $request->email, 'password' => $request->password])) {

            return redirect('dashboard');
        }
        return back()->withInput($request->all())->with('message','Invalid username or password');
    }
    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('user.auth.login');
    }
}
