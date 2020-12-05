<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\UserInfo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
        $this->middleware('guest:customer');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showCustomerRegisterForm()
    {
        return view('user.auth-user.register');
    }

    protected function createCustomer(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255|min:4',
            'address'  => 'required|string|max:255|min:10',
            'phone'    => 'required|string|max:11|min:10',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/',
            'g-recaptcha-response' => 'required|captcha',
            ], [
            'name.required'      => 'Vui lòng nhập tên !',
            'name.string'        => 'Vui lòng nhập đúng định dạng !',
            'name.max'           => 'Tên của bạn quá dài !',
            'name.min'           => 'Tên của bạn quá ngắn !',
            'address.required'   => 'Địa chỉ không được để trống !',
            'address.string'     => 'Địa chỉ không hợp lệ !',
            'address.max'        => 'Độ dài địa chỉ không hợp lệ !',
            'address.min'        => 'Độ dài địa chỉ không hợp lệ !',
            'phone.required'     => 'Vui lòng nhập số điện thoại của bạn !',
            'phone.string'       => 'Số điện thoại không hợp lệ !',
            'phone.max'          => 'Số điện thoại không hợp lệ !',
            'phone.min'          => 'Số điện thoại không hợp lệ !',
            'email.required'     => 'Vui lòng nhập email !',
            'email.string'       =>  'Vui lòng nhập đúng định dạng !',
            'email.email'        =>  'Vui lòng nhập đúng định dạng email !',
            'email.max'          =>  'Email của bạn quá dài !',
            'email.unique'       =>  'Email đã tồn tại !',
            'password.required'  =>  'Vui lòng nhập mật khẩu !',
            'password.string'    =>  'Vui lòng nhập đúng định dạng !',
            'password.min'       =>  'Mật khẩu quá ngắn !',
            'password.confirmed' =>  'Mật khẩu xác nhận không khớp !',
            'password.regex'     =>  'Mật khẩu của bạn không phù hợp !',
            'g-recaptcha-response.required' =>  'Capcha is required !',
            'g-recaptcha-response.captcha' =>  'Wrong required !',

        ]);
        $customer = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'status' => 'active',
            'password' => Hash::make($request['password'])
        ]);
        $user_info = new UserInfo;
        $user_info->user_id = $customer->id;
        $user_info->address = $request->address;
        $user_info->phone = $request->phone;
        $user_info->save();
        return redirect('/login')->with('flash_message_success', 'Đăng ký thành công, hãy đăng nhập tài khoản của bạn !');
    }
}
