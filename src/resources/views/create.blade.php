{{-- 登録画面 --}}
@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endsection

@section('content')
    <div class="create-container">

        <h2 class="create-title">登録画面</h2>

        <form class="create-form" action="{{ route('store') }}" method="post">
            @csrf

            <div class="form-group">
                <p class="form-label">お名前</p>
                <input class="form-input" name="name" type="text" value="{{ old('name') }}" placeholder="テスト太郎">
                @error('name')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <p class="form-label">メールアドレス</p>
                <input class="form-input" name="email" type="text" value="{{ old('email') }}"
                    placeholder="test@gmail.com">
                @error('email')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <p class="form-label">郵便番号【ハイフン有】</p>
                <input class="form-input" name="postal_code" type="text" value="{{ old('postal_code') }}"
                    placeholder="111-1111">
                @error('postal_code')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <p class="form-label">住所</p>
                <input class="form-input" name="address" type="text" value="{{ old('address') }}"
                    placeholder="福岡県福岡市博多区1-1-1">
                @error('address')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <p class="form-label">建物名</p>
                <input class="form-input" name="building" type="text" value="{{ old('building') }}"
                    placeholder="博多ビル101">
            </div>
            <div class="form-submit">
                <input class="form-input-submit" type="submit" value="登録">
            </div>
        </form>
    </div>
@endsection
