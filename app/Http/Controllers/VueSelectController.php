<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;

class VueSelectController extends Controller
{
    public function vueSelectLicense()
    {
        return Product::all();
    }

    public function vueSelectAsset()
    {
        return Customer::all();
    }
}
