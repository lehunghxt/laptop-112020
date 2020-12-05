<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function customerLogout(Request $request){
        Auth::guard('customer')->logout();
        return redirect('/');
    }

    public function formChangePassword(){
        return view('user.user_info.change_password');
    }

    public function changePassword(Request $request){
        $request->validate([
            'old_password' => 'required|min:6|max:255',
            'password' => 'required|confirmed|min:6|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/',
        ], [
            'old_password.required'    => 'Mật khẩu cũ không được để trống !',
            'old_password.min'         => 'Mật mật khẩu quá ngắn !',
            'old_password.max'         => 'Mật mật khẩu quá dài !',
            'password.required'        => 'Nhập mật khẩu mới !',
            'password.min'             => 'Mật mật khẩu quá ngắn !',
            'password.confirmed'       => 'Mật mật khẩu xác nhận không khớp !',
            'password.regex'           => 'Mật mật khẩu phải có ký tự hoa thường và ký tự đặc biệt !'
        ]);
        // show($request->all());
        if(Hash::check($request->old_password, Auth::guard('customer')->user()->password)){
            User::where('id', Auth::guard('customer')->user()->id)->update(['password'=> Hash::make($request->password)]);
            return redirect('/user-info')->with('flash_message_success', 'Đổi mật khẩu thành công !');
        }else{
            return redirect()->back()->with('flash_message_error', 'Mật khẩu cũ không đúng!');
        }
    }
}
