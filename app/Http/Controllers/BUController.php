<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BUController extends Controller
{
    public function dashboard(){
        return view('role.bu.finance');
    }
}
