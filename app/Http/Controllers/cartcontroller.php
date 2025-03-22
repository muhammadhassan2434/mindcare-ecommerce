<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use App\Models\customer_adress;
use App\Models\Order;
use App\Models\orderitem;
use App\Models\orders_item;
use App\Models\product;
use App\Models\shipping_charge;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use League\CommonMark\Extension\SmartPunct\EllipsesParser;

class CartController extends Controller
{
    public function addtocart(Request $request)
    {
        $product = Product::with('product_images')->find($request->id);

        if ($product == null) {
            return response()->json([
                'status' => false,
                'message' => 'Product not found',
            ]);
        }

        if (Cart::count() > 0) {
            // Add your logic for when the cart is not empty

            $cartcontent = cart::content();
            $productaleadyexist = false;

            foreach ($cartcontent as $item) {
                if ($item->id == $product->id) {
                    $productaleadyexist = true;
                }
            }

            if ($productaleadyexist == false) {
                $cart =  Cart::add($product->id, $product->title, 1, $product->price, ['productimage' => (!empty($product->product_images)) ? $product->product_images->first() : '']);
                $status = true;
                $message = 'product added';
            } else {
                $status = false;
                $message = 'product already added in cart added';
            }
        } else {
            echo 'card is empty now add product';
            // Cart is empty
            $cart =  Cart::add($product->id, $product->title, 1, $product->price, ['productimage' => (!empty($product->product_images)) ? $product->product_images->first() : '']);

            $status = true;
            $message = 'product added';
        }
        return response()->json([
            'status' => $status,
            'message' => $message,
        ]);
    }

    public function cart()
    {
        $cartcontent =  cart::content();
        // dd($cartcontent);
        $data['cartcontent'] = $cartcontent;

        return view('front.cart', $data);
    }

    public function updatecart(Request $request)
    {
        $rowId = $request->input('rowId');
        $qty = $request->input('qty');

        $iteminfo = Cart::get($rowId); // Retrieves item information from the cart based on rowId
        $product = Product::find($iteminfo->id); // Retrieves the product based on the iteminfo id

        // Check quantity availability in stock
        if ($product->track_qty == 'yes') {
            if ($qty  <= $product->qty) {
                Cart::update($rowId, $qty); // Update the cart with the new quantity
                $message = 'Product updated successfully';
                $status = true;
                session()->flash('success', $message);
            } else {
                $message = 'Requestd qty(' . $qty . ') not available in stock';
                $status = false;
                session()->flash('error', $message);
            }
        } else {
            Cart::update($rowId, $qty); // Update the cart with the new quantity
            $message = 'Product updated successfully';
            $status = true;
            session()->flash('success', $message);
        }


        return response()->json([
            'status' => $status,
            'message' => $message
        ]);
    }

    public function deleteitem(Request $request)
    {
        $rowId = $request->input('rowId');

        $iteminfo = Cart::get($rowId);

        if ($iteminfo == null) {
            $errormessage = 'Item not found in cart';
            session()->flash('error', $errormessage);
            return response()->json([
                'status' => false,
                'message' => $errormessage
            ]);
        }
        cart::remove($request->input('rowId'));
        $message = 'Item remove from cart successfully';
        session()->flash('success', $message);
        return response()->json([
            'status' => false,
            'message' => $message
        ]);
    }

    public function checkout()
{
    // If cart is empty, redirect to cart page
    if (Cart::count() == 0) {
        return redirect()->route('front.cart');
    }

    // If user is not logged in, redirect to login page
    if (Auth::check() == false) {
        if (!session()->has('url.intended')) {
            session(['url.intended' => url()->current()]);
        }
        return redirect()->route('account.login');
    }

    $customeradress = customer_adress::where('user_id', Auth::user()->id)->first();
    session()->forget('url.intended');

    $countries = Countries::orderBy('name', 'ASC')->get();

    // Initialize variables
    $totalShippingCharge = 0;
    $grandTotal = Cart::subtotal(2, '.', '');

    // Calculate shipping only if customer address is available
    if ($customeradress) {
        $userCountry = $customeradress->country_id;

        // Find the shipping charge for the user's country
        $shipping_info = shipping_charge::where('country_id', $userCountry)->first();

        // Check if shipping charge is found
        if ($shipping_info) {
            $totalQty = Cart::content()->sum('qty');
            $totalShippingCharge = $totalQty * $shipping_info->amount;
            $grandTotal += $totalShippingCharge;
        } else {
            // Handle case where no shipping charge is found for the country
            // Optionally, you can set a default shipping charge here
            $totalShippingCharge = 0; // No shipping charge
            $grandTotal = Cart::subtotal(2, '.', ''); // Grand total remains the subtotal
        }
    }

    return view('front.checkout', [
        'countries' => $countries,
        'customeradress' => $customeradress,
        'totalShippingCharge' => $totalShippingCharge,
        'grandTotal' => $grandTotal,
    ]);
}


public function processcheckout(Request $request)
{
    // Validate the request
    $validate = $request->validate([
        'first_name' => 'required|min:2',
        'last_name' => 'required|min:2',
        'email' => 'required|email',
        'country' => 'required',
        'address' => 'required|min:5',
        'city' => 'required|min:2',
        'state' => 'required|min:2',
        'zip' => 'required|min:2',
        'mobile' => 'required|min:10',
    ]);

    // Get the authenticated user
    $user = Auth::user();

    // Save or update customer address
    customer_adress::updateOrCreate(
        ['user_id' => $user->id],
        [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'country_id' => $request->country,
            'address' => $request->address,
            'apartment' => $request->apartment,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
        ]
    );

    // Calculate order totals
    $subtotal = Cart::subtotal(2, '.', '');
    $shipping = 0;

    // Fetch the shipping charge for the selected country
    $shippingInfo = shipping_charge::where('country_id', $request->country)->first();
    $totalQty = Cart::content()->sum('qty');

    if ($shippingInfo) {
        $shipping = $totalQty * $shippingInfo->amount;
    }

    $grandTotal = $subtotal + $shipping;

    // Insert order data into the orders table
    $order = new Order;
    $order->user_id = $user->id;
    $order->sub_total = $subtotal;
    $order->shipping = $shipping;
    $order->grand_total = $grandTotal;
    $order->payment_status = 'not paid'; // Default payment status for COD
    $order->status = 'pending'; // Initial order status
    $order->first_name = $request->first_name;
    $order->last_name = $request->last_name;
    $order->email = $request->email;
    $order->mobile = $request->mobile;
    $order->country_id = $request->country;
    $order->address = $request->address;
    $order->apartment = $request->apartment;
    $order->city = $request->city;
    $order->state = $request->state;
    $order->zip = $request->zip;
    $order->notes = $request->order_notes;
    // $order->payment_method = 'cod'; // Payment method is Cash on Delivery
    $order->save();

    // Insert each cart item into the order_items table
    foreach (Cart::content() as $item) {
        $orderitem = new orders_item;
        $orderitem->order_id = $order->id;
        $orderitem->product_id = $item->id;
        $orderitem->name = $item->name;
        $orderitem->qty = $item->qty;
        $orderitem->price = $item->price;
        $orderitem->total = $item->price * $item->qty;
        $orderitem->save();
    }

    // Clear the cart after placing the order
    Cart::destroy();

    // Redirect to the thank you page
    session()->flash('success', 'You have successfully placed your order');
    return redirect()->route('front.thankyou');
}


    public function thankyou()
    {
        return view('front.thanks');
    }

    public function getOrdersummary(Request $request)
    {

        $subtotal = cart::subtotal(2, '.', '');

        if ($request->country_id > 0) {

            $shippingInfo =  shipping_charge::where('country_id', $request->country_id)->first();

            $totalQty = 0;
            foreach (Cart::content() as $item) {
                $totalQty += $item->qty;
            }

            if ($shippingInfo != null) {

                $shippingCharge = $totalQty * $shippingInfo->amount;

                $grandTotal = $subtotal + $shippingCharge;

                return response()->json([
                    'status' => true,
                    'grandtotal' => number_format($grandTotal,2),
                    'shippingCharge' => number_format($shippingCharge,2),

                ]);
            } else {
                $shippingInfo =  shipping_charge::where('country_id', 'rest_of_world')->first();
                $shippingCharge = $totalQty * $shippingInfo->amount;

                $grandTotal = $subtotal + $shippingCharge;

                return response()->json([
                    'status' => true,
                    'grandtotal' => number_format($grandTotal,2),
                    'shippingCharge' => number_format($shippingCharge,2),
                    
                ]);
            }
        } 
        else {
            return response()->json([
                'status' => true,
                'grandtotal' => number_format($subtotal,2),
                'shippingCharge' => number_format(0,2),

            ]);
        }
    }
}
