<?php

namespace App\Http\Controllers;

use Illuminate\support\Facades\Auth;
use App\Http\Requests\FortifyLoginRequest;

class LoginController extends Controller
{
    public function store(FortifyLoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return back()->withErrors([
            'email' => 'ログイン情報が登録されていません'
        ]);
    }
}
