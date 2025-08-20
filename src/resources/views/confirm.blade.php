<div class="confirm__contact">
    <h2>Confirm</h2>
    <form action="/thanks" method="post">
        @csrf
        <table class="confirm-table__inner">
            <tr>
                <th class="confirm-table__title">お名前</th>
                <td class="confirm-table__item">
                    <input type="text" name="name" value="{{ $name }}" readonly >
                </td>
            </tr>
            <tr>
                <th class="confirm-table__title">性別</th>
                <td class="confirm-table__item">
                    <input type="text" name="gender" value="{{ $gender }}" readonly >
                </td>
            </tr>
            <tr>
                <th class="confirm-table__title">メールアドレス</th>
                <td class="confirm-table__item">
                    <input type="text" name="email" value="{{ $email }}" readonly >
                </td>
            </tr>
            <tr>
                <th class="confirm-table__title">電話番号</th>
                <td class="confirm-table__item">
                    <input type="text" name="tel" value="{{ $tel }}" readonly>
                </td>
            </tr>
            <tr>
                <th class="confirm-table__title">住所</th>
                <td class="confirm-table__item">
                    <input type="text" name="address" value="{{ $address }}" readonly>
                </td>
            </tr>
            <tr>
                <th class="confirm-table__title">建物名</th>
                <td class="confirm-table__item">
                    <input type="text" name="building" value="{{ $building }}" readonly>
                </td>
            </tr>
            <tr>
                <th class="confirm-table__title">お問い合わせの種類</th>
                <td class="confirm-table__item">
                    <input type="text" name="select" value="{{ $select }}" readonly>
                </td>
            </tr>
            <tr>
                <th class="confirm-table__title">お問い合わせ内容</th>
                <td class="confirm-table__item">
                    <textarea name="content" cols="30" rows="10" readonly>{{ $content }}</textarea>
                </td>
            </tr>
        </table>
        <button type="submit">送信</button>
        <a href="/">修正する</a>
    </form>
</div>