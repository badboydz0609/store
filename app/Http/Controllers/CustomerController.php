<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Product;
use App\Models\Catagory;
use App\Models\ProductsBuy;
use App\Models\Buy;
use App\Models\Payment;

class CustomerController extends Controller
{

    public function view_setting(){
        return view('customer.setting');
    }

    /*            PPPPPPPPPRRRRRRRRROOODDDDDDDDUUUUUUUCCCCTTTTTT       */

    public function view_product(){
        $data = Product::all();
        return view('customer.product',compact('data'));
    }

    public function add_product(){
        $catg = Catagory::all();
        return view('customer.add_product',compact('catg'));
    }


    public function add_new_product(Request $request){
        $info = new Product;
        $info->product_name = $request->product_name;
        $info->product_quantity = $request->product_quantity;
        $info->product_price = $request->product_price;
        $info->product_discount = $request->product_discount;
        $info->product_description = $request->product_description;
        $info->product_custo = Auth::user()->id;
        if($request->hasFile('product_image')){
            $file = $request->file('product_image');
            $timestamp = time();
            $fileName = $timestamp . '_' . $file->getClientOriginalName();
            $request->product_image->move(public_path('home/img/'), $fileName);
            $info->product_image = $fileName;
        }
        $info->categ_id = $request->categ_id;
        $info->save();
        return redirect()->back()->with('message','تم إضافة المنتوج بنجاح');
    }

    public function edit_new_product(Request $request){
        $info = Product::find($request->product_id);
        $info->product_name = $request->product_name;
        $info->product_quantity = $request->product_quantity;
        if ($request->product_quantity > 0) {
            $info->product_status = 1;
        }
        $info->product_price = $request->product_price;
        $info->product_discount = $request->product_discount;
        $info->product_description = $request->product_description;
        if($request->hasFile('product_image')){
            $file = $request->file('product_image');
            $timestamp = time();
            $fileName = $timestamp . '_' . $file->getClientOriginalName();
            $request->product_image->move(public_path('home/img/'), $fileName);
            $info->product_image = $fileName;
        }
        $info->categ_id = $request->categ_id;
        $info->save();
        return redirect()->back()->with('message','تم تعديل المنتوج بنجاح');

    }

    public function sup_product($id = null){

        if (!$id) {
            return redirect()->route('view_sellitem');
        }

        $data = Product::find($id);
        $data -> delete();
        return redirect()->back();
    }

    public function edit_product($id = null){

        if (!$id) {
            return redirect()->route('view_sellitem');
        }

        $data = Product::find($id);
        $catg = Catagory::all();
        return view('customer.edit_product',compact('data','catg'));
    }

    public function view_sellitem(){
        $products = Product::where('product_custo',Auth::user()->id)->orderBy('product_action', 'asc')->orderBy('product_status', 'asc')->get();
        return view('customer.view_sellitem',compact('products'));
    }

    public function view_buyitem(){
        $productsbuy = ProductsBuy::join('products', 'products.id', '=', 'products_buys.ptoducts_buy_ptoduct_id')
                        ->where('products.product_custo', Auth::user()->id)
                        ->select('products.product_image', 'products_buys.id', 'products.product_name', 'products_buys.ptoducts_buy_product_quantity')
                        ->get();
        return view('customer.view_buyitem', compact('productsbuy'));
    }

    public function show_buydetils($id = null){

        if (!$id) {
            return redirect()->route('view_buyitem');
        }

        $productsbuy = ProductsBuy::join('products', 'products.id', '=', 'products_buys.ptoducts_buy_ptoduct_id')
                        ->where('products.product_custo', Auth::user()->id)
                        ->where('products_buys.id', $id)
                        ->select('products_buys.ptoducts_buy_buy_id','products_buys.id','products_buys.ptoducts_buy_ptoduct_id','products.product_price','products.product_image', 'products_buys.id', 'products.product_name', 'products_buys.ptoducts_buy_product_quantity')
                        ->first();
        $clientsbuy = Buy::where('id',$productsbuy->ptoducts_buy_buy_id)->first();
        $total_price = $productsbuy->product_price*$productsbuy->ptoducts_buy_product_quantity;
        $productsclients = User::where('id',$clientsbuy->buy_client_id)
                                ->select('name')
                                ->first();
        $adress = Payment::where('payment_user_id',$clientsbuy->buy_client_id)->select('billing_address')->first();

        return view('customer.show_buydetils', compact('adress','productsbuy','clientsbuy','productsclients','total_price'));
    }

}
