@extends('layouts.app')

@php
    $page = 'login';
@endphp

@section('css')
    
@endsection

@section('content')
    <div class="login__contact">
        <div class="login-title">
            <h2>Login</h2>
        </div>
        <form action="/login" method="post" novalidate>
            @csrf
            <div class="form__group">
                <div class="form__group-title">
                    <span>メールアドレス</span>
                </div>
                <div class="form__group-item">
                    <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                </div>
                <div class="form__error">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span>パスワード</span>
                </div>
                <div    class="form__group-item">
                    <input type="password" name="password" placeholder="coachtech1106">
                </div>
                <div class="form__error">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__button">
                <button type="submit">ログイン</button>
            </div>
        </form>
    </div>
@endsection