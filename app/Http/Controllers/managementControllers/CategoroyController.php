<?php
namespace App\Http\Controllers\managementControllers;
use App\Http\Controllers\Controller; 


use Illuminate\Http\Request;

class CategoroyController extends Controller
{
    public function categoryManagement(Request $request)
    {  
         return view("management.category-management");
    }
}
