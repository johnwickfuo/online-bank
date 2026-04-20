@extends('layouts.dash2')
@section('title', $title)
@section('content')
    <!-- Page title -->
    <div class="page-title mb-5">
        <div class="flex justify-between items-center">
            <div class="mb-3">
                <h5 class="text-black text-3xl font-semibold">Your {{ $plan->planDetails->name }} Asset</h5>
            </div>
        </div>
    </div>

    <x-danger-alert />
    <x-success-alert />

    <div class="mt-3">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <p>
                    @if($plan->invest_type=="Shares")
                    <a href="{{ route('myshares') }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                        <i class="p-2 rounded-lg lucide-arrow-left-circle text-xl"></i> My Shares Assets

                    </a>
                    @else


                    @endif
                </p>
            </div>

            <h2 class="text-black text-xl font-semibold mb-4">
                {{ $plan->planDetails->name }} -
                {{ $plan->planDetails->increment_type == 'Fixed' ? $settings->currency : '' }}{{ $plan->planDetails->increment_amount }}
                {{ $plan->planDetails->increment_type == 'Percentage' ? '%' : '' }}
                {{ $plan->planDetails->increment_interval }}
                for {{ $plan->planDetails->expiration }}
            </h2>

            <div class="flex justify-between items-center">
                <div>
                    @if ($plan->active == 'yes')
                        <span class="bg-green-500 text-white text-xs px-2 py-1 rounded-full">Active</span>
                    @elseif($plan->active == 'expired')
                        <span class="bg-red-500 text-white text-xs px-2 py-1 rounded-full">Expired</span>
                    @else
                        <span class="bg-yellow-500 text-white text-xs px-2 py-1 rounded-full">Pending</span>
                    @endif
                </div>
                @if ($settings->should_cancel_plan)
                    @if ($plan->active == 'yes')
                        <a href="#" class="px-3 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 text-sm" data-toggle="modal"
                            data-target="#exampleModal">
                            <i class="fas fa-times"></i> Cancel this Plan
                        </a>

                        <!-- cancel plan modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Cancel Plan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to cancel your {{ $plan->planDetails->name }} plan?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <a href="{{ route('cancelplan', $plan->id) }}" class="btn btn-danger">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            </div>

            <hr class="my-4">

            <div class="mt-5">
                <h4 class="text-xl font-semibold mb-4">Asset Information</h4>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center">
                        <h2 class="text-lg font-semibold">{{ $settings->currency }}{{ number_format($plan->amount, 2, '.', ',') }}</h2>
                        <small>Invested Amount</small>
                    </div>
                    <div class="text-center">
                        <h2 class="text-lg font-semibold text-green-500">{{ $settings->currency }}{{ number_format($plan->profit_earned, 2, '.', ',') }}</h2>
                        <small>Profit Earned</small>
                    </div>
                    <div class="text-center">
                        <h2 class="text-lg font-semibold text-green-500">
                            @if ($settings->return_capital)
                                {{ $settings->currency }}{{ number_format($plan->amount + $plan->profit_earned, 2, '.', ',') }}
                            @else
                                {{ $settings->currency }}{{ number_format($plan->profit_earned, 2, '.', ',') }}
                            @endif
                        </h2>
                        <small>Total Return</small>
                    </div>
                </div>
            </div>

            <div class="mt-5 grid grid-cols-1 md:grid-cols-3 gap-4 border-b pb-4">
                <div>
                    <p class="font-semibold">Duration: <br><strong>{{ $plan->planDetails->expiration }}</strong></p>
                </div>
                <div>
                    @if($plan->created_at)
                    <p class="font-semibold">Start Date: <br><strong>{{ $plan->created_at->addHour()->toDayDateTimeString() }}</strong></p>
                    @else
                    N/A
                    @endif
                </div>
                <div>
                    <p class="font-semibold">End Date: <br><strong>{{ \Carbon\Carbon::parse($plan->expire_date)->addHour()->toDayDateTimeString() }}</strong></p>
                </div>
            </div>

            <div class="mt-5 grid grid-cols-1 md:grid-cols-3 gap-4 border-b pb-4">
                <div>
                    <p class="font-semibold">Minimum Return: <br><strong>{{ $plan->planDetails->minr }}3%</strong></p>
                </div>
                <div>
                    <p class="font-semibold">Maximum Return: <br><strong>{{ $plan->planDetails->maxr }}%</strong></p>
                </div>
                <div>
                    <p class="font-semibold">ROI Interval: <br><strong>{{ $plan->planDetails->increment_interval }}</strong></p>
                </div>
            </div>

            <div class="mt-5">
                <h4 class="text-xl font-semibold mb-4">Transactions</h4>
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left">Type</th>
                                <th class="px-4 py-2 text-left">Date</th>
                                <th class="px-4 py-2 text-left">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($transactions as $history)
                                <tr>
                                    <td class="px-4 py-2">Profit</td>
                                    <td class="px-4 py-2">{{ $history->created_at->addHour()->toDayDateTimeString() }}</td>
                                    <td class="px-4 py-2">{{ $settings->currency }}{{ number_format($history->amount, 2, '.', ',') }}</td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="3" class="px-4 py-2">No transaction record yet</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $transactions->links('vendor.pagination.tailwind') }}
                </div>
            </div>
        </div>
    </div>
@endsection
