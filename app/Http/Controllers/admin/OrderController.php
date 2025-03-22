<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\orderitem;
use App\Models\orders_item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(Request $request){
        $orders = Order::latest('orders.created_at')->select('orders.*','users.name','users.email')
        ->leftJoin('users', 'users.id', 'orders.user_id');  
        
        if($request->get('keyword') != ''){
            $orders = $orders->where('users.name','like','%'.$request->keyword.'%');
            $orders = $orders->orWhere('users.email','like','%'.$request->keyword.'%'); 
            $orders = $orders->orWhere('orders.id','like','%'.$request->keyword.'%'); 
       }

       $orders = $orders->paginate(10);

       $data['orders'] = $orders;
        return view('admin.orders.list',$data);
    }

    public function detail($orderid){

        $order = Order::select('orders.*','countries.name as countryName')
        ->where('orders.id',$orderid)
        ->leftJoin('countries','countries.id','orders.country_id')
        ->first();

        $orderItems = orders_item::where('order_id',$orderid)->get();

        return view('admin.orders.deatil',[
            'order' => $order,
            'orderItems' => $orderItems
        ]);

    }

    public function updateOrder(Request $request, $orderId)
{
    // Validate the incoming request data
    $request->validate([
        'status' => 'required|in:pending,shipped,delivered,cancelled',
        'shipped_date' => 'nullable|date',
    ]);

    // Find the order by ID
    $order = Order::findOrFail($orderId);

    // Update the order details
    $order->status = $request->status;

    // Only update shipped_date if the status is 'shipped' or 'delivered'
    if (in_array($request->status, ['shipped', 'delivered'])) {
        $order->shipped_date = $request->shipped_date;
    } else {
        $order->shipped_date = null; // Reset shipped_date if status is not 'shipped' or 'delivered'
    }

    $order->save();

    // Redirect back with a success message
    return redirect()->route('orders.detail', $order->id)->with('success', 'Order updated successfully.');
}
public function invoice($id){
    $invoiceNumber = 'INV-' . str_pad(1, 4, '0', STR_PAD_LEFT);
    $order = Order::find($id);
    $orderId = $order->id;
    $orderItems = DB::table('orders_items')->where('order_id',$orderId)->get();
    return view('admin.orders.invoice',compact('invoiceNumber','order','orderItems'));
}

}
