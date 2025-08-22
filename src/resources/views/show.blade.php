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
            <input type="date" name="date" value="{{ request('date') }}">
        </div>
        <div class="form__button--search">
            <button type="submit">検索</button>
        </div>
        <div class="form__button--reset">
            <a href="/admin">
                <button type="button">リセット</button>
            </a>
        </div>
        @if(isset($contacts) && $contacts)
            <div class="pagination">
            {{ $contacts->links() }}
            </div>
        @endif
    </div>
</form>

@if (isset($contacts) && $contacts)
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
                <td>
                    <a href="/admin/{{ $contact->id }}">詳細</a>
                </td>
            </tr>
        @endforeach
    </table>

@elseif(isset($contact_detail))
    <div class="modal--content">
        <h3>FashionablyLate</h3>
        <table class="modal__table">
            <tr>
                <th class="modal__table--title">お名前</th>
                <td class="modal__table--item">{{ $contact_detail->last_name }} {{$contact_detail->first_name }}</td>
            </tr>
            <tr>
                <th class="modal__table--title">性別</th>
                <td class="modal__table--item">
                    @if ($contact_detail->gender == 1) 男性
                    @elseif ($contact_detail->gender == 2) 女性
                    @else その他
                    @endif
                </td>
            </tr>
            <tr>
                <th class="modal__table--title">メールアドレス</th>
                <td class="modal__table--item">{{ $contact_detail->email }}</td>
            </tr>
            <tr>
                <th class="modal__table--title">電話番号</th>
                <td class="modal__table--item">{{ $contact_detail->tel }}</td>
            </tr>
            <tr>
                <th class="modal__table--title">住所</th>
                <td class="modal__table--item">{{ $contact_detail->address }}</td>
            </tr>
            <tr>
                <th class="modal__table--title">建物名</th>
                <td class="modal__table--item">{{ $contact_detail->building }}</td>
            </tr>
            <tr>
                <th class="modal__table--title">お問い合わせの種類</th>
                <td class="modal__table--item">{{ $contact_detail->category->content ?? '' }}</td>
            </tr>
            <tr>
                <th class="modal__table--title">お問い合わせ内容</th>
                <td class="modal__table--item">{{ $contact_detail->detail }}</td>
            </tr>
        </table>

        <form action="/admin/{{ $contact_detail->id }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="delete">削除</button>
        </form>

        <a href="/admin">一覧に戻る</a>
    </div>
@endif
</div>