<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{

    public function create(): View
    {
        // register表示
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // RedirectResponseでaddedに飛ぶ
    //アカウント作成
    public function store(Request $request): RedirectResponse
    {
        // バリデーション
 $request->validate([
              'username' => 'required|min:2|max:12',
              'email'=>'required|min:2|max:40|unique:users,email|email',
              'password'=>'required|min:8|max:20|alpha_num|confirmed',
        ]);
// データベースに登録
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'icon_image' => 'icon1.png',
        ]);
// セッション
$request->session()->put('username',  $request->username);
        return redirect('added');
    }

    public function added(Request $request)
    {
        // セッションから取り出す
        $username = $request->session()->get('username');
        // 登録したUsernameを置き換え
    return view('auth.added', ['username' => $username]);
    }

}
