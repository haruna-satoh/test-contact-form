@extends('layouts.app')

@php
    $page = 'confirm'
@endphp

@section('css')
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
    <div class="confirm__contact">
        <div class="confirm__title">
            <h2>Confirm</h2>
        </div>
        <form class="form" action="/thanks" method="post">
            @csrf
            <table class="confirm__table--inner">
                <tr>
                    <th class="confirm__table--title">お名前</th>
                    <td class="confirm__table--item">
                        <input type="text" name="name" value="{{ $name }}" readonly >
                    </td>
                </tr>
                <tr>
                    <th class="confirm__table--title">性別</th>
                    <td class="confirm__table--item">
                        <input type="text" name="gender" value="{{ $gender }}" readonly >
                    </td>
                </tr>
                <tr>
                    <th class="confirm__table--title">メールアドレス</th>
                    <td class="confirm__table--item">
                        <input type="text" name="email" value="{{ $email }}" readonly >
                    </td>
                </tr>
                <tr>
                    <th class="confirm__table--title">電話番号</th>
                    <td class="confirm__table--item">
                        <input type="text" name="tel" value="{{ $tel }}" readonly>
                    </td>
                </tr>
                <tr>
                    <th class="confirm__table--title">住所</th>
                    <td class="confirm__table--item">
                        <input type="text" name="address" value="{{ $address }}" readonly>
                    </td>
                </tr>
                <tr>
                    <th class="confirm__table--title">建物名</th>
                    <td class="confirm__table--item">
                        <input type="text" name="building" value="{{ $building }}" readonly>
                    </td>
                </tr>
                <tr>
                    <th class="confirm__table--title">お問い合わせの種類</th>
                    <td class="confirm__table--item">
                        <input type="text" name="category_id" value="{{ $category }}" readonly>
                    </td>
                </tr>
                <tr>
                    <th class="confirm__table--title">お問い合わせ内容</th>
                    <td class="confirm__table--item">
                        <textarea name="content" cols="30" rows="10" readonly>{{ $content }}</textarea>
                    </td>
                </tr>
            </table>
            <div class="confirm__button">
                <button class="confirm__button--submit" type="submit">送信</button>
                <a class="form-back" href="/">修正する</a>
            </div>
        </form>
    </div>
@endsection