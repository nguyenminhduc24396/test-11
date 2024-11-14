<!-- base view -->
@extends('common.admin.base')

<!-- CSS per page -->
@section('custom_css')
    @vite('resources/scss/admin/search.scss')
    @vite('resources/scss/admin/result.scss')
@endsection

<!-- main contents -->
@section('main_contents')
    <div class="page-wrapper search-page-wrapper">
        <h2 class="title">検索画面</h2>
        <hr>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="search-hotel-name">
            <form action="{{ route('adminHotelSearchResult') }}" method="post">
                @csrf
                <input type="text" name="hotel_name" value="{{ old('hotel_name') }}" placeholder="ホテル名">
                <select name="prefecture_id">
                    <option value="">都道府県を選択</option>
                    @foreach($prefectures as $prefecture)
                        <option value="{{ $prefecture->prefecture_id }}">{{ $prefecture->prefecture_name }}</option>
                    @endforeach
                </select>
                <button type="submit">検索</button>
            </form>
            @if ($errors->has('hotel_name'))
                <span class="text-danger">{{ $errors->first('hotel_name') }}</span>
            @endif
            @if ($errors->has('prefecture_id'))
                <span class="text-danger">{{ $errors->first('prefecture_id') }}</span>
            @endif
        </div>
        <hr>
        @yield('search_results')
    </div>
@endsection
