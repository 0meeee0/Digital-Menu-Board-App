<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class OperatorController extends Controller
{

    public function index()
    {
        $user = auth()->user();

        // ! JUST FOR TESTING
        if ($user && $user->role != 2) {
            return View::make('operator.dashboard');
        } else {
            abort(403, 'Unauthorized');
        }

    }


}
