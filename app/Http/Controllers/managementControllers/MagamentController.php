<?php
namespace App\Http\Controllers\managementControllers;

use App\Http\Controllers\Controller; 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Store;
use App\Models\Staff;
use App\Helpers\StoresHelper;
use App\Mail\ResetPasswordMail;
use App\Models\Management;
use App\Models\Roles;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use App\Models\Banner;

class MagamentController extends Controller
{
    public function dashboard(Request $request)
    {
        return view('management.dashboard',[ 
            'TotalVender'=> 1,
            'TotalManagement'=> 1,
            'TotalConsignments'=> 1,
            'ReadyToPickup'=> 1,
            'totalIntransist'=> 1,
            'totalOutFDelivery'=> 1,
            'totalOtpFailed'=> 1,
            'totalDelivered'=> 1,
            'totalCollected'=> 1,
            'totalReturnIntransist'=> 1,
            'totalRTOReturn'=> 1,
            'totalNDR'=> 1,
            'totalCancelled'=> 1,
            'totalClosed'=> 1,
            'totalLost'=> 1,
        ]);
    }

    public function banner(Request $request)
    { 
        $query = Banner::query();
    
        if ($request->search) {
            $query->search($request->search);
        }
        $banner = $query->get();
        return view("management.banner", ["banner" => $banner]);
    }
    public function addBanner(Request $request)
    {  
        $request->validate([
            "name"=>'required|string',
            "type"=>'required|string',
            "banner_image"=>'required',
            "status"=>'required',

        ]);
        $banner= new Banner();
        $banner->name=$request->name;
        $banner->type=$request->type;
        $banner->status=$request->status;
         
        if ($request->hasfile('banner_image')) {
            @unlink('storage/app/' . $banner->image);
            $banner->banner_image = $request->file('banner_image')->store('public/banner','public');
        }
        if($banner->save()){
            return redirect()->back()->with(['success'=>"Banner added Successfully !"]);
        }else{
            return redirect()->back()->with(['error'=>"Please Re-Enter Data !"]);

        }
    }
    public function updateBanner(Request $request)
    {  
        $request->validate([
            "update_name"=>'required|string',
            "update_type"=>'required|string',
            "status"=>'required',

        ]);

        $banner= Banner::where("id",$request->id)->first();
        $banner->name=$request->update_name;
        $banner->type=$request->update_type;
        $banner->status=$request->status;

        if ($request->hasfile('update_banner_image')) {
            @unlink('storage/app/' . $banner->banner_image);
            $banner->banner_image = $request->file('update_banner_image')->store('public/banner','public');
        }
        if($banner->save()){
            return redirect()->back()->with(['success'=>"Banner updated Successfully !"]);
        }else{
            return redirect()->back()->with(['error'=>"Please Re-Enter Data !"]);
        }
    }
    public function deleteBanner(Request $request ,$id)
    {  
        $banner= Banner::where("id",$id)->first();

        if($banner->delete()){
            return redirect()->back()->with(['success'=>"Banner deleted Successfully !"]);
        }else{
            return redirect()->back()->with(['error'=>"Please Re-Enter Data !"]);

        }
    }  
}

