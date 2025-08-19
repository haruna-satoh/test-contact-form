
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
                <input type="text" name="surname" placeholder="例: 山田" value="{{ old('surname') }}">
                <input type="text" name="name" placeholder="例: 太郎" value="{{ old('name') }}">
            </div>
        </div>
        <div class="form__group">
            <div class="form__group--title">
                <span class="item">性別</span>
                <span class="required">※</span>
            </div>
            <div class="form__group--content">
                <input type="radio" name="gender" value="男性"> 男性
                <input type="radio" name="gender" value="女性"> 女性
                <input type="radio" name="gender" value="その他"> その他
            </div>
        </div>
        <div class="form__group">
            <div class="form__group--title">
                <span class="item">メールアドレス</span>
                <span class="required">※</span>
            </div>
            <div class="form__group--content">
                <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
            </div>
        </div>
        <div class="form__group">
            <div class="form__group--title">
                <span class="item">電話番号</span>
                <span class="required">※</span>
            </div>
            <div class="form__group--content">
                <input type="tel" name="tel" placeholder="080" value="{{ old('tel') }}"> -
                <input type="tel" name="tel2" placeholder="1234" value="{{ old('tel2') }}"> -
                <input type="tel" name="tel3" placeholder="5678" value="{{ old('tel3') }}">
            </div>
        </div>
        <div class="form__group">
            <div class="form__group--title">
                <span class="item">住所</span>
                <span class="required">※</span>
            </div>
            <div class="form__group--content">
                <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
            </div>
        </div>
        <div class="form__group">
            <div class="form__group--title">
                <span class="item">建物名</span>
            </div>
            <div class="form__group--content">
                <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}">
            </div>
        </div>
        <div class="form__group">
            <div class="form__group--title">
                <span class="item">お問い合わせの種類</span>
                <span class="required">※</span>
            </div>
            <div class="form__group--content">
                <select name="select">
                    <option value="選択">選択してください</option>
                    <option value="商品交換">商品交換について</option>
                </select>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group--title">
                <span class="item">お問い合わせ内容</span>
                <span class="required">※</span>
            </div>
            <div class="form__group--content">
                <textarea name="contact" cols="30" rows="10" placeholder="お問い合わせ内容をご記入ください">{{ old('contact') }}</textarea>
            </div>
        </div>
        <button type="submit">確認画面</button>
    </form>
</div>
