<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Favorite;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    //　会員登録ページ表示
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // 会員登録処理
    public function register(Request $request)
    {
        $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|',
    ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('auth.thanks'); 
    }

    public function showThanksForm()
    {
    return view('auth.thanks');
    }

    // ログイン画面の表示
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // ログイン処理
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/');
        }

        return back()->withErrors([
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください',
            'password.required' => 'パスワードを入力してください',
        ]);
    }

    public function showMypage()
    {
        $user = Auth::user();
        $reservations = Reservation::where('user_id', $user->id)->with('shop')->get();
        $favorites = Favorite::where('user_id', $user->id)->with('shop')->get();

        return view('users.mypage', compact('user', 'reservations', 'favorites'));
    }
}
