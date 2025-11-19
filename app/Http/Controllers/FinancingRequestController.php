<?php

namespace App\Http\Controllers;

use App\Models\FinancingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FinancingRequestController extends Controller
{
    public function index(){
        $request = FinancingRequest::with(['branch','user'])->latest()->paginate(20);

        return response()->json($request);
    }

    public function show(FinancingRequest $financingRequest)
    {
        return response()->json(
            $financingRequest->load(['branch', 'user'])
        );
    }

    public function store(Request $request){
        $validated = $request->validate([
            'branch_id'         => 'required|exists:branches,id',
            'counterparty_name' => 'required|string|max:255',
            'financing_amount'  => 'required|numeric',
            'currency'          => 'required|string|max:10',
            'rate_type'         => 'required|string|max:100',
            'maturity_date'     => 'required|date',
            'approval_note'     => 'required|file|mimes:pdf',
            'request_letter'    => 'required|file|mimes:pdf',
        ]);

        $validated['transaction_id'] = 'TRX' . time();

        $validated['user_id'] = auth()->id();

        $validated['approval_note']  = $request->file('approval_note')->store('approval_notes');
        $validated['request_letter'] = $request->file('request_letter')->store('request_letters');

        $fr = FinancingRequest::create($validated);

        return response()->json($fr, 201);
    }

     public function update(Request $request, FinancingRequest $financingRequest)
    {
        $validated = $request->validate([
            'counterparty_name' => 'sometimes|required|string|max:255',
            'financing_amount'  => 'sometimes|required|numeric',
            'currency'          => 'sometimes|required|string|max:10',
            'rate_type'         => 'sometimes|required|string|max:100',
            'maturity_date'     => 'sometimes|required|date',
            'financing_rate'    => 'nullable|numeric',

            // Optional file upload
            'approval_note'     => 'nullable|file|mimes:pdf',
            'request_letter'    => 'nullable|file|mimes:pdf',
        ]);

        if ($request->hasFile('approval_note')) {
            Storage::delete($financingRequest->approval_note);
            $validated['approval_note'] = $request->file('approval_note')->store('approval_notes');
        }

        if ($request->hasFile('request_letter')) {
            Storage::delete($financingRequest->request_letter);
            $validated['request_letter'] = $request->file('request_letter')->store('request_letters');
        }

        $financingRequest->update($validated);

        return response()->json($financingRequest);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FinancingRequest $financingRequest)
    {
        // delete file
        Storage::delete($financingRequest->approval_note);
        Storage::delete($financingRequest->request_letter);

        $financingRequest->delete();

        return response()->json(['message' => 'Deleted']);
    }

    /**
     * Download Approval Note
     */
    public function downloadApprovalNote(FinancingRequest $financingRequest)
    {
        return Storage::download($financingRequest->approval_note);
    }

    /**
     * Download Request Letter
     */
    public function downloadRequestLetter(FinancingRequest $financingRequest)
    {
        return Storage::download($financingRequest->request_letter);
    }
}
