@extends('layouts.app') {{-- Assuming 'layouts.app' is your admin dashboard layout --}}
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel">
        <div class="content ">
            <div class="page-inner">
                <div class="mt-2 mb-4">
                    <h1 class="title1 ">Process Withdrawal #{{ $withdrawal->id }}</h1>
                </div>
                <x-danger-alert />
                <x-success-alert />

                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="card p-4 shadow-lg rounded-xl">
                            <div class="card-body">
                                <h2 class="text-xl font-semibold mb-4 text-gray-800">Withdrawal Details</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                                    <div>
                                        <p class="text-gray-600"><strong>Account Holder:</strong></p>
                                        <p class="text-gray-900 font-medium">{{ $withdrawal->duser->name }}</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-600"><strong>Amount:</strong></p>
                                        <p class="text-gray-900 font-medium">{{ $settings->currency ?? '' }}{{ number_format($withdrawal->amount, 8) }} ({{ $withdrawal->currency }})</p>
                                    </div>
                                    <div class="md:col-span-2">
                                        <p class="text-gray-600"><strong>Description:</strong></p>
                                        <p class="text-gray-900">{{ $withdrawal->Description }}</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-600"><strong>Payment Type:</strong></p>
                                        <p class="text-gray-900 font-medium">{{ $withdrawal->payment_mode }}</p>
                                    </div>
                                    @if($withdrawal->payment_mode == 'Cryptocurrency')
                                        <div>
                                            <p class="text-gray-600"><strong>Crypto Currency:</strong></p>
                                            <p class="text-gray-900 font-medium">{{ $withdrawal->crypto_currency }}</p>
                                        </div>
                                        <div class="md:col-span-2">
                                            <p class="text-gray-600"><strong>Wallet Address:</strong></p>
                                            <p class="text-gray-900 font-medium break-all">{{ $withdrawal->wallet_address ?? $withdrawal->accountname ?? 'N/A' }}</p>
                                        </div>
                                    @else
                                        <div class="md:col-span-2">
                                            <p class="text-gray-600"><strong>Beneficiary:</strong></p>
                                            <p class="text-gray-900 font-medium">{{ $withdrawal->accountname ?? 'N/A' }}</p>
                                        </div>
                                    @endif
                                    <div>
                                        <p class="text-gray-600"><strong>Current Status:</strong></p>
                                        <p class="text-gray-900 font-medium">
                                            <span class="badge @if($withdrawal->status == 'Processed') badge-success @elseif($withdrawal->status == 'On-hold') badge-warning @else badge-danger @endif">
                                                {{ $withdrawal->status }}
                                            </span>
                                        </p>
                                    </div>
                                    <div>
                                        <p class="text-gray-600"><strong>Date Created:</strong></p>
                                        <p class="text-gray-900 font-medium">{{ \Carbon\Carbon::parse($withdrawal->created_at)->toDayDateTimeString() }}</p>
                                    </div>
                                    @if($withdrawal->admin_comment)
                                        <div class="md:col-span-2">
                                            <p class="text-gray-600"><strong>Admin Comment:</strong></p>
                                            <p class="text-gray-900 italic">{{ $withdrawal->admin_comment }}</p>
                                        </div>
                                    @endif
                                </div>

                                <hr class="my-6 border-gray-200">

                                <h2 class="text-xl font-semibold mb-4 text-gray-800">Update Status</h2>
                                <form action="{{ route('admin.update-withdrawal-status', $withdrawal->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label for="status" class="form-label text-gray-700 font-medium">New Status</label>
                                        <select name="status" id="status" class="form-control rounded-md p-3 border border-gray-300 focus:ring-primary-500 focus:border-primary-500 w-full">
                                            <option value="Pending" {{ $withdrawal->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="Processed" {{ $withdrawal->status == 'Processed' ? 'selected' : '' }}>Processed</option>
                                            <option value="Declined" {{ $withdrawal->status == 'Declined' ? 'selected' : '' }}>Declined</option>
                                            <option value="On-hold" {{ $withdrawal->status == 'On-hold' ? 'selected' : '' }}>On-hold</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-6">
                                        <label for="admin_comment" class="form-label text-gray-700 font-medium">Admin Comment (Optional)</label>
                                        <textarea name="admin_comment" id="admin_comment" rows="3" class="form-control rounded-md p-3 border border-gray-300 focus:ring-primary-500 focus:border-primary-500 w-full" placeholder="Add any notes for this withdrawal">{{ $withdrawal->admin_comment ?? '' }}</textarea>
                                    </div>
                                    <div class="flex justify-end">
                                        <button type="submit" class="btn btn-primary px-4 py-2 rounded-md shadow-sm hover:bg-primary-700 transition-colors">
                                            Update Status
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
