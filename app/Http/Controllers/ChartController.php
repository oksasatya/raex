<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\chart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ChartController extends Controller
{
    public function addtochart(Request $request)
    {
        $chart = new chart();
        $chart->product_id = $request->product_id;
        $chart->user_id = auth()->user()->id;
        $chart->quantity = $request->quantity;
        $chart->save();
        return redirect()->back()->with('success', 'Product berhasil ditambahkan');
    }

    public function index()
    {
        $charts = chart::where('user_id', auth()->user()->id)->get();
        return view('pages.chart.index', compact('charts'));
    }
}