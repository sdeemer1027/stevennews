<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dashboard;

class DashboardController extends Controller
{
    public function index()
    {
        // Retrieve the dashboard information for the authenticated user
        $dashboard = auth()->user()->dashboard;

        // You can pass $dashboard to a view or perform other actions here
        return view('dashboard.index', compact('dashboard'));
    }


}
