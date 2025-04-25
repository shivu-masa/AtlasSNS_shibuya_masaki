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
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    //アカウント作成
    public function store(Request $request): RedirectResponse
    {
 $request->validate([
              'username' => 'required|min:2|max:12',
              'email'=>'required|min:2|max:40|unique:users,email|email',
              'password'=>'required|min:8|max:20|alpha_num|confirmed',


        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);
$request->session()->put('username', 'shivu');
        return redirect('added');
    }

    public function added(Request $request)
    {
          $username = User::get('username');
    return view('auth.added', ['username' => $username]);
    }

}
