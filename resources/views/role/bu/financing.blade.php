@extends('layouts.app')

@section('header')
    <x-header
        title="Financing Request"
        subtitle="Create a new or monitor your request"
    />
@endsection

@section('content')

    {{-- Action bar --}}
    <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3">
        <div></div>
        <button
            class="btn btn-accent btn-input"
            onclick="window.dispatchEvent(new Event('open-panel'))">
            <i class="bi bi-plus"></i>
            <span>New Request</span>
        </button>
    </div>

    {{-- TABLE --}}
    <x-table>
        <x-slot:head>
            <tr>
                <x-th>ID transaction</x-th>
                <x-th>Counterparty</x-th>
                <x-th shortable="currency">Currency</x-th>
                <x-th shortable="financing-amount">Financing Amount</x-th>
                <x-th shortable="financing-rate">Financing Rate</x-th>
                <x-th>Status</x-th>
            </tr>
        </x-slot:head>

        <x-slot:body>
            @foreach ($financings as $item)
                <tr>
                    <td>{{ $item->transaction_id }}</td>
                    <td>{{ $item->counterparty_name }}</td>
                    <td>{{ $item->currency }}</td>
                    <td>{{ number_format($item->financing_amount, 2) }}</td>
                    <td>{{ $item->rate_type }}%</td>
                    <td>{{ $item->status }}</td>
                </tr>
            @endforeach
        </x-slot:body>
    </x-table>

    {{-- SIDE PANEL --}}
    <x-side-panel>

        <form id="formRequest" action="{{ route('financing-requests.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- ==================== STEP 1 ==================== -->
            <div id="step1">
                <x-card>
                    @if ($errors->any())
                        <div class="alert alert-danger mb-3">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <label>Counterparty Name</label>
                    <input type="text" name="counterparty_name" class="input">

                    <label>Currency</label>
                    <select name="currency" class="input">
                        <option value="USD">USD</option>
                        <option value="IDR">IDR</option>
                    </select>

                    <label>Financing Amount</label>
                    <input type="number" name="financing_amount" class="input">

                    <label>Rate Financing (%)</label>
                    <input type="text" name="rate_type" class="input">

                    <label>Open Date</label>
                    <input type="date" name="open_date" class="input">

                    <label>Maturity Date</label>
                    <input type="date" name="maturity_date" class="input">

                    <label>Approval Note (PDF)</label>
                    <input type="file" name="approval_note" class="input-file" accept="application/pdf">

                    <label>Request Letter (PDF)</label>
                    <input type="file" name="request_letter" class="input-file" accept="application/pdf">
                </x-card>

                <div class="footer-action mt-3">
                    <button type="button" class="btn btn-light" onclick="window.dispatchEvent(new Event('close-panel'))">Cancel</button>
                    <button type="button" class="btn btn-accent" onclick="goToStep2()">Next</button>
                </div>
            </div>

            <!-- ==================== STEP 2 (OVERVIEW) ==================== -->
            <div id="step2" style="display:none;">
                <x-card>
                    <h4>Overview</h4>
                    <ul class="overview-list">
                        <li><strong>Counterparty:</strong> <span id="ov_counterparty"></span></li>
                        <li><strong>Currency:</strong> <span id="ov_currency"></span></li>
                        <li><strong>Financing Amount:</strong> <span id="ov_amount"></span></li>
                        <li><strong>Rate Type:</strong> <span id="ov_rate"></span></li>
                        <li><strong>Open Date:</strong> <span id="ov_open"></span></li>
                        <li><strong>Maturity Date:</strong> <span id="ov_maturity"></span></li>
                        <li><strong>Approval Note:</strong> <span id="ov_approval"></span></li>
                        <li><strong>Request Letter:</strong> <span id="ov_request"></span></li>
                    </ul>
                </x-card>

                <div class="footer-action mt-3">
                    <button type="button" class="btn btn-light" onclick="goToStep1()">Back</button>
                    <button type="submit" class="btn btn-accent">Submit Request</button>
                </div>
            </div>
        </form>

    </x-side-panel>


@endsection
