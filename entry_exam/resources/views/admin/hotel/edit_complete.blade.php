@extends('common.admin.base')

@section('custom_css')
    @vite('resources/scss/admin/create.scss')
@endsection

@section('main_contents')
    <div class="page-wrapper create-page-wrapper">
        <h2 class="title">ホテル編集��了</h2>
        <p>ホテルの情報が正常に更新されました。</p>
        <a href="{{ route('adminHotelSearchPage') }}" class="btn btn-primary">検索画面に戻る</a>
    </div>
@endsection
