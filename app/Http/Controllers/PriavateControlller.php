<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Payment;

class PriavateControlller extends Controller
{
    public function view_setting(){
        $data = User::find(Auth::user()->id);
        $pay = Payment::where('payment_user_id',Auth::user()->id)->first();
        return view('priavate.view_setting', compact('data','pay'));
    }

    public function retype_pay(Request $request){
        if(!$request->filled('cardholder_name') || !$request->filled('card_number') || !$request->filled('expiry_month') || !$request->filled('expiry_year') || !$request->filled('cvv') || !$request->filled('billing_address') || !$request->filled('billing_zip')) {
            return redirect()->back()->withErrors(['msg' => 'يجب ملئ جميع البيانات']);
        }

        $pay = Payment::where('payment_user_id',Auth::user()->id)->first();
        if (!isset($pay)) {
            $payment = new Payment();
            $payment->cardholder_name = $request->input('cardholder_name');
            $payment->payment_user_id = Auth::user()->id;
            $payment->card_number = $request->input('card_number');
            $payment->expiry_month = $request->input('expiry_month');
            $payment->expiry_year = $request->input('expiry_year');
            $payment->cvv = $request->input('cvv');
            $payment->billing_address = $request->input('billing_address');
            $payment->billing_zip = $request->input('billing_zip');
            $payment->save();
            return redirect()->back()->withErrors(['msg' => 'تم حفظ التغيرات']);
        } else {
            if(!$request->filled('cardholder_name') || !$request->filled('card_number') || !$request->filled('expiry_month') || !$request->filled('expiry_year') || !$request->filled('cvv') || !$request->filled('billing_address') || !$request->filled('billing_zip')) {
                return redirect()->back()->withErrors(['msg' => 'يجب ملئ جميع البيانات']);
            }

            $pay->cardholder_name = $request->input('cardholder_name');
            $pay->card_number = $request->input('card_number');
            $pay->expiry_month = $request->input('expiry_month');
            $pay->expiry_year = $request->input('expiry_year');
            $pay->cvv = $request->input('cvv');
            $pay->billing_address = $request->input('billing_address');
            $pay->billing_zip = $request->input('billing_zip');
            $pay->save();
            return redirect()->back()->withErrors(['msg' => 'تم حفظ التغيرات']);
        }

    }

    public function retype_pass(Request $request){
        if(!$request->filled('password0') || !$request->filled('password1')) {
            return redirect()->back()->withErrors(['msg2' => 'يجب وضع كلمة سر']);
        }

        $data = User::find(Auth::user()->id);
        if(password_verify($request->input('password0'), $data->password)){
            $data->password = bcrypt($request->input('password1'));
            $data->save();
            return redirect()->back()->withErrors(['msg2' => 'تم تغيير كلمة المرور بنجاح']);
        }
        return redirect()->back()->withErrors(['msg2' => 'كلمة المرور القديمة خاطئة']);
}

    public function add_new_photo(Request $request){

    if ($request->hasFile('photo_profile')){
        $data = User::find(Auth::user()->id);
        $file = $request->file('photo_profile');
        $timestamp = time();
        $fileName = $timestamp . '_' . $file->getClientOriginalName();
        $request->photo_profile->move(public_path('home/icons/users/'), $fileName);
        $data->profile_photo_path = $fileName;
        $data->save();
        return redirect()->back()->withErrors(['msg3' => 'تم وضع الصورة بنجاح']);
    }

        return redirect()->back()->withErrors(['msg3' => 'يجب وضع صورة']);

}

    public function retype_email(Request $request){

        if(!$request->filled('email')) {
            return redirect()->back()->withErrors(['msg1' => 'يجب وضع البريد الإلكتروني']);
        }

        $data = User::find(Auth::user()->id);
        $data->email = $request->input('email');
        $data->save();
        return redirect()->back()->withErrors(['msg1' => 'تم تغيير البريد الإلكتروني بنجاح']);
    }

    public function add_new_info(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->input('name');
        $data->phone = $request->input('phone');
        $data->save();
        return redirect()->back()->withErrors(['msg4' => 'تم تغيير البيانات بنجاح']);

    }
    
}
