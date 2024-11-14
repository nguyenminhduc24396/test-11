@extends('common.admin.base')

@section('custom_css')
    @vite('resources/scss/admin/create.scss')
@endsection

@section('main_contents')
    <div class="container">
        <h2 class="title">ホテル編集</h2>
        <form action="{{ route('adminHotelEditConfirm', ['hotel_id' => $hotel->hotel_id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="hotel_name">ホテル名</label>
                <input type="text" name="hotel_name" id="hotel_name" class="form-control" placeholder="ホテル名" value="{{ old('hotel_name', $hotel->hotel_name) }}">
                @if ($errors->has('hotel_name'))
                    <span class="text-danger">{{ $errors->first('hotel_name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="prefecture_id">県/市</label>
                <select name="prefecture_id" id="prefecture_id" class="form-control">
                    @foreach($prefectures as $prefecture)
                        <option value="{{ $prefecture->prefecture_id }}" {{ old('prefecture_id', $hotel->prefecture_id) == $prefecture->prefecture_id ? 'selected' : '' }}>
                            {{ $prefecture->prefecture_name }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('prefecture_id'))
                    <span class="text-danger">{{ $errors->first('prefecture_id') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="file_path">画像</label>
                <input type="file" name="file_path" id="file_path" class="form-control">
                @if ($errors->has('file_path'))
                    <span class="text-danger">{{ $errors->first('file_path') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">確認する</button>
        </form>
    </div>
@endsection
