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
   
    
}
