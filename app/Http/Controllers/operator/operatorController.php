<?php

namespace App\Http\Controllers\driver;

use App\Http\Controllers\Controller;
use App\Models\DriverTrip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class operatorController extends Controller
{
    public function index()
    {
        $user = Auth()->user();
    
    }
    

    public function create()
    {
       
    }

    public function store(Request $request){
       
    }

    
   
}
