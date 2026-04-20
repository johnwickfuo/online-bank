
@extends('layouts.dash2')
@section('title', $title)
@section('content')
<div class="mb-6 flex items-center justify-between">
    <h2 class="text-2xl font-semibold flex items-center gap-2">
      <i data-lucide="bar-chart-3" class="w-6 h-6 text-blue-600"></i>
       Investments
    </h2>



    <a class="bg-gradient-to-br from-primary-700 via-primary-700 to-primary-800 rounded-xl shadow-lg text-white relative overflow-hidden  px-4 py-2  flex items-center gap-2"  href="{{ route('mplans') }}">
        <i data-lucide="plus-circle" class="w-5 h-5"></i> Apply For Investment
    </a>

  </div>
  <x-danger-alert />
  <x-success-alert />
  <!-- Stats -->
  <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
    <div class="bg-white p-4 rounded-xl shadow-sm">
      <p class="text-gray-500">Active Investments</p>
      <p class="text-xl font-bold">{{number_format($activeshares)}}</p>
    </div>
    {{-- <div class="bg-white p-4 rounded-xl shadow-sm">
      <p class="text-gray-500">Pending Applications</p>
      <p class="text-xl font-bold">{{ number_format( $pendingshares)}}</p>
    </div> --}}
    <div class="bg-white p-4 rounded-xl shadow-sm">
      <p class="text-gray-500">Portfolio Value</p>
      <p class="text-xl font-bold">{{$settings->currency}}{{number_format($portfolio,2,'.')}}</p>
    </div>
</div>


  <!-- Promo Box -->
  <div class="bg-gradient-to-br from-primary-600 via-primary-700 to-primary-800 text-white p-6 rounded-xl mb-6">
    <div class="flex items-center gap-3 mb-4">
      <i data-lucide="briefcase" class="w-6 h-6 text-white"></i>
      <h3 class="text-xl font-bold">Invest in Save And Invest Easily</h3>
    </div>
    <p class="mb-4">Start building wealth by investing in profitable companies. Track and manage your portfolio in real time.</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
      <div>
        <p class="font-semibold">🔒 Trusted Plans</p>
        <p>Invest in tech, energy, and finance leaders.</p>
      </div>
      <div>
        <p class="font-semibold">📈 Real-Time Monitoring</p>
        <p>Get up-to-date prices and performance.</p>
      </div>
    </div>
  </div>

  <!-- Share Cards -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-10">
    @forelse($plans as $plan)
      <div class="bg-white p-4 rounded-xl shadow-sm
        @if($plan->active == 'pending') border-l-4 border-yellow-500
        @else border-l-4 border-green-500 @endif">
        <p class="
          @if($plan->active == 'pending') text-yellow-600
          @else text-green-600 @endif text-sm flex items-center gap-1">
          <i data-lucide="clock" class="w-4 h-4"></i>
          @if($plan->active == 'pending') Pending
          @else Active @endif
        </p>
        <h4 class="font-semibold text-lg">{{ $plan->planDetails->name }}</h4>
        <p class="text-sm text-gray-600">Amount: {{$settings->currency}}{{ number_format($plan->amount, 2) }}</p>

        <a href="{{ route('plandetails', $plan->id) }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
            <i class="fas fa-chevron-right fa-2x"></i>View details </a>


      </div>
    @empty
      <div class="mt-4 col-span-3">
        <div class="bg-white rounded-xl shadow-md p-6 text-center">
          <p class="text-gray-600 mb-4">
            You do not have Save and Invest at the moment or no value matches your query.
          </p>
          <a href="{{ route('mplan') }}"
             class="inline-block bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition">
            Buy a Share
          </a>
        </div>
      </div>
    @endforelse
  </div>

  @if ($plans->count() > 0)
    <div class="flex justify-center mt-8">
      <nav class="inline-flex shadow-sm rounded-md" aria-label="Pagination">
        {{ $plans->links('vendor.pagination.tailwind') }}
      </nav>
    </div>
  @endif


  <!-- How It Works -->
  <div class="mb-10">
    <h3 class="text-xl font-semibold mb-4 flex items-center gap-2">
      <i data-lucide="lightbulb" class="w-5 h-5 text-yellow-500"></i>
      How Save and Invest Works
    </h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="bg-white p-4 rounded-xl shadow-sm">
        <div class="flex items-center gap-2 mb-2 text-blue-600 text-lg">
          <i data-lucide="edit-3" class="w-5 h-5"></i> 1. Apply
        </div>
        <p>Select Save and Invest Plan and amount. Submit your investment request.</p>
      </div>
      <div class="bg-white p-4 rounded-xl shadow-sm">
        <div class="flex items-center gap-2 mb-2 text-blue-600 text-lg">
          <i data-lucide="shield-check" class="w-5 h-5"></i> 2. Approval
        </div>
        <p>After verification, plans are allocated to your account.</p>
      </div>
      <div class="bg-white p-4 rounded-xl shadow-sm">
        <div class="flex items-center gap-2 mb-2 text-blue-600 text-lg">
          <i data-lucide="activity" class="w-5 h-5"></i> 3. Monitor
        </div>
        <p>Track your portfolio in real-time, withdraw or reinvest profits.</p>
      </div>
    </div>
  </div>

  <!-- FAQ Section -->
  <div class="bg-white p-6 rounded-xl shadow-sm">
    <h3 class="text-xl font-semibold mb-4 flex items-center gap-2">
      <i data-lucide="help-circle" class="w-5 h-5 text-indigo-500"></i>
      Frequently Asked Questions
    </h3>

   <div class="space-y-4">
      <div x-data="{ open: false }">
        <button @click="open = !open" class="w-full flex justify-between items-center text-left font-semibold">
         <span>What is Save and Invest?</span>
      <i data-lucide="chevron-down" :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform"></i>
    </button>
    <div x-show="open" class="mt-2 text-sm text-gray-600">
      "Save and Invest" refers to two essential financial strategies offered by banks. Saving means setting aside money in secure accounts like savings accounts to preserve capital and earn interest. Investing involves putting money into financial products such as mutual funds or fixed deposits with the goal of earning higher returns over time. Together, these strategies help individuals grow their wealth while managing risk and future financial goals.
    </div>


      <div x-data="{ open: false }">
        <button @click="open = !open" class="w-full flex justify-between items-center text-left font-semibold">
          <span>Is it safe to invest online?</span>
          <i data-lucide="chevron-down" :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform"></i>
        </button>
        <div x-show="open" class="mt-2 text-sm text-gray-600">You can earn money from Save and Invest in two main ways:

            Dividends: Regular payouts from the company’s profits (if offered).

            Capital Gains: Selling your Save and Invest at a higher price than what you paid for them. Additionally, some investors reinvest their profits to accumulate more Save and Invest over time.</div>
      </div>

      <div x-data="{ open: false }">
        <button @click="open = !open" class="w-full flex justify-between items-center text-left font-semibold">
          <span>Can I sell Save and Invest anytime?</span>
          <i data-lucide="chevron-down" :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform"></i>
        </button>
        <div x-show="open" class="mt-2 text-sm text-gray-600">Save and Invest can offer high returns, but they come with risk. Share prices fluctuate based on market conditions, company performance, and global events. It’s important to diversify your investments and understand your risk tolerance. Long-term investors often experience more stable gains compared to short-term traders.</div>
      </div>
    </div>
  </div>

  @endsection
