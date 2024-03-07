<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DriverTrip;
use App\Models\Trip;
use App\Models\City;
use App\Models\Reservation; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
{
    $trips = Trip::all();
    // dd($trips);
    return view('client.home', ['trips' => $trips]);
}


    public function create()
    {
        $client = Auth::user();

        $availableDriverTrips = DriverTrip::join('driver_details', 'driver_trips.driver_details_id', '=', 'driver_details.id')->where('driver_details.status', 'available')->get();
        // dd($availableDriverTrips); 
        return view('client.create', ['client' => $client, 'availableDriverTrips' => $availableDriverTrips]);
    }

    public function store(Request $request){
        // dd($request);
        $data = $request->validate([
            'driver_trip_id' => 'required',
            'client_id' => 'required',
            'date' => 'required|date',
        ]);

        $newreservation = Reservation::create($data);
        return redirect()->route('client.home');
    }

    public function history(){
        $client = Auth::user();
        $reservations = $client->reservations()->get();
        return view('client.history', ['reservations' => $reservations]);
    }

    // public function review(){

    // }

    public function dashboard()
    {
        $user = Auth::user();

       
        if ($user) {
            // Check the role of the user
            if ($user->role === 'admin') {
                return redirect()->route('admin.driver');
            } elseif ($user->role === 'driver') {
                return redirect()->route('driver.history');
            } elseif ($user->role === 'client') {
                return redirect()->route('client.home');
            }
        }

       
        return redirect()->route('login');
    }


    
    
}
