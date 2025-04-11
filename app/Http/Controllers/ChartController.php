<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function LineChart()
    {
        return view('line-chart');
    }
}
