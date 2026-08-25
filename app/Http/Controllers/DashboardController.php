<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        return view('admin.dashboard-admin');
    }

    public function ownerDashboard()
    {
        return view('owner.dashboard-owner');
    }

    // public function petugasDashboard()
    // {
    //     return view('dashboard-petugas');
    // }
}