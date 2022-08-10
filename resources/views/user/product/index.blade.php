@extends('user.layout.master')
@section('content')
    <div class="container mt-5 pt-5 gy-5">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach ($products as $product)
                {{-- create pagination link --}}
                <div class="col-md-4 col-xl-4 col-sm-3">
                    <div class="card">
                        <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}"
                            class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text">Rp {{ number_format($product->price, 2) }}</p>
                            <a href="{{ route('') }}" class="btn btn-primary">
                                Detail</a>
                            {{-- <a href="{{ route('user.product.show', $product->id) }}" class="btn btn-primary">
                                Detail</a> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $products->links() }}
    </div>
@endsection
