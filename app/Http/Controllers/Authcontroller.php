<?php

namespace App\Http\Controllers;

use App\Models\customer_adress;
use App\Models\Order;
use App\Models\orders_item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Authcontroller extends Controller
{
    public function login()
    {

        return view('front.account.login');
    }

    public function register()
    {
        return view('front.account.register');
    }


    public function processregister(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|confirmed'
        ]);

        if ($validate) {
            $register = DB::table('users')
                ->insert([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'password' => Hash::make($request->password),
                ]);


            if ($register) {
                session()->flash('success', 'You have been registered successfully');
                return redirect()->route('account.login');
            }
        } else {
            echo 'something went wrong';
        }
    }

    public function authenticate(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validatedData) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

                if (session()->has('url.intended')) {
                    return redirect(session()->get('url.intended'));
                }

                return redirect()->route('account.profile');
            } else {
                session()->flash('error', 'Either email/password is incorrect');
                return redirect()->route('account.login');
            }
        } else {

            return redirect()->route('account.login');
        }
    }

    public function profile()
    {
        $user = Auth::user();
        $address = customer_adress::where('user_id', $user->id)->first();

        return view('front.account.profile', compact('user', 'address'));
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('account.login');
    }

    public function orders()
    {
        $user = Auth::user();

        $orders = Order::where('user_id', $user->id)->orderBy('created_at', "DESC")->get();

        $data['orders'] = $orders;

        return view('front.account.orders', $data);
    }

    public function orderDetails($id)
    {
        $user = Auth::user();
        $data = [];
        $orders = Order::where('user_id', $user->id)->where('id', $id)->first();
        $data['order'] = $orders;

        $orderItems =  orders_item::Where('order_id', $id)->get();
        $data['orderItems'] = $orderItems;
        return view('front.account.orderdetails', $data);
    }

    public function updateProfile(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);

        try {
            // Get the user by ID
            $user = User::findOrFail($id); // Fetch the user based on the provided ID

            // Update the user's name and email
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->save();

            // Update or create the user's address
            customer_adress::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'mobile' => $request->input('phone'),
                    'address' => $request->input('address'),
                ]
            );

            // Redirect back with a success message
            return redirect()->route('front.profile')->with('success', 'Profile updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    
}
