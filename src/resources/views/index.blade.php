@extends('layouts.app')

@php
    $page = 'contact'
@endphp

@section('css')
    
@endsection

@section('content')
    <div class="contact__contact">
        <div class="contact__title">
            <h2>Contact</h2>
        </div>
        <form action="/confirm" method="post">
            @csrf
            <div class="form__group">
                <div class="form__group--title">
                    <span class="item">お名前</span>
                    <span class="required">※</span>
                </div>
                <div class="form__group--content">
                    <input type="text" name="surname" placeholder="例: 山田" value="{{ old('surname', session('contact.last_name')) }}">
                    <input type="text" name="name" placeholder="例: 太郎" value="{{ old('name', session('contact.first_name')) }}">
                </div>
                <div class="form__error">
                    @error('last_name')
                        {{ $message }}
                    @enderror
                    @error('first_name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__group">
                <div class="form__group--title">
                    <span class="item">性別</span>
                    <span class="required">※</span>
                </div>
                <div class="form__group--content">
                    <input type="radio" name="gender" value="1" {{ old('gender', session('contact.gender', 1)) == '1' ? 'checked' : '' }} checked> 男性
                    <input type="radio" name="gender" value="2" {{ old('gender', session('contact.gender')) == '2' ? 'checked' : '' }}> 女性
                    <input type="radio" name="gender" value="3" {{ old('gender', session('contact.gender')) == '3' ? 'checked' : '' }}> その他
                </div>
                <div class="form__error">
                    @error('gender')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__group">
                <div class="form__group--title">
                    <span class="item">メールアドレス</span>
                    <span class="required">※</span>
                </div>
                <div class="form__group--content">
                    <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email', session('contact.email')) }}">
                </div>
                <div class="form__error">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__group">
                <div class="form__group--title">
                    <span class="item">電話番号</span>
                    <span class="required">※</span>
                </div>
                <div class="form__group--content">
                    <input type="tel" name="tel1" placeholder="080" value="{{ old('tel1', session('contact.tel1')) }}"> -
                    <input type="tel" name="tel2" placeholder="1234" value="{{ old('tel2', session('contact.tel2')) }}"> -
                    <input type="tel" name="tel3" placeholder="5678" value="{{ old('tel3', session('contact.tel3')) }}">
                </div>
                <div class="form__error">
                    @error('tel')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__group">
                <div class="form__group--title">
                    <span class="item">住所</span>
                    <span class="required">※</span>
                </div>
                <div class="form__group--content">
                    <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address', session('contact.address')) }}">
                </div>
                <div class="form__error">
                    @error('address')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__group">
                <div class="form__group--title">
                    <span class="item">建物名</span>
                </div>
                <div class="form__group--content">
                    <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building', session('contact.building')) }}">
                </div>
                <div class="form__error">
                    @error('building')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__group">
                <div class="form__group--title">
                    <span class="item">お問い合わせの種類</span>
                    <span class="required">※</span>
                </div>
                <div class="form__group--content">
                    <select name="category_id">
                        <option value="">選択してください</option>
                        <option value="1" {{ old('select', session('contact.category_id')) == '1' ? 'selected' : '' }}>商品のお届けについて</option>
                        <option value="2" {{ old('select', session('contact.category_id')) == '2' ? 'selected' : '' }}>商品の交換について</option>
                        <option value="3" {{ old('select', session('contact.category_id')) == '3' ? 'selected' : '' }}>商品のトラブル</option>
                        <option value="4" {{ old('select', session('contact.category_id')) == '4' ? 'selected' : '' }}>ショップへのお問い合わせ</option>
                        <option value="5" {{ old('select', session('contact.category_id')) == '5' ? 'selected' : '' }}>その他</option>
                    </select>
                </div>
                    <div    class="form__error">
                        @error('category_id')
                            {{ $message }}
                        @enderror
                </div>
            </div>
            <div class="form__group">
                <div class="form__group--title">
                    <span class="item">お問い合わせ内容</span>
                    <span class="required">※</span>
                </div>
                <div class="form__group--content">
                    <textarea name="content" cols="30" rows="10" placeholder="お問い合わせ内容をご記入ください">{{ old('contact', session('contact.detail')) }}</textarea>
                </div>
                <div class="form__error">
                    @error('detail')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <button type="submit">確認画面</button>
        </form>
    </div>
@endsection