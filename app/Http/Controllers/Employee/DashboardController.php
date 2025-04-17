<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $employee = Auth::guard('employee')->user();
        return view('employee.dashboard.playout.index', compact('employee'));

    }
}
