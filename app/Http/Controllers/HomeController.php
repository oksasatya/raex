<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('user.index');
    }
}