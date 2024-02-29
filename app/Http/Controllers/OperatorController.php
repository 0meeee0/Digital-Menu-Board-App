<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Restaurant;
use Carbon\Carbon;

class OperatorController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // ! JUST FOR TESTING
        if ($user && $user->role != 2) {
            $restaurants = Restaurant::all();
            return view('operator.dashboard', compact('restaurants'));
        } else {
            abort(403, 'Unauthorized');
        }
    }

    public function storeRestaurant(Request $request)
    {
        $user = auth()->user();

        if ($user && $user->role != 2) {
            $request->validate([
                'name' => 'required|string',
                'address' => 'required|string',
                'openingHour' => 'required|date_format:H:i',
            ]);

            $restaurant = new Restaurant([
                'name' => $request->input('name'),
                'address' => $request->input('address'),
                'openingHour' => Carbon::parse($request->input('openingHour'))->toTimeString(),
            ]);

            $restaurant->operatorId = $user->id;

            if ($restaurant->save()) {
                return redirect()->route('operator.dashboard')->with('success', 'Restaurant added successfully');
            } else {
                return redirect()->route('operator.dashboard')->with('error', 'Failed to add restaurant');
            }
        } else {
            abort(403, 'Unauthorized');
        }
    }



    public function destroyRestaurant($id)
    {
        $user = auth()->user();

        if ($user && $user->role != 2) {
            $restaurant = Restaurant::findOrFail($id);
            $restaurant->delete();

            return redirect()->route('operator.dashboard');
        } else {
            abort(403, 'Unauthorized');
        }
    }
}
