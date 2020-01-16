<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\User;
use App\Models\Admin\Order;
use App\Models\Admin\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {

		$userCountCus = User::where('rule','3')->get()->count();
		$userCountEm = User::whereIn('rule', array(1, 2))->get()->count();
		$orderCount = Order::all()->count();
		$productCount = Product::all()->count();
		$orders = Order::all();
		$statistics =DB::table('orders')->sum('total_money');
		$sum_statistics=DB::select('SELECT YEAR(`created_at`) as year, SUM(`total_money`) AS total FROM `orders` Group by YEAR(`created_at`)');
		// dd($sum_statistics);
		$bestseller= DB::select('SELECT `order_details`.`product_id` as id, name,  SUM(`order_details`.`quantity`) as quantity, COUNT(`order_details`.`order_id`) as numberord FROM `order_details`, `products` WHERE `order_details`.`product_id` = `products`.`id` GROUP BY `product_id`, `name` ORDER BY quantity DESC LIMIT 10');
		$oldproducts=DB::select('SELECT `id`,`code`, `name`, `quantity`, `price`, `created_at` FROM `products` WHERE YEAR(`created_at`) <= (year(CURRENT_DATE) - 1) AND `quantity`>= 50');
		//  dd($oldproducts);
		return view('admin.layouts.index', compact('userCountCus','userCountEm','orderCount','productCount','orders','bestseller','oldproducts','statistics','sum_statistics'));
    }
	
}
