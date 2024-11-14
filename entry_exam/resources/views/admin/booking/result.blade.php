@extends('admin.booking.search')

@section('search_results')
    <div class="page-wrapper search-page-wrapper">
        <div class="search-result">
            <h3 class="search-result-title">検索結果</h3>
            @if (!empty($bookings) && count($bookings) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">顧客名</th>
                        <th scope="col">顧客連絡先</th>
                        <th scope="col">チェックイン日時</th>
                        <th scope="col">チェックアウト日時</th>
                        <th scope="col">予約日時</th>
                        <th scope="col">情報更新日時</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                        <tr>
                            <td>{{ $booking->customer_name }}</td>
                            <td>{{ $booking->customer_contact }}</td>
                            <td>{{ $booking->checkin_time }}</td>
                            <td>{{ $booking->checkout_time }}</td>
                            <td>{{ $booking->created_at }}</td>
                            <td>{{ $booking->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <p>検索結果がありません</p>
            @endif
        </div>
    </div>
@endsection
