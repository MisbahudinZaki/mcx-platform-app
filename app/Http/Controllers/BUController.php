<?php

namespace App\Http\Controllers;

use App\Models\FinancingRequest;
use Illuminate\Http\Request;

class BUController extends Controller
{
    public function dashboard()
    {
        $financings = FinancingRequest::with(['branch','user'])->where('user_id', auth()->id())->latest()->paginate(20);

        return view('role.bu.financing', compact('financings'));
    }

}
