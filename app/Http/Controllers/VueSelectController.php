<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class VueSelectController extends Controller
{
    public function vueSelect()
    {
        return Customer::all();
    }
}
