@extends('common.admin.base')

@section('custom_css')
    @vite('resources/scss/admin/create.scss')
    <style>
        .button-group {
            display: flex;
            justify-content: space-between;
        }
        .button-group .btn {
            width: 48%;
        }
    </style>
@endsection

@section('main_contents')
    <div class="page-wrapper create-page-wrapper">
        <h2 class="title">ホテル編集確認</h2>
        <form action="{{ route('adminHotelEditProcess', ['hotel_id' => $hotel->hotel_id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="hotel_name">ホテル名</label>
                <p>{{ $hotel_name }}</p>
                <input type="hidden" name="hotel_name" value="{{ $hotel_name }}">
            </div>
            <div class="form-group">
                <label for="prefecture_id">県/市</label>
                <p>{{ $prefecture_name }}</p>
                <input type="hidden" name="prefecture_id" value="{{ $prefecture_id }}">
            </div>
            <div class="form-group">
                <label for="file_path">画像</label>
                @if ($file_path)
                    <p><img src="/assets/img/{{ $file_path }}" alt="ホテル画像"></p>
                    <input type="hidden" name="file_path" value="{{ $file_path }}">
                @else
                    <p>画像は変更されません</p>
                @endif
            </div>
            <div class="form-group button-group">
                <a href="{{ route('adminHotelEditPage', ['hotel_id' => $hotel->hotel_id]) }}" class="btn btn-secondary">戻る</a>
                <button type="submit" class="btn btn-primary">更新する</button>
            </div>
        </form>
    </div>
@endsection
