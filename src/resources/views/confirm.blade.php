@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection
@section('content')
    <div class="confirm__content">
        <div class="confirm__heading">
            <h2 class="confirm__ttl">お問い合わせ内容確認</h2>
        </div>
        <form class="form" action="/contacts" method="post">
            @csrf
            <table class="confirm-table">
                <tr class="table__row">
                    <th class="table__header">お名前</th>
                    <td class="table__text">
                        <input type="text" name="name" value="{{ $contact['name'] }}" readonly>
                    </td>
                </tr>
                <tr class="table__row">
                    <th class="table__header">メールアドレス</th>
                    <td class="table__text">
                        <input type="email" name="email" value="{{ $contact['email'] }}"readonly>
                    </td>
                </tr>
                <tr class="table__row">
                    <th class="table__header">電話番号</th>
                    <td class="table__text">
                        <input type="tel" name="tel" value="{{ $contact['tel'] }}"readonly>
                    </td>
                </tr>
                <tr class="table__row">
                    <th class="table__header">どこでお知りになりましたか？</th>
                    <td class="table__text table__checkbox">
                        <input type="checkbox" disabled {{ in_array('SNS', $contact['know'] ?? []) ? 'checked' : '' }}
                            name="know[]" id="sns" value="SNS">
                        <label for="sns">SNS</label>
                        <input type="checkbox" disabled {{ in_array('search', $contact['know'] ?? []) ? 'checked' : '' }}
                            name="know[]" id="search" value="search">
                        <label for="search">ネット検索</label>
                        <input type="checkbox" disabled {{ in_array('reviews', $contact['know'] ?? []) ? 'checked' : '' }}
                            name="know[]" id="reviews" value="reviews">
                        <label for="reviews">紹介・口コミ</label>
                        <input type="checkbox" disabled {{ in_array('other', $contact['know'] ?? []) ? 'checked' : '' }}
                            name="know[]" id="other" value="other">
                        <label for="other">その他</label>
                    </td>
                </tr>
                @foreach ($contact['know'] ?? [] as $know)
                    <input type="hidden" name="know[]" value="{{ $know }}">
                @endforeach
                <tr class="table__row">
                    <th class="table__header">お問い合わせ内容</th>
                    <td class="table__text">
                        <input type="text" name="content" value="{{ $contact['content'] }}"readonly>
                    </td>
                </tr>
            </table>
            <div class="from__button">
                <button class="form__button-text" name="action" value="send">送信</button>
                <button class="form__button-text" name="action" value="back">修正</button>
            </div>
        </form>
    </div>
@endsection
