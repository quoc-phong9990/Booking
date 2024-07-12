<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HotelRequest;
use App\Http\Requests\Required;
use App\Models\District;
use App\Models\Hotel;
use App\Models\HotelComment;
use App\Models\HotelImage;
use App\Models\HotelService;
use App\Models\Province;
use App\Models\Service;
use App\Models\TourHotel;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::orderByDesc('created_at')->paginate(10);
        $title = "Hotels list";
        return view('admin.Hotel.index', compact('hotels', 'title'));
    }

    public function create()
    {
        $provinces = Province::all();
        $services = Service::all();
        $title = "Hotel add";
        return view('admin.Hotel.add', compact('provinces', 'services', 'title'));
    }


    public function store(HotelRequest $request)
    {

        $request->status ? $request->status : $request->merge(['status' => 0]);
        $request->is_active ? $request->is_active : $request->merge(['is_active' => 0]);
        $hotel = Hotel::create([
            'name' => $request->name,
            'price' => $request->price,
            'promotion' => $request->promotion,
            'description' => $request->description,
            'province_id' => $request->province_id,
            'district_id' => $request->district_id,
            'ward_id' => $request->ward_id,
            'address' => $request->address,
            'status' => $request->status,
            'is_active' => $request->is_active,
        ]);
        if ($hotel) {
            foreach ($request->services as $service) {
                HotelService::create([
                    'hotel_id' => $hotel->id,
                    'service_id' => $service,
                ]);
            }
            foreach ($request->images as $image) {
                $imageName =  uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('storage/hotels'), $imageName);
                HotelImage::create([
                    'hotel_id' => $hotel->id,
                    'image' => "storage/hotels/" .$imageName
                ]);
            }
        }
        return redirect()->route('hotels.index')->with('success', 'Hotel created successfully.');
    }

    public function show($id)
    {
        $provinces = Province::all();
        $services = Service::all();
        $provinces = Province::all();
        $hotel = Hotel::findOrFail($id);
        $hotel->images = $hotel->images()->paginate(5);
        $hotel->services = $hotel->services()->paginate(10);
        $hotel->comments = $hotel->comments()->paginate(10);
        // dd($hotel->images()->paginate(1)->links());
        $title = "Hotel show";
        return view('admin.Hotel.show', compact('hotel', 'provinces', 'services', 'title'));
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'promotion' => 'required|numeric|lt:price',
            'description' => 'required',
            'province_id' => 'required|exists:provinces,id',
            'district_id' => 'required|exists:districts,id',
            'ward_id' => 'required|exists:wards,id',
            'address' => 'required',
            'status' => 'nullable',
            'is_active' => 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        $request->status ? $request->status : $request->merge(['status' => 0]);
        $request->is_active ? $request->is_active : $request->merge(['is_active' => 0]);
        $hotel = Hotel::find($id);
        $hotel->update($request->all());
        return redirect()->back()->with('success', 'Updated hotel successfully!');

    }
    public function getHotelByProvince($province_id)
    {
        $hotels = Hotel::where('is_active', 1)->where('province_id', $province_id)->get();
        return response()->json($hotels);
    }


    public function destroy($id)
    {
        HotelImage::where('hotel_id', $id)->delete();
        HotelService::where('hotel_id', $id)->delete();
        HotelComment::where('hotel_id', $id)->delete();
        TourHotel::where('hotel_id', $id)->delete();
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();
        return redirect()->route('hotels.index')->with('success', 'Hotel deleted successfully.');
    }
}