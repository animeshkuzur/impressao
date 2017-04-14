<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Price;
use App\UserAddress;
use App\Discount;
use Carbon\Carbon;
use App\OrderDetail;

class PageController extends Controller
{
    public function print(){
        $rates = Price::get();
        $user_address = UserAddress::where('user_id',Auth::user()->id)->get();
    	return view('pages.print',['rates' => $rates,'user_address'=>$user_address]);
    }

    public function orders(){
        return view('pages.orders');
    }

    public function settings(){
        return view('pages.settings');
    }

    public function dashboard(){
    	return view('pages.dashboard');
    }

    public function add_address(Request $request){
        $data = $request->only('name','add1','add2','city','pin','mob');
        try{
            $entry = new UserAddress();
            $entry->user_id = Auth::user()->id;
            $entry->name = $data['name'];
            $entry->add1 = $data['add1'];
            $entry->add2 = $data['add2'];
            $entry->city = $data['city'];
            $entry->pincode = $data['pin'];
            $entry->phone = $data['mob'];
            $entry->save();

            $addr = UserAddress::where('user_id',Auth::user()->id)->get();
        }
        catch(Exception $e){

        }
        return response()->json(['success' => 'Address Added.','addr' => $addr]);
    }

    public function verify_discount(Request $request){
        $data = $request->only('discount');
        try{
            $check = Discount::where('coupon',$data['discount'])->get()->first();
            if($check){
                $cur_date = Carbon::now('Asia/Kolkata');
                $coupon_date = Carbon::createFromFormat('Y-m-d H:i:s', $check->validity, 'Asia/Kolkata');
                if($cur_date->gt($coupon_date)){
                    return response()->json(['error' => 'Coupon expired!']);
                }
                $user_orders = OrderDetail::where('discount_id',$check->id)->get()->first();
                if($user_orders){
                    return response()->json(['error' => 'Coupon already used!']);
                }
                return response()->json(['success' => 'Coupon applied successfully','rebate' => $check->rebate]);
            }
            else{
                return response()->json(['error' => 'Coupon does not exists!']);
            }
        }
        catch(Exception $e){

        }
        return response()->json(['error' => 'Server failure']);
    }

    public function delete_address(Request $request){
        $data = $request->only('address_id');
        try{
            $check = UserAddress::where('id',$data['address_id'])->get()->first();
            if($check){
                $delete = UserAddress::where('id',$data['address_id'])->delete();
                if($delete){
                    $addr = UserAddress::where('user_id',Auth::user()->id)->get();
                    return response()->json(['success' => 'Address deleted!','addr' => $addr]);
                }
            }
            else{
                return response()->json(['error' => 'No such address exists']);
            }
        }
        catch(Exception $e){

        }
        return response()->json(['error' => 'Server failure']);
    }

    public function password(Request $request){
        $data = $request->only('old_password','new_password');
        try{

        }
        catch(Exception $e){

        }
        return 0;
    }

    public function add_order(Request $request){
        $data = $request->only();
        try{
            
        }
        catch(Exception $e){

        }
        return 0;
    }
}
