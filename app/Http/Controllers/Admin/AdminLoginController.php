<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('Admin.Login.index');
    }

    public function login(Request $request)
    {
        try {
            $admin = Admin::query()->where('username', $request->get('username'))->first();
            if ($admin){
                if (!Hash::check($request->get('password'), $admin->password)){
                    return redirect(route('admin.login.panel'))->with('error', 'The username or password is incorrect');
                }else{
                    //login
                    auth()->guard('admin')->login($admin);
                    return redirect(route('admin.professor.index'))->with('status', 'به پنل ادمین خوش آمدید.');
                }
            }else{
                return redirect(route('admin.login.panel'))->with('error', 'The username or password is incorrect');
            }
        }catch (\Exception $e){
            return redirect(route('admin.login.panel'))->with('error', 'A problem has arisen');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect(route('home'));
    }
}
