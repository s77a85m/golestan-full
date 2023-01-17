<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Admin\Role;
use App\Models\Client\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function store(RegisterRequest $request)
    {
        try {
            // save image
            $path = $request->file('image')->store('/profile/'.$request->get('melicode'), 'private');

            // create stuNum
            $stuNum = '401'.random_int(100000, 999999);
            // create password
            $password = bcrypt($request->get('melicode'));

            $role = Role::query()->where('title', 'Student')->first();
            User::query()->create([
                'firstname' => $request->get('firstname'),
                'lastname' => $request->get('lastname'),
                'national_name' => $request->get('melicode'),
                'mobile' => $request->get('phone'),
                'avatar' => $path,
                'stuNum' => (string) $stuNum,
                'email' => $request->get('email'),
                'password' => $password,
                'grade_id' => $request->get('grade'),
                'major_id' => $request->get('major'),
                'orientation_id' => $request->get('orientation'),
                'role_id' => $role->id,
            ]);
            return redirect(route('home'))->with('status', 'ثبت نام با موفقیت انجام شد.');
        }catch (\Exception $e){
            return redirect(route('home'))->with('error', 'عملیات ثبت نام موفقیت آمیز نبود!');
        }
    }

    public function login(LoginRequest $request)
    {
        try {
            $user = User::query()->where('stuNum', $request->get('username'))->first();
            if ($user){
                if (!Hash::check($request->get('password'), $user->password)){
                    return redirect(route('home'))->withErrors('error', 'نام کاربری یا رمز عبور اشتباه است.');
                }else{
                    // login
                    auth()->login($user);
                    return redirect(route('dashboard.info'));
                }
            }else{
                return redirect(route('home'))->with('error', 'نام کاربری یا رمز عبور اشتباه است.');
            }
        }catch (\Exception $e){
            return redirect(route('home'))->with('error', 'مشکلی به وجود آمده است. لطفا بعدا دوباره تلاش کنید!');
        }
    }

    public function logout()
    {
        auth()->logout();

        return redirect(route('home'));
    }
}
