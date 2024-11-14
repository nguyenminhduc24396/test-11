<!-- base view -->
@extends('common.admin.base')

<!-- CSS per page -->
@section('custom_css')
    @vite('resources/scss/admin/search.scss')
    @vite('resources/scss/admin/result.scss')
@endsection

<!-- main contents -->
@section('main_contents')
    <div class="container">
        <h2 class="title">予約情報検索</h2>
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
        <div class="search-booking">
            <form action="{{ route('adminBookingSearchResults') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="customer_name">顧客名</label>
                    <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ old('customer_name') }}">
                </div>
                <div class="form-group">
                    <label for="customer_contact">顧客連絡先</label>
                    <input type="text" class="form-control" id="customer_contact" name="customer_contact" value="{{ old('customer_contact') }}">
                </div>
                <div class="form-group">
                    <label for="checkin_time">チェックイン日時</label>
                    <input type="datetime-local" class="form-control" id="checkin_time" name="checkin_time" value="{{ old('checkin_time') }}">
                </div>
                <div class="form-group">
                    <label for="checkout_time">チェックアウト日時</label>
                    <input type="datetime-local" class="form-control" id="checkout_time" name="checkout_time" value="{{ old('checkout_time') }}">
                </div>
                <button type="submit" class="btn btn-primary">検索</button>
            </form>
            @if ($errors->has('customer_name'))
                <span class="text-danger">{{ $errors->first('customer_name') }}</span>
            @endif
            @if ($errors->has('customer_contact'))
                <span class="text-danger">{{ $errors->first('customer_contact') }}</span>
            @endif
            @if ($errors->has('checkin_time'))
                <span class="text-danger">{{ $errors->first('checkin_time') }}</span>
            @endif
            @if ($errors->has('checkout_time'))
                <span class="text-danger">{{ $errors->first('checkout_time') }}</span>
            @endif
        </div>
        <hr>
        @yield('search_results')
    </div>
@endsection
