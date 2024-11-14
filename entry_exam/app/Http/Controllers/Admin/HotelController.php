<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Hotel;
use App\Repositories\HotelRepositoryInterface;
use App\Repositories\PrefectureRepositoryInterface;
use App\Http\Requests\Hotel\StoreRequest;

class HotelController extends Controller
{
    protected $hotelRepository;
    protected $prefectureRepository;

    public function __construct(
        HotelRepositoryInterface $hotelRepository,
        PrefectureRepositoryInterface $prefectureRepository
    ) {
        $this->hotelRepository = $hotelRepository;
        $this->prefectureRepository = $prefectureRepository;
    }

    public function showSearch(): View
    {
        $prefectures = $this->prefectureRepository->fetchAll();
        return view('admin.hotel.search', compact('prefectures'));
    }

    public function showResult(): View
    {
        return view('admin.hotel.result');
    }

    public function showEdit(int $hotel_id): View
    {
        $hotel = $this->hotelRepository->findById($hotel_id);
        $prefectures = $this->prefectureRepository->fetchAll();
        return view('admin.hotel.edit', compact('hotel', 'prefectures'));
    }

    public function showCreate(): View
    {
        $prefectures = $this->prefectureRepository->fetchAll();
        return view('admin.hotel.create', compact('prefectures'));
    }

    public function create(StoreRequest $request)
    {
        $hotel = $this->hotelRepository->store($request->validated());

        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/img/hoteltype'), $fileName);
            $hotel->file_path = 'hoteltype/' . $fileName;
        }

        $hotel->save();

        return redirect()->route('adminHotelSearchPage')->with('success', 'ホテルが正常に作成されました。');
    }


    public function searchResult(Request $request)
    {
        $hotelNameToSearch = $request->input('hotel_name');
        $prefectureIdToSearch = $request->input('prefecture_id');

        if (empty($hotelNameToSearch) && empty($prefectureIdToSearch)) {
            return redirect()->route('adminHotelSearchPage')->withErrors(['hotel_name' => '何も入力されていません']);
        }

        $hotelList = $this->hotelRepository->getHotelListByNameAndPrefecture($hotelNameToSearch, $prefectureIdToSearch);
        $prefectures = $this->prefectureRepository->fetchAll();

        return view('admin.hotel.result', [
            'hotelList' => $hotelList,
            'prefectures' => $prefectures,
        ]);
    }

    public function editConfirm(StoreRequest $request): View
    {
        $hotel = $this->hotelRepository->findById($request->hotel_id);
        $validated = $request->validated();
        $prefecture = $this->prefectureRepository->findById($validated['prefecture_id']);
        
        $file_path = null;
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/img/hoteltype'), $fileName);
            $file_path = 'hoteltype/' . $fileName;
        }

        return view('admin.hotel.edit_confirm', [
            'hotel' => $hotel,
            'hotel_name' => $validated['hotel_name'],
            'prefecture_id' => $validated['prefecture_id'],
            'prefecture_name' => $prefecture->prefecture_name,
            'file_path' => $file_path,
        ]);
    }

    public function edit(Request $request)
    {
        $hotel = $this->hotelRepository->findById($request->hotel_id);
        $hotel->update($request->all());

        return redirect()->route('adminHotelEditComplete', ['hotel_id' => $request->hotel_id]);
    }

    public function editComplete(): View
    {
        return view('admin.hotel.edit_complete');
    }

    public function delete(Request $request)
    {
        $hotel = $this->hotelRepository->findById($request->hotel_id);
        if ($hotel) {
            $hotel->delete();
            return redirect()->route('adminHotelSearchPage')->with('success', 'ホテルが正常に削除されました。');
        }
        return redirect()->route('adminHotelSearchPage')->with('error', 'ホテルの削除に失敗しました。');
    }
}
