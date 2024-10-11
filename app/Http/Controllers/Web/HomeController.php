<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "24 News — Free Website Template, Free HTML5 Template by FreeHTML5.co";
        return view('web.pages.index')
            ->with("viewData", $viewData);
    }
}
