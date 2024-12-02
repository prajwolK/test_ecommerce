@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Shopping Cart</h1>
    @if(session('cart') && count(session('cart')) > 0)
    <table class="w-full border-collapse bg-white shadow-md rounded-lg">
        <thead>
            <tr>
                <th class="border px-4 py-2">Product</th>
                <th class="border px-4 py-2">Price</th>
                <th class="border px-4 py-2">Quantity</th>
                <th class="border px-4 py-2">Total</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach (session('cart') as $id => $details)
            <tr>
                <td class="border px-4 py-2">{{ $details['name'] }}</td>
                <td class="border px-4 py-2">${{ $details['price'] }}</td>
                <td class="border px-4 py-2">{{ $details['quantity'] }}</td>
                <td class="border px-4 py-2">${{ $details['price'] * $details['quantity'] }}</td>
                <td class="border px-4 py-2">
                    <!-- Remove Button -->
                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-6">
        <p class="text-xl font-bold">Total: ${{ array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], session('cart'))) }}</p>
    </div>
    @else
    <p class="text-gray-600">Your cart is empty.</p>
    @endif
</div>
@endsection
