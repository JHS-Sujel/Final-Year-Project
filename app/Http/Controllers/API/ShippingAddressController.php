<?php

namespace App\Http\Controllers\API;

use App\Address;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShippingAddressController extends Controller
{
    public function store(Request $request)
    {
        $userId = auth()->id();
        $shipping_address = Address::where('user_id', $userId)->first();
        if (!$shipping_address) {
            $address = Address::create([
                'user_id' => $userId,
                'full_name' => $request->full_name,
                'phone' => $request->phone,
                'house_no' => $request->house_no,
                'land_mark' => $request->land_mark,
                'zipcode' => $request->zipcode,
                'city' => $request->city,
                'state' => $request->state,
                'address_type' => $request->address_type,
            ]);
            return response()->json($address);
        }

        $shipping_address->full_name = $request->full_name;
        $shipping_address->phone = $request->phone;
        $shipping_address->house_no = $request->house_no;
        $shipping_address->land_mark = $request->land_mark;
        $shipping_address->zipcode = $request->zipcode;
        $shipping_address->city = $request->city;
        $shipping_address->state = $request->state;
        $shipping_address->address_type = $request->address_type;

        if ($shipping_address->save()) {
            return response()->json($shipping_address);
        }
    }
}
