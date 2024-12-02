@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Product Categories</h1>
    <ul class="list-disc pl-6">
        @foreach($categories as $category)
        <li class="mb-2">
            <a href="{{ route('products.index', $category->id) }}" class="text-blue-500 hover:underline">{{ $category->name }}</a>
        </li>
        @endforeach
    </ul>
</div>
@endsection
