<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <h1 class="header__logo">FashionablyLate</h1>
            <nav class="header__nav">
                @if (isset($page))
                    @switch($page)
                        @case('register')
                            <a href="/login" class="header__nav--btn">login</a>
                            @break
                        @case('login')
                            <a href="/register" class="header__nav--btn">register</a>
                            @break
                        @case('admin')
                            <form action="/logout" method="post" style="display:inline">
                                @csrf
                                <button type="submit" class="header__nav--btn">logout</button>
                            </form>
                            @break
                        @default
                    @endswitch
                @endif
            </nav>
        </div>
    </header>

<main>
    @yield('content')
</main>

</body>
</html>