@extends('admin.hotel.search')

@section('search_results')
    <div class="page-wrapper search-page-wrapper">
        <div class="search-result">
            <h3 class="search-result-title">検索結果</h3>.
            @if (!empty($hotelList))
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ホテル名</th>
                        <th scope="col">都道府県</th>
                        <th scope="col">登録日</th>
                        <th scope="col">更新日</th>
                        <th scope="col">編集</th>
                        <th scope="col">削除</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hotelList as $hotel)
                        <tr>
                            <td><a href="" target="_blank">{{ $hotel['hotel_name'] }}</a></td>
                            <td>{{ $hotel['prefecture']['prefecture_name'] }}</td>
                            <td>{{ (string) $hotel['created_at'] }}</td>
                            <td>{{ (string) $hotel['updated_at'] }}</td>
                            <td>
                                <form action="{{ route('adminHotelEditPage') }}" method="get">
                                    @csrf
                                    <input type="hidden" name="hotel_id" value="{{ $hotel['hotel_id'] }}">
                                    <button type="submit" class="btn btn-primary">編集</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('adminHotelDeleteProcess') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="hotel_id" value="{{ $hotel['hotel_id'] }}">
                                    <button type="submit" class="btn btn-danger">削除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <p>検索結果がありません</p>
            @endif
        </div>
        <!-- Button trigger modal -->
    </div>
@endsection