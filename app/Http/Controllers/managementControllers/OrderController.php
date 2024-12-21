<?php


namespace App\Http\Controllers\managementControllers;

use App\Http\Controllers\Controller; 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use App\models\OrderDetail;
use App\models\Order;




class OrderController extends Controller
{
    

    public function orderManagement(Request $request)
    {
        $allorders=Order::get();
        return view("management.orders",["allorders"=>$allorders]);
    }

    public function orderDetails(Request $request)
    {
        $orderDetail=OrderDetail::query();

        if($request->order_id){
            $orderDetail->where('order_id',$request->order_id)->get();
        }
        $orderDetail=$orderDetail->get();
        return view("management.orders-details",["orderDetail"=>$orderDetail]);
    }
    

}
