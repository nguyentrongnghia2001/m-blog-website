<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Startmin - Bootstrap Admin Theme";
   
        return view('admin.pages.dashboard.index')
            ->with("viewData", $viewData);
    }
}
