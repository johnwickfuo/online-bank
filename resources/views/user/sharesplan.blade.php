
@extends('layouts.dash2')
@section('title', $title)
@section('content')


  <!-- Header -->
  <div class="mb-8 flex items-center justify-between">
    <h2 class="text-2xl font-bold flex items-center gap-2 text-gray-800">
      <i data-lucide="line-chart" class="w-6 h-6 text-indigo-600"></i>
      Share Investment Plans
    </h2>
  </div>
  <x-danger-alert />
  <x-success-alert />
  <!-- Plans Grid -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($plans as $plan)
    <form action="{{ route('joinplan') }}" method="POST">
        @csrf
        <!-- Apple Plan -->
        <div class="bg-white rounded-xl p-5 shadow-sm border-l-4 border-indigo-600 space-y-4" x-data="{ amount: '' }">
          <div class="flex items-center justify-between">
            <h3 class="text-lg font-bold text-gray-800">{{$plan->name}}</h3>
            <i data-lucide="shopping-bag" class="w-6 h-6 text-indigo-600"></i>
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
                   class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>

            <input type="hidden" name="id" value="{{$plan->id}}">

            <button type="submit"
                    class="mt-2 bg-indigo-600 text-white px-4 py-2 rounded-md w-full hover:bg-indigo-700 flex justify-center gap-2 items-center">
              <i data-lucide="dollar-sign" class="w-5 h-5"></i> Buy Now
            </button>
          </div>
        </div>
    </form>
    @endforeach



  </div>


  @endsection
