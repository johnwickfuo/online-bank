@extends('layouts.dash2') {{-- Assuming 'layouts.dash2' is your user dashboard layout --}}
@section('title', 'Send Bitcoin')
@section('content')

<div class="main-panel min-h-screen bg-gray-100 flex flex-col items-center py-8 px-4 sm:px-6 lg:px-8 font-inter">
    <div class="content w-full max-w-4xl mx-auto">
        <div class="page-inner">
            <div class="mt-2 mb-6 text-center">
                <h1 class="text-3xl font-extrabold text-gray-900 leading-tight">Send Bitcoin (BTC)</h1>
                <p class="text-gray-600 mt-2">Securely transfer your Bitcoin to any recipient address.</p>
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
                            <form action="{{ route('process-send-btc') }}" method="POST">
                                @csrf
                                <div class="mb-6">
                                    <label for="btc_address" class="block text-sm font-semibold text-gray-700 mb-2">Recipient BTC Address</label>
                                    <input type="text" name="btc_address" id="btc_address" class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out placeholder-gray-400" placeholder="Enter Bitcoin address" required>
                                    <p class="mt-2 text-sm text-gray-500">Ensure the address is correct. BTC transactions are irreversible.</p>
                                </div>

                                <div class="mb-8">
                                    <label for="btc_amount" class="block text-sm font-semibold text-gray-700 mb-2">Amount to Send (BTC)</label>
                                    <input type="number" step="0.00000001" name="btc_amount" id="btc_amount" class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out placeholder-gray-400" placeholder="e.g., 0.0005" required min="0.00000001" max="{{ $user->btc_balance ?? 0 }}">
                                    <p class="mt-2 text-sm text-gray-500">Your current BTC Balance: <span class="font-bold text-blue-600">{{ number_format($user->btc_balance ?? 0, 8, '.', ',') }} BTC</span></p>
                                </div>

                                <div class="flex justify-end">
                                    <button type="submit" class="w-full sm:w-auto flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200 ease-in-out">
                                        <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                        Send Bitcoin
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

@endsection

