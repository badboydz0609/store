<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Favorite;
use App\Models\Buy;
use App\Models\ProductsBuy;
use App\Models\Payment;
use App\Models\Infopay;

class UserController extends Controller
{

    public function edit_cart_item(Request $request){
        $id_user_cart = Auth::user()->id;
        $id_item = $request->itemid;
        $quantity = $request->quantity;
        $product = Product::find($id_item);
        $data = Cart::where('user_id',$id_user_cart)->where('id_item',$id_item)->first();
        $data->total_price = (($quantity)*($product->product_price));
        $data->quantity_item = $quantity;
        $data -> save();
        return redirect()->back();
    }

    public function sup_cart_item($id = null){

        if (!$id) {
            return redirect()->route('cart');
        }

        $id_user_cart = Auth::user()->id;
        $data = Cart::where('user_id',$id_user_cart)->where('id_item',$id);
        $data -> delete();

        return redirect()->back();
    }

    public function cart(){
        $id_user_cart = Auth::user()->id;
        $cartItems = Cart::join('products', 'carts.id_item', '=', 'products.id')
        ->where('carts.user_id', $id_user_cart)
        ->select('carts.*', 'products.product_name', 'products.product_price', 'products.product_image','products.product_quantity',)
        ->get();

        $totalPrice = 0;
        $totalQuantity = 0;
        if ($cartItems->count() > 0) {
            foreach ($cartItems as $item) {
                $totalPrice += $item->total_price;
                $totalQuantity += $item->quantity_item;
            }
        }
        return view('home.cart', compact('cartItems', 'totalPrice', 'totalQuantity'));
    }

    public function add_salla(Request $request, $id = null){

        if (!$id) {
            return redirect()->route('websitehome');
        }

        $sall_id = Auth::user()->id;
        if(!$request->isMethod('post')){
            $data = Product::where('id',$id)->first();
            $search = Cart::where('id_item', $id)->where('user_id', $sall_id)->first();
            if(!$search){
                $sall = new Cart;
                $sall->user_id = $sall_id;
                $sall->total_price = $data->product_price;
                $sall->id_item = $data->id;
                $sall->quantity_item = 1;
                $sall -> save();
                return redirect()->back();
            } else {
                return redirect()->route('cart');
            }
        } else {
            $sall_item = $request -> itemdemoid;
            $data = Product::where('id',$sall_item)->first();
            $search = Cart::where('id_item', $sall_item)->where('user_id', $sall_id)->first();
            if(!$search){
                $sall = new Cart;
                $sall->user_id = $sall_id;
                $sall->total_price = (($data->product_price)*($request -> quantity));
                $sall->id_item = $sall_item;
                $sall->quantity_item = $request -> quantity;
                $sall -> save();
                return redirect()->back();
            } else {
                return redirect()->route('cart');
            }
        }

    }

    public function add_favorite($id = null){

        if (!$id) {
            return redirect()->route('websitehome');
        }

        $favorites_id = Auth::user()->id;
        $favorites_item = Favorite::where('favorite_user_id',$favorites_id)->where('favorite_item_id',$id)->first();
            if(!($favorites_item)){
                $data = new Favorite;
                $data->favorite_user_id = $favorites_id;
                $data->favorite_item_id = $id;
                $data->save();
                return redirect()->back();
            } else {
                $favorites_item->delete();
                return redirect()->back();
            }
    }

    public function favorite_items(){
        $data = Favorite::join('products','products.id','=','favorites.favorite_item_id')
        ->where('favorite_user_id',Auth::user()->id)
        ->select('products.id','products.product_name','products.product_price','products.product_image')
        ->get();
        return view('client.favorite_items',compact('data'));
    }

    public function buy_items(){
        $data = Buy::where('buy_client_id',Auth::user()->id)->get();

        foreach($data as $buy) {
            $buy->products = ProductsBuy::join('products','products.id','=','products_buys.ptoducts_buy_ptoduct_id')
                ->where('ptoducts_buy_buy_id', $buy->id)
                ->select('products.product_name','products.product_image','products.id','products_buys.ptoducts_buy_product_quantity','products_buys.ptoducts_buy_product_totalprice',)
                ->get();
        }
        return view('client.buy_items', compact('data'));
    }


    public function sup_favorite($id = null){

        if (!$id) {
            return redirect()->route('websitehome');
        }

        $data = Favorite::where('favorite_user_id',Auth::user()->id)->where('favorite_item_id',$id)->first();
        $data->delete();
        return redirect()->back();
    }

    public function checkout(){
        return view('client.checkout');
    }

    public function method($id = null){
        if(!$id) {
            return redirect()->route('checkout');
        }
    $data = $id;
    $pyment = Payment::where('payment_user_id',Auth::user()->id)->get();
    $info = Infopay::where('info_user_id',Auth::user()->id)->get();

    $id_user_cart = Auth::user()->id;
    $cartItems = Cart::join('products', 'carts.id_item', '=', 'products.id')
    ->where('carts.user_id', $id_user_cart)
    ->select('carts.*', 'products.product_name', 'products.product_price', 'products.product_image',)
    ->get();

    $totalPrice = 0;
    $totalQuantity = 0;
    if ($cartItems->count() > 0) {
        foreach ($cartItems as $item) {
            $totalPrice += $item->total_price;
            $totalQuantity += $item->quantity_item;
        }
    }
        return view('client.method',compact('data','pyment','info','cartItems', 'totalPrice', 'totalQuantity'));

    }

    public function pay_now(Request $request){
        $data = new Infopay;
        $data->info_user_id = Auth::user()->id;
        $data->full_name = $request->input('full_name');
        $data->full_address = $request->input('full_address');
        $data->full_zip = $request->input('full_zip');
        $data->save();

        return redirect()->route('method',1);
    }

    public function pay($id){

        if(!$id) {
            return redirect()->route('checkout');
        }

        $carts = Cart::where('user_id',Auth::user()->id)->get();
        $buy = new Buy;
        $buy->buy_client_id = Auth::user()->id;
        $cars = Cart::where('user_id',Auth::user()->id)->select(DB::raw('SUM(total_price) AS total_pric'))->first();
        $buy->buy_price = $cars->total_pric;
        $cars = Cart::where('user_id',Auth::user()->id)->select(DB::raw('SUM(quantity_item) AS quantity_ite'))->first();
        $buy->buy_quantity = $cars->quantity_ite;
        $buy->method_pay = $id;
        $buy->save();
        foreach ($carts as $cart) {
            $prodbuy = new ProductsBuy;
            $prodbuy->ptoducts_buy_buy_id = $buy->id;
            $prodbuy->ptoducts_buy_product_totalprice = $cart->total_price;
            $prodbuy->ptoducts_buy_ptoduct_id = $cart->id_item;
            $prodbuy->ptoducts_buy_product_quantity = $cart->quantity_item;
            $prodbuy->save();

            $prods = Product::where('id',$cart->id_item)->first();
            $prods->product_quantity = $prods->product_quantity - $cart->quantity_item;
            if($prods->product_quantity == 0){
                $prods->product_status = 0;
            }
            $prods->save();
        }
        $carts = Cart::where('user_id',Auth::user()->id);
        $carts->delete();

        return view('client.pay');
    }
}
