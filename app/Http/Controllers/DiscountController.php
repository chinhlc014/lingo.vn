<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiscountController extends BaseController
{
    public function index() {
        return view('client.discount.index');
    }
}
