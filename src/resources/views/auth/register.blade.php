<div class="register__contact">
    <div class="register__title">
        <h2>Register</h2>
    </div>
    <form action="/register" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span>お名前</span>
            </div>
            <div class="form__group-content">
                <div class="form__group-item">
                    <input type="text" name="name" placeholder="例: 山田 太郎" value="{{ old('name') }}">
                </div>
            </div>
            <div class="form__error">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span>メールアドレス</span>
            </div>
            <div class="form__group-content">
                <div class="form__group-item">
                    <input type="text" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                </div>
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
            <div class="form__group-content">
                <div class="form__group-item">
                    <input type="password" name="password" placeholder="例: coachtech1106">
                </div>
            </div>
            <div class="form__error">
                @error('password')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span>パスワード(確認)</span>
            </div>
            <div class="form__group-content">
                <div class="form__group-item">
                    <input type="password" name="password_confirmation" placeholder="もう一度同じパスワードを入力してください">
                </div>
            </div>
            <div class="form__error">
                @error('password')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form__button">
            <button type="submit">登録</button>
        </div>
    </form>
</div>