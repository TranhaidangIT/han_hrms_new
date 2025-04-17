<?php


namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function login()
    {
        return view('employee.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::guard('employee')->attempt($credentials)) {
            $user = Auth::guard('employee')->user();

            if ($user->status == 0) {
                Auth::guard('employee')->logout();
                return redirect()->back()->withErrors(['Tài khoản đã nghỉ việc.']);
            }

            //  Sửa dùng route trực tiếp, không dùng intended
            return redirect()->route('employee.dashboard');
        }

        return redirect()->back()->withErrors(['Sai tài khoản hoặc mật khẩu']);
    }

    public function logout()
    {
        Auth::guard('employee')->logout();
        return redirect()->route('employee.login');
    }
}
