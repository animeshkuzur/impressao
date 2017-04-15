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
use App\Order;
use App\Document;

class PageController extends Controller
{
    public function print(){
        $rates = Price::get();
        $user_address = UserAddress::where('user_id',Auth::user()->id)->get();
    	return view('pages.print',['rates' => $rates,'user_address'=>$user_address]);
    }

    public function orders(){
        $orders = Order::where('user_id',Auth::user()->id)->join('order_details','order_details.id','=','orders.order_detail_id')->join('documents','documents.id','=','order_details.document_id')->get();

        return view('pages.orders',['orders'=>$orders]);
    }

    public function settings(){
        return view('pages.settings');
    }

    public function dashboard(){
        $orders = Order::where('completed',false)->get();
    	return view('pages.dashboard',['orders'=>$orders]);
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
        $data = $request->only('address_id','document_id','pg_color','pg_side','pg_size','pg_type','pg_number','cp_number','discount','comment','paymode_id');
        $dis = 0;
        try{
            $or_d = new OrderDetail();
            if($this->verify_discount_code($data['discount'])){
                $discount = Discount::where('coupon',$data['discount'])->get()->first();
                
                $or_d->page_size_id = $data['pg_size'];
                $or_d->page_type_id = $data['pg_type'];
                $or_d->print_type_id = $data['pg_color'];
                $or_d->print_side_id = $data['pg_side'];
                $or_d->document_id = $data['document_id'];
                $or_d->pages = $data['pg_number'];
                $or_d->copies = $data['cp_number'];
                $or_d->discount_id = $discount->id;
                $or_d->comments = $data['comment'];
                $or_d->save();

                $dis = $discount->rebate;
            }
            else{
                
                $or_d->page_size_id = $data['pg_size'];
                $or_d->page_type_id = $data['pg_type'];
                $or_d->print_type_id = $data['pg_color'];
                $or_d->print_side_id = $data['pg_side'];
                $or_d->document_id = $data['document_id'];
                $or_d->pages = $data['pg_number'];
                $or_d->copies = $data['cp_number'];
                $or_d->comments = $data['comment'];
                $or_d->save();
            }
            $price = Price::where([
                ['page_size_id','=',$data['pg_side']],
                ['page_type_id','=',$data['pg_type']],
                ['print_type_id','=',$data['pg_color']],
                ['print_side_id','=',$data['pg_side']]
                ])->get()->first();

            $amount = $this->get_amount($price->price,$data['pg_number'],$data['cp_number'],$dis);

            $or = new Order();
            $or->user_id = Auth::user()->id;
            $or->address_id = $data['address_id'];
            $or->order_detail_id = $or_d->id;
            $or->payment_mode_id = $data['paymode_id'];
            $or->date_time = Carbon::now('Asia/Kolkata');
            $or->amount = $amount;
            $or->save();

            return response()->json(['success'=>'Order Placed successfully!']);
        }
        catch(Exception $e){

        }
        return response()->json(['error'=>'Something went wrong. Try again.']);
    }

    public function verify_discount_code($discount){
        try{
            $check = Discount::where('coupon',$discount)->get()->first();
            if($check){
                $cur_date = Carbon::now('Asia/Kolkata');
                $coupon_date = Carbon::createFromFormat('Y-m-d H:i:s', $check->validity, 'Asia/Kolkata');
                if($cur_date->gt($coupon_date)){
                    return false;
                }
                $user_orders = OrderDetail::where('discount_id',$check->id)->get()->first();
                if($user_orders){
                    return false;
                }
                return true;
            }
            else{
                return false;
            }
        }
        catch(Exception $e){

        }
        return false;
    }

    public function get_amount($price,$pg_number,$cp_number,$dis){
        try{
            $sum = ($price*$pg_number)*$cp_number;
            $total = $sum-($sum*($dis/100));
            //$check = Order::where('user_id',Auth::user()->id)->get()->first();
            //if($check){
            //    return ($total+10);
            //}
            $total = $total + 10; //Delivery Charge
            return $total;
        }
        catch(Exception $e){

        }
        return 0;
    }

    public function orders_details($id){
        
        return 0;
    }
}
