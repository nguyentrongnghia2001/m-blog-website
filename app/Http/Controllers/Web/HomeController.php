<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(Request $request): View
    {
        $viewData = [];
        $viewData["title"] = "24 News — Free Website Template, Free HTML5 Template by FreeHTML5.co";
   
        return view('web.pages.home.index')
            ->with("viewData", $viewData);
    }
    public function blog(): View
    {
        $viewData = [];
        $viewData["title"] = "Blog";
        return view('web.pages.blog.index')
            ->with("viewData", $viewData);
    }
    public function detail(): View
    {
        $viewData = [];
        $viewData["title"] = "Blog Detail";
        return view('web.pages.blog.detail')
            ->with("viewData", $viewData);
    }
    public function contact(): View
    {
        $viewData = [];
        $viewData["title"] = "Contact Us";
        return view('web.pages.contact.index')
            ->with("viewData", $viewData);
    }
}
