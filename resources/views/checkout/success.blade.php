@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6 text-center">
        <div class="mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        </div>
        
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Thank You!</h1>
        <p class="text-xl text-gray-600 mb-6">Your order has been placed successfully.</p>
        
        <div class="mb-8 max-w-md mx-auto">
            <div class="bg-gray-50 p-4 rounded">
                <h2 class="text-lg font-medium text-gray-700 mb-2">Order Details</h2>
                <div class="flex justify-between mb-1">
                    <span class="text-gray-600">Order Number:</span>
                    <span class="font-medium">{{ $transaction->order_number }}</span>
                </div>
                <div class="flex justify-between mb-1">
                    <span class="text-gray-600">Total Amount:</span>
                    <span class="font-medium">Rp {{ number_format($transaction->total_amount, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between mb-1">
                    <span class="text-gray-600">Payment Status:</span>
                    <span class="font-medium 
                        {{ $transaction->payment_status === 'paid' ? 'text-green-600' : 
                           ($transaction->payment_status === 'pending' ? 'text-yellow-600' : 'text-red-600') }}">
                        {{ ucfirst($transaction->payment_status) }}
                    </span>
                </div>
            </div>
        </div>
        
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            @if($transaction->payment_status === 'pending')
                <a href="{{ route('checkout.payment', $transaction->id) }}" class="inline-flex justify-center items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                    Complete Payment
                </a>
            @endif
            
            <a href="{{ route('transactions.show', $transaction->id) }}" class="inline-flex justify-center items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                View Order Details
            </a>
            
            <a href="{{ route('menu') }}" class="inline-flex justify-center items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                Continue Shopping
            </a>
        </div>
    </div>
</div>
@endsection