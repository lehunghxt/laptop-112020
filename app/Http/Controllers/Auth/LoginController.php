<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Category;
use Illuminate\Support\Facades\URL;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // ====================FOR ADMIN============================
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:customer')->except('logout');
    }

    public function showAdminLoginForm()
    {
        return view('admin.login.login');
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'username'   => 'required',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
            echo Auth::guard('admin')->user()->username;
            return redirect('admin/dashboard');
        }
        return back()->withInput($request->only('email'));
    }
    // ====================FOR USER============================
    public function showUserLoginForm()
    {
        return view('user.auth-user.login');
    }
    public function userLogin(Request $request)
    {
        $request->validate([
            'email'   => 'required|email',
            'password' => 'required|min:6|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/'
            ], [
            'email.required' => 'Vui lòng nhập Email !',
            'email.email'    => 'Vui lòng nhập đúng định dạng !',
            'password.required'    => 'Vui lòng nhập mật khẩu !',
            'password.min'         => 'Mật khẩu quá ngắn !',
            'password.regex'         => 'Mật khẩu không phù hợp !',
        ]);

        if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/');
        }
        return back()->with('flash_message_error', 'Tài khoản hoặc mật khẩu không đúng !');
    }
}
