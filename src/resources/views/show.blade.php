<div class="admin__contact">
    <div class="admin-title">
        <h2>Admin</h2>
    </div>
</div>

<form action="/admin" method="get">
    <div class="form__search">
        <div class="form__search-keyword">
            <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください">
        </div>
        <div class="form__search-gender">
            <select name="gender">
                <option value="">性別</option>
                <option value="0">全て</option>
                <option value="1">男性</option>
                <option value="2">女性</option>
                <option value="3">その他</option>
            </select>
        </div>
        <div class="form__search--category">
            <select name="category_id">
                <option value="">お問い合わせの種類</option>
                <option value="1">商品のお届けについて</option>
                <option value="2">商品の交換について</option>
                <option value="3">商品のトラブル</option>
                <option value="4">ショップへのお問い合わせ</option>
                <option value="5">その他</option>
            </select>
        </div>
        <div class="form__search--day">
            <select name="day">
                <option value="">年/月/日</option>
            </select>
        </div>
        <div class="form__button--search">
            <button type="submit">検索</button>
        </div>
        <div class="form__button--reset">
            <button>リセット</button>
        </div>
    </div>
</form>

<table>
    <tr>
        <th>お名前</th>
        <th>性別</th>
        <th>メールアドレス</th>
        <th>お問い合わせの種類</th>
        <th></th>
    </tr>

    @foreach ($contacts as $contact)
        <tr>
            <td>{{ $contact->last_name }} {{$contact->first_name }}</td>
            <td>
                @if ($contact->gender == 1) 男性
                @elseif ($contact->gender == 2)女性
                @else その他
                @endif
            </td>
            <td>{{ $contact->email }}</td>
            <td>
                {{ $contact->category->content ?? ''  }}
            </td>
            <td><button class="open--modal">詳細</button></td>
        </tr>
    @endforeach
</table>

<div id="modal" style="display:none;">
    <div class="modal--content">
        <h3>FashionablyLate</h3>
        <table class="modal__table">
            <tr>
                <th class="modal__table--title">お名前</th>
                <td class="modal__table--item">{{ $contact->last_name }} {{$contact->first_name }}</td>
            </tr>
            <tr>
                <th class="modal__table--title">性別</th>
                <td class="modal__table--item">
                    @if ($contact->gender == 1) 男性
                    @elseif ($contact->gender == 2) 女性
                    @else その他
                    @endif
                </td>
            </tr>
            <tr>
                <th class="modal__table--title">メールアドレス</th>
                <td class="modal__table--item">{{ $contact->email }}</td>
            </tr>
            <tr>
                <th class="modal__table--title">電話番号</th>
                <td class="modal__table--item">{{ $contact->tel }}</td>
            </tr>
            <tr>
                <th class="modal__table--title">住所</th>
                <td class="modal__table--item">{{ $contact->address }}</td>
            </tr>
            <tr>
                <th class="modal__table--title">建物名</th>
                <td class="modal__table--item">{{ $contact->building }}</td>
            </tr>
            <tr>
                <th class="modal__table--title">お問い合わせの種類</th>
                <td class="modal__table--item">{{ $contact->category->content ?? '' }}</td>
            </tr>
            <tr>
                <th class="modal__table--title">お問い合わせ内容</th>
                <td class="modal__table--item">{{ $contact->detail }}</td>
            </tr>
        </table>
        <button class="delete">削除</button>
    </div>
</div>