<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function reg_index()
    {
        return view('users.reg_index');
    }

    public function login(Request $request)
    {
        $user = $request->only(['email', 'password']);
        if (Auth::attempt($user)) {
            if (Auth::user()->is_admin == true) {
                return redirect('/admin');
            } else {
                return redirect('/');
            }

        } else {
            return redirect()->back()->withErrors(['error' => 'login or password not found']);
        }
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'user_name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|required_with:confirm_pass|same:confirm_pass',
            'confirm_pass' => 'min:6'
        ]);
        $avatar = '';
        if ($request->avatar != null) {
            $request->validate([
                'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $avatar = time() . '.' . $request->avatar->extension();

            $request->avatar->move(public_path('images/avatar'), $avatar);
        }
        $password = Hash::make($request->password);
        $users = new User();
        $users->name = $request->user_name;
        $users->email = $request->email;
        $users->password = $password;
        $users->avatar = $avatar;
        $users->save();
        Auth::login($users);
        return redirect('/');
    }

    public function locale(Request $req)
    {
        $lang = $req->get('lang');
        session(['lang' => $lang]);
        App::setLocale($lang);
        return 'success';
    }
}
