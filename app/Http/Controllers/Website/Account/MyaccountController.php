<?php

namespace App\Http\Controllers\Website\Account;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Website\UpdateAccountRequest;
use App\Models\Website\Catagory;
use App\Models\Website\Product;
use App\Models\Website\User;
use App\Models\Website\Order;
//use App\Http\Controllers\Admin;

class MyaccountController extends Controller
{
    public function myaccount()
    {
        $catagories = Catagory::all();
        $products = Product::all();

        $orders = Order::where('user_id', Auth::user()->id)->get();

        return view('website.accounts.myaccount', compact('catagories','products', 'orders'));
    }

    public function updateaccount(UpdateAccountRequest $request, $id)
   {
        $account = User::find($id);
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        $account->update($data);
        return redirect()->route('accounts.myaccount');
   }
}
