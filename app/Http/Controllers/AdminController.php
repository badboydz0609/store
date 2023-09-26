<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Models\Catagory;

use App\Models\User;

use App\Models\Product;

use App\Models\Cart;

use App\Models\ProductsBuy;

use App\Models\Favorite;

class AdminController extends Controller
{


    public function view_accepteditem(){
        $data = Product::orderBy('product_action','asc')->get();
        //dd($data);
        return view('admin.accepteditem',compact('data'));
    }

    public function view_setting(){
        return view('admin.setting');
    }

 /*            USEEEEEEEEEEEEEEEEEEEERRRRRRRRRRRRRR       */

    public function view_user(){
        $data = User::all();
        return view('admin.user',compact('data'));

    }

    public function add_user(){
        return view('admin.add_user');
    }


    public function add_new_user(Request $request){
        // create a new user record
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->role = $request->input('role');
        $user->password = Hash::make($request['password']);
        if ($request->hasFile('picture_profile')) {
            $file = $request->file('picture_profile');
            $timestamp = time();
            $fileName = $timestamp . '_' . $file->getClientOriginalName();
            $request->picture_profile->move(public_path('home/icons/users/'), $fileName);
            $user->profile_photo_path = $fileName;
    }
        $user->save();

        // redirect the user to the login page
        return redirect()->back()->with('success', 'تم إنشاء الحساب بنجاح.');
    }

    public function edit_new_user(Request $request){
        // create a new user record
        $user = User::find($request->input('id'));
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->role = $request->input('role');
        $user->password = Hash::make($request['password']);
        $user->save();

        // redirect the user to the login page
        return redirect()->back()->with('success', 'تم تعديل الحساب بنجاح.');
    }

    public function sup_user($id = null){

        if (!$id) {
            return redirect()->route('view_user');
        }

        $data = User::find($id);
        if($data){
            $data -> delete();
        }
        return redirect()->back();
    }

    public function edit_user($id = null){

        if (!$id) {
            return redirect()->route('view_user');
        }

        $data = User::find($id);
        return view('admin.edit_user',compact('data'));
    }

 /*            CCCAAATTTTAAAGGGGOOOORRRRYYYYYYY       */
    public function view_categorys(){
        $data = Catagory::all();
        return view('admin.categorys',compact('data'));
    }

    public function add_catagory(){
        return view('admin.add_catagory');
    }

    public function add_new_catagory(Request $request){
        $data = new Catagory;
        $data -> category_name = $request -> catagory;
        if ($request->hasFile('category_image')) {
            $file = $request->file('category_image');
            $timestamp = time();
            $fileName = $timestamp . '_' . $file->getClientOriginalName();
            $request->category_image->move(public_path('home/icons/Catagory/'), $fileName);
            $data->category_image = $fileName;
    }

        $data -> save();
        return redirect()->back()->with('message','تم إضافة التصنيف بنجاح');
    }

    public function sup_catagory($id = null){

        if (!$id) {
            return redirect()->route('view_categorys');
        }

        $data = Catagory::find($id);
        if($data){
            $data -> delete();
        }
        return redirect()->back();
    }

    public function edit_catagory(Request $request, $id = null){

        if (!$id) {
            return redirect()->route('view_categorys');
        }

        $data = Catagory::find($id);
        if($data){
            if($request->isMethod('post')){
            // التحقق من المتغرات
            $this->validate($request, [
            'catagory' => 'required',
            ]);
                if ($request->hasFile('category_image')){
                    $file = $request->file('category_image');
                    $timestamp = time();
                    $fileName = $timestamp . '_' . $file->getClientOriginalName();
                    $request->category_image->move(public_path('home/icons/Catagory/'), $fileName);
                    $data->category_image = $fileName;
                }
                // update the record with new data
                $data->category_name = $request->input('catagory');
                $data->save();
                // اعادة التوجيه مع النجاح
                return redirect()->back()->with('success', 'تم تعديل المنتوج بنجاح!');
            } else {
                return view('admin.edit_catagory',compact('data'));
            }
        } else {
            return redirect()->back();
        }
    }
    /*            PPPPPPPPPRRRRRRRRROOODDDDDDDDUUUUUUUCCCCTTTTTT       */

    public function add_product(){

        return view('admin.add_product');
    }


    public function add_new_product(Request $request){
        $info = new Product;
        $info -> name = $request -> name;
        $info -> email = $request -> email;
        $info -> phone = $request -> phone;
        $info -> password = $request -> password;
        $info -> save();
        return redirect()->back()->with('message','تم إضافة العضو بنجاح');
    }

    public function accept_product($id = null){

        if (!$id) {
            return redirect()->route('view_accepteditem');
        }

        $data = Product::find($id);
        $data->product_action = 1;
        $data->save();
        return redirect()->back();
    }

    public function sup_item($id = null){

        if (!$id) {
            return redirect()->route('view_accepteditem');
        }

        $data = Product::find($id);
        $data -> delete();
        return redirect()->back();
    }

    public function show_product($id = null){

        if (!$id) {
            return redirect()->route('view_accepteditem');
        }

        $data = Product::find($id);
        $cart = Cart::where('id_item',$id)->get();
        $buy = ProductsBuy::where('ptoducts_buy_ptoduct_id',$id)->get();
        $favorite = Favorite::where('favorite_item_id',$id)->get();

        $quan = 0;
        $quan_buy = 0;
        $favorite_item = 0;

        foreach($cart as $carts){
            $quan += $carts->quantity_item;
        }

        foreach($buy as $buys){
            $quan_buy += $buys->ptoducts_buy_product_quantity;
        }

        foreach($favorite as $favorites){
            $favorite_item += 1;
        }

        return view('admin.show_product',compact('data','quan','quan_buy','favorite_item'));
    }

    public function edit_product($id = null){

        if (!$id) {
            return redirect()->route('view_accepteditem');
        }

        $data = Product::find($id);
        return view('admin.edit_product');
    }
}
