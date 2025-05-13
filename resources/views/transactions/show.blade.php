@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Order Details</h1>
        <a href="{{ route('transactions.index') }}" class="text-sm font-medium text-primary hover:text-secondary">
            &larr; Back to Orders
        </a>
    </div>
    
    <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-8">
        <div class="px-4 py-5 sm:px-6 border-b">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Order Information</h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">Details about your order and its current status.</p>
        </div>
        <div class="border-b border-gray-200 px-4 py-5 sm:px-6">
            <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Order Number</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $transaction->order_number }}</dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Date Placed</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $transaction->created_at->format('M d, Y, h:i A') }}</dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Payment Status</dt>
                    <dd class="mt-1 text-sm">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            {{ $transaction->payment_status === 'paid' ? 'bg-green-100 text-green-800' : 
                               ($transaction->payment_status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                            {{ ucfirst($transaction->payment_status) }}
                        </span>
                    </dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Shipping Status</dt>
                    <dd class="mt-1 text-sm">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            {{ $transaction->shipping_status === 'delivered' ? 'bg-green-100 text-green-800' : 
                               ($transaction->shipping_status === 'processing' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800') }}">
                            {{ ucfirst($transaction->shipping_status) }}
                        </span>
                    </dd>
                </div>
            </dl>
        </div>
        
        @if($transaction->payment_status === 'pending')
        <div class="bg-yellow-50 px-4 py-3 sm:px-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-yellow-700">
                        Your payment is pending. 
                        <a href="{{ route('checkout.payment', $transaction->id) }}" class="font-medium underline text-yellow-700 hover:text-yellow-600">
                            Complete your payment now
                        </a>
                    </p>
                </div>
            </div>
        </div>
        @endif
    </div>
    
    <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-8">
        <div class="px-4 py-5 sm:px-6 border-b">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Shipping Information</h3>
        </div>
        <div class="border-b border-gray-200 px-4 py-5 sm:px-6">
            <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Full Name</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $transaction->shipping_name }}</dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Phone Number</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $transaction->shipping_phone }}</dd>
                </div>
                <div class="sm:col-span-2">
                    <dt class="text-sm font-medium text-gray-500">Shipping Address</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $transaction->shipping_address }}</dd>
                </div>
                @if($transaction->notes)
                <div class="sm:col-span-2">
                    <dt class="text-sm font-medium text-gray-500">Notes</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $transaction->notes }}</dd>
                </div>
                @endif
            </dl>
        </div>
    </div>
    
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6 border-b">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Order Items</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Product
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Quantity
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Subtotal
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($transaction->items as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                @if($item->product && $item->product->image_url)
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-md object-cover" src="{{ $item->product->image_url }}" alt="{{ $item->product_name }}">
                                </div>
                                @endif
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $item->product_name }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right">
                            Rp {{ number_format($item->price, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right">
                            {{ $item->quantity }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-right font-medium">
                            Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="bg-gray-50">
                    <tr>
                        <th scope="row" colspan="3" class="px-6 py-3 text-right text-sm font-medium text-gray-900">
                            Total
                        </th>
                        <td class="px-6 py-3 whitespace-nowrap text-right text-sm font-bold text-primary">
                            Rp {{ number_format($transaction->total_amount, 0, ',', '.') }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection