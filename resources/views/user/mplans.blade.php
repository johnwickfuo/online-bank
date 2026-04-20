@extends('layouts.dash2')
@section('title', $title)
@section('content')

<!-- Make sure jQuery is loaded -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!-- CSRF Token for AJAX Requests -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Toast Notifications Container -->
<div id="toast-container" class="fixed top-4 right-4 z-[9999] flex flex-col gap-3"></div>

<!-- Exchange Header with Gradient -->
<div class="relative bg-gradient-to-r from-primary/5 to-primary/20 dark:from-primary/10 dark:to-primary/30 rounded-xl p-6 mb-6 overflow-hidden">
    <div class="absolute top-0 right-0 w-64 h-64 bg-primary/10 rounded-full filter blur-3xl -mr-32 -mt-32"></div>
    <div class="absolute bottom-0 left-0 w-64 h-64 bg-primary/10 rounded-full filter blur-3xl -ml-32 -mb-32"></div>

    <div class="relative flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div class="flex items-center">
            <div class="w-12 h-12 rounded-xl bg-primary/20 dark:bg-primary/30 backdrop-blur-sm flex items-center justify-center mr-4 shadow-lg">
                <svg class="w-6 h-6 text-primary" viewBox="0 0 24 24" fill="none">
                    <path d="M17.7513 7.04996C18.9963 8.29496 19.7613 10.025 19.7613 12C19.7613 16.42 16.1813 20 11.7613 20C7.34125 20 3.76125 16.42 3.76125 12C3.76125 7.58 7.34125 4 11.7613 4C13.7363 4 15.5013 4.75 16.7413 6.00" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M20.24 2.48001L19.76 6.23001L16.01 5.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9.25 11.5L10.75 13L14.25 9.5" fill="currentColor" fill-opacity="0.2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-gray-600 ">Save and Invest</h1>
                <p class="text-gray-600  text-sm">Grow your wealth with our curated Save and Invest plans</p>
            </div>
        </div>
        

        <div class="flex items-center space-x-1">
            <a onclick="toggleModal('depositModal')" class="px-2 py-2.5 text-sm font-medium rounded-lg bg-white dark:bg-dark-100 text-primary border border-light-200 dark:border-dark-200/50 hover:bg-light-100 dark:hover:bg-dark-200 transition-colors flex items-center">
               <svg class="w-4 h-4 mr-2 text-green-500" viewBox="0 0 24 24" fill="none">
  <path d="M12 2V14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
  <path d="M8 10L12 14L16 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
  <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"/>
</svg>

                Deposit 
            </a>
            


            <a onclick="toggleModal('withdrawModal')" class="px-2 py-2.5 text-sm font-medium rounded-lg bg-white dark:bg-dark-100 text-primary border border-light-200 dark:border-dark-200/50 hover:bg-light-100 dark:hover:bg-dark-200 transition-colors flex items-center">
                <svg class="w-4 h-4 mr-2 text-red-500" viewBox="0 0 24 24" fill="none">
  <path d="M12 22V10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
  <path d="M16 14L12 10L8 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
  <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"/>
</svg>

                Withdraw
                
            </a>



            <a href="{{ route('myshares') }}" class="px-2 py-2.5 text-sm font-medium rounded-lg bg-white dark:bg-dark-100 text-primary border border-light-200 dark:border-dark-200/50 hover:bg-light-100 dark:hover:bg-dark-200 transition-colors flex items-center">
               <svg class="w-4 h-4 mr-2 text-green-500" viewBox="0 0 24 24" fill="none">
  <path d="M12 2V14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
  <path d="M8 10L12 14L16 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
  <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"/>
</svg>

             Portfolios
            </a>
        </div>


    </div>
</div>

<!-- Alert Messages -->
<x-danger-alert />
<x-success-alert />

<!-- Exchange Info Card -->
{{-- <div class="bg-white dark:bg-dark-50 rounded-xl shadow-sm border border-light-200 dark:border-dark-200/50 p-4 mb-6">
    <div class="flex items-center mb-2">
        <div class="w-10 h-10 rounded-full bg-blue-50 dark:bg-blue-900/20 flex items-center justify-center mr-3">
            <svg class="w-5 h-5 text-blue-500" viewBox="0 0 24 24" fill="none">
                <path d="M12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22Z" fill="currentColor" fill-opacity="0.2"/>
                <path d="M12 16V12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12 8H12.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <div>
            <h3 class="text-sm font-medium text-gray-600 ">Important Information</h3>
            <p class="text-gray-600 text-xs">Earn even more when you swap your Account balance to and from crypto.</p>
        </div>
    </div>
</div> --}}

<!-- Crypto Balances Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 mb-6">
    <!-- Account Balance - Highlighted Card -->
    <div class="bg-gradient-to-br from-primary/5 to-primary/20 dark:from-primary/10 dark:to-primary/30 rounded-xl shadow-sm border border-light-200 dark:border-dark-200/50 p-5 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-20 h-20 bg-primary/10 rounded-full filter blur-xl -mr-10 -mt-10"></div>
        <div class="flex items-center justify-between relative">
            <div>
                <p class="text-xs uppercase font-medium text-dark-900 ">Account Balance</p>
                <p class="text-xl font-bold c  mt-1">{{ $settings->currency }}{{ number_format(Auth::user()->invest_account, 3, '.', ',') }}</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-white dark:bg-dark-100 shadow-md flex items-center justify-center">
                <svg class="w-6 h-6 text-primary" viewBox="0 0 24 24" fill="none">
                    <path d="M18.04 13.55C17.62 13.96 17.38 14.55 17.44 15.18C17.53 16.26 18.52 17.05 19.6 17.05H21.5V18.24C21.5 20.31 19.81 22 17.74 22H6.26C4.19 22 2.5 20.31 2.5 18.24V11.51C2.5 9.44 4.19 7.75 6.26 7.75H17.74C19.81 7.75 21.5 9.44 21.5 11.51V12.95H19.48C18.92 12.95 18.41 13.17 18.04 13.55Z" fill="currentColor" fill-opacity="0.2"/>
                    <path d="M7 12H14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Cryptocurrency Cards -->

    <div class="bg-white dark:bg-dark-50 rounded-xl shadow-sm border border-light-200 dark:border-dark-200/50 p-5 transition-transform hover:translate-y-[-3px]">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs uppercase font-medium text-gray-600 ">Roi</p>
                <p class="text-xl font-bold text-dark-900 mt-1">{{ $settings->currency }}{{ number_format(Auth::user()->roi, 3, '.', ',') }}</p>
                <p class="text-xs text-gray-600  mt-1 usdelement" id="btc"></p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-amber-50 dark:bg-amber-900/30 border border-amber-200 dark:border-amber-700/30 flex items-center justify-center">
               <svg class="w-6 h-6 text-primary" viewBox="0 0 24 24" fill="none">
                    <path d="M18.04 13.55C17.62 13.96 17.38 14.55 17.44 15.18C17.53 16.26 18.52 17.05 19.6 17.05H21.5V18.24C21.5 20.31 19.81 22 17.74 22H6.26C4.19 22 2.5 20.31 2.5 18.24V11.51C2.5 9.44 4.19 7.75 6.26 7.75H17.74C19.81 7.75 21.5 9.44 21.5 11.51V12.95H19.48C18.92 12.95 18.41 13.17 18.04 13.55Z" fill="currentColor" fill-opacity="0.2"/>
                    <path d="M7 12H14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </div>
    </div>













</div>



 <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($plans as $plan)
    <form action="{{ route('joinplan') }}" method="POST">
        @csrf
        <!-- Apple Plan -->
        <div class="bg-white rounded-xl p-5 shadow-sm pr-20 py-4 border-2 border-primary-100 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 space-y-4" x-data="{ amount: '' }">
          <div class="flex items-center justify-between">
            <h3 class="text-lg font-bold text-gray-800">{{$plan->name}}</h3>
            <i data-lucide="shopping-bag" class="w-6 h-6 text-green-600"></i>
          </div>

          <ul class="text-sm text-gray-600 space-y-1">
            <li><strong>Minimum Investment:</strong> {{$settings->currency}}{{$plan->min_price}}</li>
            <li><strong>Maximum Investment:</strong> {{$settings->currency}}{{$plan->max_price}}</li>
            <li><strong>Expected Return:</strong> {{$plan->increment_amount}}% for {{$plan->increment_interval}}</li>
            <li><strong>Duration:</strong> {{$plan->expiration}}</li>
          </ul>

          <div class="space-y-2">
            <label class="text-sm font-medium text-gray-700">Enter Amount</label>
            <input type="number"
                   name="iamount"
                   min="{{$plan->min_price}}"
                   max="{{$plan->max_price}}"
                   x-model="amount"
                   placeholder="{{$settings->currency}}{{$plan->min_price}} -{{$settings->currency}}{{$plan->max_price}}"
                  class="block w-full pl-12  pr-20 py-4 border-2 border-primary-100 rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all text-2xl font-bold" required>

            <input type="hidden" name="id" value="{{$plan->id}}">

            <button type="submit"
                    class="w-full mt-3 sm:mt-0 inline-flex justify-center items-center px-4 py-3 border border-gray-300 rounded-lg shadow-sm text-base font-medium text-gray-700 bg-green hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors">
              <i data-lucide="dollar-sign" class="w-5 h-5"></i> Invest and Save Now
            </button>
          </div>
        </div>
    </form>
    @endforeach



  </div>










<!-- Modal Background -->
<div id="depositModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden justify-center items-center z-50">
    <!-- Modal Box -->
    <div class="bg-white p-6 rounded-lg shadow-xl w-full max-w-md">
        <div class="flex justify-between items-center mb-4">

            <div class="text-gray-700">
                <h2 class="text-lg font-semibold">Fund Your Account</h2>
                <p class="text-sm">Add funds to your account to start investing.</p>
            </div>



            <button onclick="toggleModal('depositModal')" class="text-gray-500 hover:text-red-600 text-2xl leading-none">&times;</button>
        </div>

        <form method="POST" action="{{ route('fundcard') }}">
            @csrf
            <div class="mb-4">
                <label for="amount" class="block text-sm font-medium text-gray-700 mb-2">Amount</label>
                <input type="number" name="amount" id="amount" required
                        class="block w-full pl-12 pr-20 py-4 border-2 border-primary-100 rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all text-2xl font-bold"
                                placeholder="0.00"
                                required>
            </div>

            <div class="mb-4">
                <label for="from" class="block text-sm font-medium text-gray-700 mb-2">From</label>
                <select name="from" id="from" required
                        class="block w-full pl-12 pr-20 py-4 border-2 border-primary-100 rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all text-2xl font-bold"
                            >
                    <option value="account_bal">Account Balance</option>
                    <!-- Add more options if needed -->
                </select>
            </div>

            <div class="flex justify-end space-x-2">
                <button type="button" onclick="toggleModal('depositModal')" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                <button type="submit"  class="w-full mt-3 sm:mt-0 inline-flex justify-center items-center px-4 py-3 border border-gray-300 rounded-lg shadow-sm text-base font-medium text-gray-700 bg-green hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">Fund</button>
            </div>
        </form>
    </div>
</div>




<div id="withdrawModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden justify-center items-center z-50">
    <!-- Modal Box -->
    <div class="bg-white p-6 rounded-lg shadow-xl w-full max-w-md">
        <div class="flex justify-between items-center mb-4">

            <div class="text-gray-700">
                <h2 class="text-lg font-semibold">Withdraw to your bank balance</h2>
                {{-- <p class="text-sm">Add funds to your account to start investing.</p> --}}
            </div>



            <button onclick="toggleModal('withdrawModal')" class="text-gray-500 hover:text-red-600 text-2xl leading-none">&times;</button>
        </div>

        <form method="POST" action="{{ route('withdrawcard') }}">
            @csrf
            <div class="mb-4">
                <label for="amount" class="block text-sm font-medium text-gray-700 mb-2">Amount</label>
                <input type="number" name="amount" id="amount" required
                        class="block w-full pl-12 pr-20 py-4 border-2 border-primary-100 rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all text-2xl font-bold"
                                placeholder="0.00"
                                required>
            </div>

            <div class="mb-4">
                <label for="from" class="block text-sm font-medium text-gray-700 mb-2">To</label>
                <select name="from" id="from" required
                        class="block w-full pl-12 pr-20 py-4 border-2 border-primary-100 rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all text-2xl font-bold"
                            >
                    <option value="account_bal">Bank Balance</option>
                    <!-- Add more options if needed -->
                </select>
            </div>

            <div class="flex justify-end space-x-2">
                <button type="button" onclick="toggleModal('withdrawModal')" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                <button type="submit"  class="w-full mt-3 sm:mt-0 inline-flex justify-center items-center px-4 py-3 border border-gray-300 rounded-lg shadow-sm text-base font-medium text-gray-700 bg-green hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">Withdraw</button>
            </div>
        </form>
    </div>
</div>


<script>
    function toggleModal(id) {
        const modal = document.getElementById(id);
        modal.classList.toggle('hidden');
        modal.classList.toggle('flex');
    }
</script>







@endsection
