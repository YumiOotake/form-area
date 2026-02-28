@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="form__heading">
        <h2 class="form__ttl">お問い合わせフォーム</h2>
    </div>
    <form class="form" action="/confirm" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-ttl">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">必須</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="name" placeholder="山田太郎" value="{{old('name', $contact['name'] ?? '')}}">
                </div>
                <div class="form__error">
                    @error('name')
                        {{$message}}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-ttl">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">必須</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="email" name="email" placeholder="qwe@qwe" value="{{old('email', $contact['email'] ?? '')}}">
                </div>
                <div class="form__error">
                    @error('email')
                        {{$message}}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-ttl">
                <span class="form__label--item">電話番号</span>
                <span class="form__label--required">必須</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="tel" name="tel" placeholder="0123456789" value="{{old('tel', $contact['tel'] ?? '')}}">
                </div>
                <div class="form__error">
                    @error('tel')
                        {{$message}}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-ttl">
                <span class="form__label--item">どこでお知りになりましたか？</span>
                {{-- <span class="form__label--required">必須</span> --}}
            </div>
            <div class="form__group-content">
                <div class="form__input--text form__input--checkbox">
                    <div class="form__checkbox-item">
                        <input type="checkbox" name="know[]" id="sns" value="SNS" {{in_array('SNS', old('know', $contact['know'] ?? [])) ? 'checked' : ''}}>
                        <label for="sns">SNS</label>
                    </div>
                    <div class="form__checkbox-item">
                        <input type="checkbox" name="know[]" id="search" value="search" {{in_array('search', old('know', $contact['know'] ?? [])) ? 'checked' : ''}}>
                        <label for="search">ネット検索</label>
                    </div>
                    <div class="form__checkbox-item">
                        <input type="checkbox" name="know[]" id="reviews" value="reviews" {{in_array('reviews', old('know', $contact['know'] ?? [])) ? 'checked' : ''}}>
                        <label for="reviews">紹介・口コミ</label>
                    </div>
                    <div class="form__checkbox-item">
                        <input type="checkbox" name="know[]" id="other" value="other" {{in_array('other', old('know', $contact['know'] ?? [])) ? 'checked' : ''}}>
                        <label for="other">その他</label>
                    </div>
                </div>
                <div class="form__error">

                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-ttl">
                <span class="form__label--item">お問い合わせ内容</span>
                {{-- <span class="form__label--required">必須</span> --}}
            </div>
            <div class="form__group-content">
                <div class="form__textarea">
                    <textarea name="content" placeholder="資料をいただきたいです">{{old('content', $contact['content'] ?? '')}}</textarea>
                </div>
                <div class="form__error">

                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">送信</button>
        </div>
    </form>
@endsection
