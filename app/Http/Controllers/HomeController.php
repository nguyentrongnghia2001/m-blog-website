<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Trang chu - Online Store";
        return view('home.index')
            ->with("viewData", $viewData);
    }
    public function about()
    {
        $viewData = [];
        $viewData["title"] = "Gioi thieu - Online Store";
        $viewData["subtitle"] = "Gioi thieu";
        $viewData["description"] = "Day la trang gioi thieu!";
        $viewData["author"] = "Phat trien boi: OnlyU";
        $viewData["subtitle_custom"] = "Abc's description mo ta about";
        $viewData["is_layout"] = true;
        return view('about.index')->with("viewData", $viewData);
    }
    public function privacy()
    {
        $viewData = [];
        $viewData["title"] = "Chinh sach - Online Store";
        $viewData["subtitle"] = "Chinh sach";
        $viewData["description"] = "Day la trang chinh sach!";
        $viewData["author"] = "Phat trien boi: OnlyU";
        $viewData["subtitle_custom"] = "Abc's description mo ta privacy";
        $viewData["is_layout"] = true;
        return view('privacy.index')->with("viewData", $viewData);
    }
}