<?php

namespace App\Http\Controllers;

use App\Models\FinancingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FinancingRequestController extends Controller
{
    public function index() {
        $financings = FinancingRequest::with(['user'])->latest()->paginate(20);

        return view('role.bu.financing', compact('financings'));
    }

    public function show(FinancingRequest $financingRequest)
    {
        return response()->json(
            $financingRequest->load(['user'])
        );
    }

    public function store(Request $request){
        $validated = $request->validate([
            'counterparty_name' => 'required|string|max:255',
            'financing_amount'  => 'required|numeric',
            'currency'          => 'required|string|max:10',
            'rate_type'         => 'required|string|max:100',
            'open_date'         => 'required|date',
            'maturity_date'     => 'required|date',
            'approval_note'     => 'required|file|max:10240',
            'request_letter'    => 'required|file|max:10240',
        ]);

        $validated['transaction_id'] = 'FO-' . now()->format('Y-m');
        $validated['user_id'] = Auth::id();

        if ($request->hasFile('approval_note')) {
            $validated['approval_note'] = $request->file('approval_note')->store('approval_notes', 'public');
        }

        if ($request->hasFile('request_letter')) {
            $validated['request_letter'] = $request->file('request_letter')->store('request_letters', 'public');
        }

        FinancingRequest::create($validated);

        return redirect()->route('financing-requests.index')->with('success', 'Request created!');

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
