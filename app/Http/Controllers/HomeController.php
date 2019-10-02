<?php

namespace App\Http\Controllers;

use App\Models\Category\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::get();
        return view('home', compact('categories'));
    }

    public function pay()
    {
        return view('static.pay');
    }

    public function delivery()
    {
        return view('static.delivery');
    }

    public function contact()
    {
        return view('static.contact');
    }
    public function bonus()
    {
        return view('static.bonus');
    }
}
