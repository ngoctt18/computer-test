<?php

namespace App\Http\Controllers\Website\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Website\Catagory;
use App\Models\Website\Product;


class ContactusController extends Controller
{
    public function contactus()
    {
        $catagories = Catagory::all();
        $products = Product::all();

        return view('website.contacts.contactus',compact('catagories','products'));
    }
}
