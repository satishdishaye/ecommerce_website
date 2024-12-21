<?php
namespace App\Http\Controllers\managementControllers;
use App\Http\Controllers\Controller; 


use Illuminate\Http\Request;

use App\models\Coupon;

class CouponController extends Controller
{
    public function coupon(){
        $coupons=Coupon::get();
        return view('management.coupon',['coupons'=>$coupons]);
    }

    public function addCoupon(Request $request)
    {  

        $request->validate([
            "code"=>'required|string',
            "status"=>'required',

        ]);

        $coupon= new Coupon();
        $coupon->code=$request->code;
        $coupon->discount=$request->discount;
        $coupon->type=$request->coupon_type;
        $coupon->expires_at=$request->expires_at;
        $coupon->usage_limit=$request->usage_limit;
        $coupon->usage_count=0;
        $coupon->is_active=$request->status;

        if($coupon->save()){
            return redirect()->back()->with(['success'=>"Coupon added Successfully !"]);
        }else{
            return redirect()->back()->with(['error'=>"Please Re-Enter Data !"]);

        }
    }


    
    public function updateCoupon(Request $request)
    {  
        $request->validate([
            "update_code"=>'required|string',
            "status"=>'required',

        ]);

        $coupon= Coupon::where("id",$request->id)->first();
        $coupon->code=$request->code;
        $coupon->discount=$request->discount;
        $coupon->type=$request->coupon_type;
        $coupon->expires_at=$request->expires_at;
        $coupon->usage_limit=$request->usage_limit;
        $coupon->is_active=$request->status;
       

        if($coupon->save()){
            return redirect()->back()->with(['success'=>"Coupon updated Successfully !"]);
        }else{
            return redirect()->back()->with(['error'=>"Please Re-Enter Data !"]);

        }

    }
    
    public function deleteCoupon(Request $request ,$id)
    {  
        $coupon= Coupon::where("id",$id)->first();

        if($coupon->delete()){
            return redirect()->back()->with(['success'=>"Coupon deleted Successfully !"]);
        }else{
            return redirect()->back()->with(['error'=>"Please Re-Enter Data !"]);

        }
    }

}
