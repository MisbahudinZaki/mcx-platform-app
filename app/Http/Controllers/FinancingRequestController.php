<?php

namespace App\Http\Controllers;

use App\Models\FinacingRequest;
use Illuminate\Http\Request;

class FinancingRequestController extends Controller
{
    public function index(){
        $user = auth()->user();

        $request = FinacingRequest::where('user_id', $user->id)->get();

        return response()->json($request);
    }

    public function show(){
        $user = auth()->user();

        $req = FinacingRequest::where('user_id', $user->id)->findOrFail($id);

        return response()->json($req);
    }

    public function store(Request $request){
        $request->validate([
            'counterparty_name' => 'required|string|max:255',
            'financing_amount' => 'required|numeric|min:1',
            'maturity_date' => 'required|date|after:today',

            'approval_note' => 'required|file|mimes:pdf|max:5120',
            'request_letter' => 'required|file|mimes:pdf|max:5120',
        ]);

        $user = auth()->user();

        $approvalNotePath = $request->file('approval_note')->store('financing/approval_notes', 'public');
        $requestLetterPath = $request->file('request_letter')->store('financing/request_letters', 'public');

        $req = FinacingRequest::create([
            'branch_id' => $user->branch_id,
            'user_id' => $user->id,
            'counterparty_name' => $request->counterparty_name,
            'financing_amount' => $request->financing_amount,
            'currency' => "USD",
            'rate_type' => "Rate Financing",
            'maturity_date' => $request->maturity_date,
            'approval_note' => $approvalNotePath,
            'request_letter' => $requestLetterPath,
        ]);

        return response()->json([
            'message' => 'Financing request created',
            'data' => $req,
        ]);
    }
}
