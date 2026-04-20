@extends('layouts.dash2') {{-- Assuming 'layouts.dash2' is your user dashboard layout --}}
@section('title', 'Swap Bitcoin')
@section('content')

<div class="main-panel min-h-screen bg-gray-100 flex flex-col items-center py-8 px-4 sm:px-6 lg:px-8 font-inter">
    <div class="content w-full max-w-4xl mx-auto">
        <div class="page-inner">
            <div class="mt-2 mb-6 text-center">
                <h1 class="text-3xl font-extrabold text-gray-900 leading-tight">Swap {{ $settings->currency }} to Bitcoin (BTC)</h1>
                <p class="text-gray-600 mt-2">Convert your fiat currency to Bitcoin instantly.</p>
            </div>

            {{-- Laravel's default way to display validation errors --}}
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md relative mb-6 shadow-sm" role="alert">
                    <strong class="font-bold">Oops!</strong>
                    <span class="block sm:inline">Please correct the following errors:</span>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Display success or general error messages from the controller --}}
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md relative mb-6 shadow-sm" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md relative mb-6 shadow-sm" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <div class="flex justify-center">
                <div class="w-full lg:w-3/4 xl:w-2/3">
                    <div class="bg-white p-6 sm:p-8 shadow-lg rounded-xl border border-gray-200">
                        <div class="card-body">
                            <form action="{{ route('process-swap') }}" method="POST">
                                @csrf
                                <div class="mb-6">
                                    <label for="fiat_amount" class="block text-sm font-semibold text-gray-700 mb-2">Amount to Swap ({{ $settings->currency }})</label>
                                    <input type="number" step="0.01" name="fiat_amount" id="fiat_amount" class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out placeholder-gray-400" placeholder="e.g., 100.00" required min="0.01" max="{{ $user->account_bal ?? 0 }}">
                                    <p class="mt-2 text-sm text-gray-500">Your current {{ $settings->currency }} Balance: <span class="font-bold text-blue-600">{{ $settings->currency }}{{ number_format($user->account_bal ?? 0, 2, '.', ',') }}</span></p>
                                </div>

                                <div class="mb-8">
                                    <label for="btc_equivalent" class="block text-sm font-semibold text-gray-700 mb-2">Estimated BTC Equivalent</label>
                                    <input type="text" id="btc_equivalent" class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm bg-gray-100 cursor-not-allowed placeholder-gray-400" readonly value="0.00000000" placeholder="Calculated automatically">
                                    <p class="mt-2 text-sm text-gray-500">Current Swap Rate: 1 BTC = <span class="font-bold text-green-600">{{ $settings->currency }}{{ number_format($settings->btc_swap_rate ?? 0, 2, '.', ',') }}</span></p>
                                </div>

                                <div class="flex justify-end">
                                    <button type="submit" class="w-full sm:w-auto flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200 ease-in-out">
                                        <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 14.121a3 3 0 01-4.242 0L8 12l2.121-2.121a3 3 0 014.242 0m-4.242 4.242L12 16l2.121-2.121m-4.242 0a3 3 0 000 4.242L12 18l2.121-2.121a3 3 0 000-4.242"></path></svg>
                                        Proceed with Swap
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fiatAmountInput = document.getElementById('fiat_amount');
        const btcEquivalentInput = document.getElementById('btc_equivalent');
        // Ensure btcSwapRate is parsed as a float, handling potential null/empty values
        const btcSwapRate = parseFloat("{{ $settings->btc_swap_rate ?? 0 }}");

        function updateBtcEquivalent() {
            const fiatAmount = parseFloat(fiatAmountInput.value);
            // Only perform calculation if fiatAmount is a valid positive number and btcSwapRate is positive
            if (!isNaN(fiatAmount) && fiatAmount > 0 && btcSwapRate > 0) {
                const btcEquivalent = fiatAmount / btcSwapRate; // Calculate BTC: Fiat / Rate
                btcEquivalentInput.value = btcEquivalent.toFixed(8); // Format to 8 decimal places for BTC
            } else {
                btcEquivalentInput.value = '0.00000000'; // Reset to zero if input is invalid or rate is zero/negative
            }
        }

        fiatAmountInput.addEventListener('input', updateBtcEquivalent);
        updateBtcEquivalent(); // Initial calculation on page load
    });
</script>

@endsection

