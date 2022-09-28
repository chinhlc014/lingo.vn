<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrendController extends BaseController
{
    public function index() {
        return view('client.trend.index');
    }
}
