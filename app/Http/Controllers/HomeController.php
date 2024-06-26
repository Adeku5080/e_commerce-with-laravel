<?php

namespace App\Http\Controllers;

use App\Models\Category;

class HomeController extends Controller
{
    /**
     * show home page
     */
    public function index()
    {
        $categories = Category::all();

        return view('home', compact('categories'));
    }
}
