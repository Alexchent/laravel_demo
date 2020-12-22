<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function __construct()
    {
        //只有未登陆的用户可以访问登陆页面
//        $this->middleware('guest', [
//            'only' => 'create'
//        ]);
    }

    public function create()
    {
        //已登录的用直接跳转到用户页面
        if (Auth::user()) {
            session()->flash('info', Auth::user()->name.' 欢迎回来！');
            return redirect()->intended();
        }
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        if (Auth::user()) return redirect()->intended(route('users.show',[Auth::user()]));

        $credentials = $this->validate($request,[
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials, $request->has('remember'))) {
            session()->flash('success', '欢迎回来！');
            $fallback = route('users.show',[Auth::user()]);
            return redirect()->intended($fallback);//重定向到上次访问的页面，如果没有则回到用户信息页面
        } else {
            session()->flash('danger', '很抱歉，邮箱和密码不匹配');
            return redirect()->back()->withInput();
        }
    }

    public function destroy()
    {
        Auth::logout();
        session()->flash('success', '您已退出登录');
        return redirect()->route('login');
    }
}
