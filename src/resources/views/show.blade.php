{{-- 一覧画面 --}}
@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection

@section('content')
    <div class="list-container">

        <h2 class="list-title">一覧画面</h2>

        <table class="list-table">
            <tr class="table-row-title">
                <th class="table-label">名前</th>
                <th class="table-label">メールアドレス</th>
                <th class="table-label">詳細</th>
            </tr>
            @foreach ($users as $user)
                <tr class="table-row-content">
                    <td class="table-content">{{ $user->name }}</td>
                    <td class="table-content">{{ $user->email }}</td>
                    <td class="table-detail-button">
                        {{-- クリックするとgetDetails(user_id) が実行される --}}
                        <button class="table-form-button" type="button"
                            onclick="getDetails({{ $user->user_id }})">詳細</button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

@section('modal-content')
    <div class="modal-content" id="modal">
        {{-- ×ボタン --}}
        <div class="modal-close-button-container">
            <span class="close-button">&times;</span>
        </div>
        {{-- モーダルの内容 --}}
        <div class="modal-content-container">
            <table class="modal-content-table">
                <tr class="modal-table-row">
                    <th class="modal-table-label">お名前</th>
                    <td class="modal-table-data" id="modal-name">データ</td>
                </tr>
                <tr class="modal-table-row">
                    <th class="modal-table-label">メールアドレス</th>
                    <td class="modal-table-data" id="modal-email">データ</td>
                </tr>
                <tr class="modal-table-row">
                    <th class="modal-table-label">郵便番号</th>
                    <td class="modal-table-data" id="modal-postal_code">データ</td>
                </tr>
                <tr class="modal-table-row">
                    <th class="modal-table-label">住所</th>
                    <td class="modal-table-data" id="modal-address">データ</td>
                </tr>
                <tr class="modal-table-row">
                    <th class="modal-table-label">建物名</th>
                    <td class="modal-table-data" id="modal-building">データ</td>
                </tr>
            </table>
        </div>
        {{-- 削除ボタン --}}
        <div class="modal-delete-button-container">
            <form class="modal-delete-form" id="delete-contact-form" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" id="modal-id">
                <button class="delete-button" type="submit">削除</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function getDetails(userId) {
            // fetchを使って指定されたuserIdの詳細情報を取得
            fetch(`/list/${userId}`)
                // レスポンスをJSON形式で解析
                .then(response => response.json())
                .then(data => {

                    // モーダルの各要素にデータを設定
                    document.getElementById('modal-name').innerText = data.name;
                    document.getElementById('modal-email').innerText = data.email;
                    document.getElementById('modal-postal_code').innerText = data.postal_code;
                    document.getElementById('modal-address').innerText = data.address;
                    document.getElementById('modal-building').innerText = data.building;

                    // モーダルを開く際にIDを設定
                    document.getElementById('modal-id').value = data.user_id;

                    // 削除フォームのactionを設定
                    document.getElementById('delete-contact-form').action = `/list/${data.user_id}`;

                    // モーダルを表示
                    document.getElementById('modal').style.display = 'block';
                })
                .catch(error => console.error('Error fetching contact details:', error));
        }

        document.querySelector('.close-button').onclick = function() {
            // モーダルを閉じる
            document.getElementById('modal').style.display = 'none';
        }
    </script>
@endsection
