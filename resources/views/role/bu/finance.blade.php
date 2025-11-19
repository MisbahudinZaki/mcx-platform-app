@extends('layouts.app')

@section('header')

    <x-header

    title="Financing Request"
    subtitle="Create a new or monitor your request"

    >
        
    </x-header>
    
@endsection

@section('content')
    <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3">
        <div class="spacer" style="height: 14px"></div>
    </div>
    <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3">
        <div class="spacer" style="height: 14px"></div>
    </div>

    <x-table>
        <x-slot:head>
            <tr>
                <x-th>Id transaction</x-th>
                <x-th>Counterparty</x-th>
                <x-th shortable="currency">Currency</x-th>
                <x-th shortable="financing-amount">Financing Amount</x-th>
                <x-th shortable="financing-rate">Financing Rate</x-th>
                <x-th>Status</x-th>
            </tr>
        </x-slot:head>

        <x-slot:body>
            <tr>
                <td>FO-2025-01</td>
                <td>PT. Indo Sukses Makmur</td>
                <td>USD</td>
                <td>100.000,00</td>
                <td>7.25%</td>
                <td>Pending</td>
            </tr>
            <tr>
                <td>FO-2025-02</td>
                <td>PT. Indobaru Jaya</td>
                <td>USD</td>
                <td>75.000,00</td>
                <td>7.10%</td>
                <td>Rejected</td>
            </tr>
            <tr>
                <td>FO-2025-02</td>
                <td>PT. Global Kopra Area</td>
                <td>USD</td>
                <td>80.000,00</td>
                <td>7.20%</td>
                <td>Approved</td>
            </tr>
        </x-slot:body>
    </x-table>
@endsection