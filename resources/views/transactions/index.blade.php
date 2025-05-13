@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">My Orders</h1>
    
    @if ($transactions->isEmpty())
        <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
            <h2 class="mt-4 text-lg font-medium text-gray-700">No Orders Yet</h2>
            <p class="mt-2 text-gray-500">You haven't placed any orders yet.</p>
            <div class="mt-6">
                <a href="{{ route('menu') }}" class="inline-flex justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-primary hover:bg-secondary">
                    Browse Menu
                </a>
            </div>
        </div>
    @else
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <ul class="divide-y divide-gray-200">
                @foreach ($transactions as $transaction)
                    <li>
                        <a href="{{ route('transactions.show', $transaction->id) }}" class="block hover:bg-gray-50">
                            <div class="px-4 py-4 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4">
                                        <p class="text-sm font-medium text-primary truncate">
                                            {{ $transaction->order_number }}
                                        </p>
                                        <div class="flex items-center">
                                            <p class="text-xs text-gray-500">
                                                {{ $transaction->created_at->format('M d, Y, h:i A') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $transaction->payment_status === 'paid' ? 'bg-green-100 text-green-800' : 
                                               ($transaction->payment_status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                            {{ ucfirst($transaction->payment_status) }}
                                        </span>
                                    </div>
                                </div>
                                <div class="mt-2 sm:flex sm:justify-between">
                                    <div class="sm:flex">
                                        <p class="flex items-center text-sm text-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            {{ $transaction->shipping_name }}
                                        </p>
                                    </div>
                                    <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                        <p class="font-medium text-gray-900">Rp {{ number_format($transaction->total_amount, 0, ',', '.') }}</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
            
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                {{ $transactions->links() }}
            </div>
        </div>
    @endif
</div>
@endsection