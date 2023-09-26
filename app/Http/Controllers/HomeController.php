<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Product;
use App\Models\Catagory;
use App\Models\Cart;
use App\Models\Favorite;
use App\Models\Buy;
use App\Models\ProductBuy;

class HomeController extends Controller
{
    public function index(){
        $categories = Catagory::all();
        $products = Product::where('product_action', '1')->with('catagory')->orderBy('created_at', 'desc')->get();

        // استخدام مصفوفة لتخزين المنتجات المرتبطة بكل تصنيف
        $categoryProducts = [];

        // حلقة للحصول على المنتجات لكل تصنيف
        foreach ($categories as $category) {
            $categoryProducts[$category->id] = $products->where('categ_id', $category->id)->take(8);
        }

        return view('home.userpage', compact('categories', 'categoryProducts'));
    }

    public function dashboard(){
        $role = Auth::user()->role;
        if ($role == 'admin'){
            $customers = User::where('role','=','customer')->limit(8)->get();
            $customers_coun = User::where('role','=','customer');
            $products = Product::where('product_action','1')->orderBy('created_at', 'desc')->limit(8)->get();
            $products_coun = Product::where('product_action','1');
            $products_non = Product::where('product_action','0');
            $catagories = Catagory::orderBy('created_at', 'desc')->limit(8)->get();
            $catagories_coun = Catagory::all();
            $adminstratuers = User::where('role','=','admin')->limit(8)->get();
            $adminstratuers_coun = User::where('role','=','admin');
            $clients = User::where('role','=','client')->limit(8)->get();
            $clients_coun = User::where('role','=','client');
            $salla_coun = Cart::all();
            $buy_coun = Buy::all();

            $salla_coun_all = $salla_coun->count();
            $buy_coun_all = $buy_coun->count();
            $customers_coun_all = $customers_coun->count();
            $products_coun_all = $products_coun->count();
            $catagories_coun_all = $catagories_coun->count();
            $adminstratuers_coun_all = $adminstratuers_coun->count();
            $clients_coun_all = $clients_coun->count();
            $products_non_all = $products_non->count();
            return view('admin.home',compact('customers','catagories','products','adminstratuers','clients','customers_coun_all','products_coun_all','catagories_coun_all','adminstratuers_coun_all','clients_coun_all','products_non_all','buy_coun_all','salla_coun_all'));
        } else {
            if ($role == 'customer'){
                $products = Product::where('product_action','1')->where('product_custo',Auth::user()->id)->orderBy('created_at', 'desc')->limit(8)->get();
                $products_coun = Product::where('product_action','1')->where('product_custo',Auth::user()->id);
                $salla_product = Product::where('product_custo',Auth::user()->id)->get();
                $products_non = Product::where('product_action','0')->where('product_custo',Auth::user()->id);

                        $buy_coun_all = DB::table('products_buys')
                        ->join('products', 'products_buys.ptoducts_buy_ptoduct_id', '=', 'products.id')
                        ->select(DB::raw('SUM(products_buys.ptoducts_buy_product_quantity) AS quan_buuy'))
                        ->where('products.product_custo', '=', Auth::user()->id)
                        ->first();

                        $salla_coun_all = DB::table('carts')
                        ->join('products', 'carts.id_item', '=', 'products.id')
                        ->select(DB::raw('SUM(carts.quantity_item) AS quan_salla'))
                        ->where('products.product_custo', '=', Auth::user()->id)
                        ->first();

                $products_coun_all = $products_coun->count();
                $products_non_all = $products_non->count();

                return view('customer.home',compact('products_non_all','products','products_coun_all','salla_coun_all','buy_coun_all'));
            } else {
                if ($role == 'client'){
                    $salla_coun = Cart::where('user_id',Auth::user()->id);
                    $fav_coun = Favorite::where('favorite_user_id',Auth::user()->id);
                    // for get number products
                    $buy_coun = DB::table('products_buys')
                    ->join('products','products.id', '=','products_buys.ptoducts_buy_ptoduct_id')
                    ->join('buys','buys.id','=','products_buys.ptoducts_buy_buy_id')
                    ->where('buys.buy_client_id', '=', Auth::user()->id)
                    ->get();
                    // for get products in buys
                    $salla_coun_all = $salla_coun->count();
                    $buy_coun_all = $buy_coun->count();
                    $fav_coun_all = $fav_coun->count();

                    return view('client.home',compact('salla_coun_all','fav_coun_all','buy_coun_all'));
                } else {
                    return redirect()->route('websitehome');
                }
            }
        }
    }

    public function view_about(){
        return view('home.view_about');
    }

    public function redirect(){
        return redirect()->route('websitehome');
    }

    public function search_item(Request $request){
        $search = $request->search;
        $search_items = Product::where('product_name', 'like', '%' . $search . '%')->get();
        return view('home.userpage', compact('search_items'));
    }

    public function demo_category($id = null){

        if (!$id) {
            return redirect()->route('websitehome');
        }

        $category = Catagory::find($id);
        if ($category) {
            $products = Product::where('categ_id', $id)->where('product_action', 1)->get();
            $products_all = $products->count();
            return view('home.demo_category', compact('category', 'products','products_all'));
        }
        return redirect()->back();
    }

    public function demo_item($id = null){

        if (!$id) {
            return redirect()->route('websitehome');
        }

        $demo_item = Product::find($id);
        if ($demo_item) {
            $cust_item = User::find($demo_item ->product_custo);
            $categories_item = Catagory::find($demo_item ->categ_id);
            $favorites_item = 0;
            if(auth()->check() && Auth::user()->role == 'client'){
                $favorites_item = Favorite::where('favorite_user_id', Auth::user()->id)->where('favorite_item_id', $id)->first();
            }
            $favorite = Favorite::where('favorite_item_id',$id)->get();
            $favorite_item = 0;
            foreach($favorite as $favorites){
                $favorite_item += 1;
            }
            return view('home.demo_item',compact('categories_item','demo_item','cust_item','favorites_item','favorite_item'));
        }
        return redirect()->back();
    }

    public function customer($id = null){

        if (!$id) {
            return redirect()->route('websitehome');
        }

        $customers = User::where('id', $id)->where('role','customer')->first();
        if ($customers && $customers->role === 'customer') {
            $quan_buy = DB::table('products_buys')
                ->join('products', 'products_buys.ptoducts_buy_ptoduct_id', '=', 'products.id')
                ->join('users', 'products.product_custo', '=', 'users.id')
                ->select(DB::raw('SUM(products_buys.ptoducts_buy_product_quantity) AS quan_buuy'))
                ->where('users.id', '=', $customers->id)
                ->first();
            $products = Product::where('product_custo', $customers->id)->where('product_action', 1)->get();
            $product_all = $products->count();
            return view('home.customer', compact('products', 'customers', 'product_all', 'quan_buy'));
        }
        return redirect()->back();
    }

}
