<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Countries;
use App\Models\shipping_charge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Psy\Command\WhereamiCommand;

class shippingController extends Controller
{
    public function create()
    {
        $countries =  Countries::get();
        $data['countries'] = $countries;

        $shipping_charge = shipping_charge::select("shipping_charges.*", 'countries.name')->leftJoin('countries', 'countries.id', 'shipping_charges.country_id')->get();
        $data['shipping_charge'] = $shipping_charge;
        return view('admin.shipping.create', $data);
    }
    public function store(Request $request)
    {

        $count = shipping_charge::where('country_id', $request->country)->count();


        $validator = $request->validate([
            'country' => 'required',
            'amount' => 'required|numeric', // You can adjust the validation rules as needed
        ]);

        if ($validator) {
            if ($count> 0) {
                session()->flash('error','Record already exist');
                return redirect()->route('shipping.create');
            }

            $shipping = new shipping_charge();
            $shipping->country_id = $request->country;
            $shipping->amount = $request->amount;
            $shipping->save();
            
            return redirect()->route('shipping.create');
            return response()->json([
                'status' => true,
            ]);
        } else {
            return response()->json([
                'status' => false,
            ]);
        }
    }

    public function edit($id)
    {
        $shippingCharge = shipping_charge::find($id);
        
        
        $countries =  Countries::get();
        $data['countries'] = $countries;
        $data['shippingCharge'] = $shippingCharge;
        return view('admin.shipping.edit', $data);
    }
    
    
    public function update($id, Request $request)
    {
        $validator = $request->validate([
            'country' => 'required',
            'amount' => 'required|numeric', // You can adjust the validation rules as needed
        ]);

        if ($validator) {
            $shipping =  shipping_charge::find($id);
            $shipping->country_id = $request->country;
            $shipping->amount = $request->amount;
            $shipping->save();
            
            return redirect()->route('shipping.create');
            return response()->json([
                'status' => true,
            ]);
        } else {
            return response()->json([
                'status' => false,
            ]);
        }
    }

    public function destroy($id){
        $shippingcharge = shipping_charge::find($id);
    
        if(!$shippingcharge){
            session()->flash('error', 'Shipping not found');
            return redirect()->route('shipping.create');
        }
    
        $shippingcharge->delete();
        
        session()->flash('success', 'Shipping deleted successfully');
        return redirect()->route('shipping.create');
    }
    
}
