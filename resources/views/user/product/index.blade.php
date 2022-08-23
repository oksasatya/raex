@extends('user.layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/@mdi/css/materialdesignicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

@section('content')
    @if (session('success'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                title: 'Success!',
                icon: 'success',
                text: '{{ session('success') }}',
            });
        </script>
    @endif
    <x-layout-user>
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
                        @if (Auth::check())
                            <form action="{{ route('add-to-cart') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn btn-yellow"><i class="mdi mdi-cart"></i>
                                    Add to cart
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-facebook">
                                Buy
                            </a>
                        @endif
                    </div>
                </div>
                <tr>
                    <td colspan="10">
                        <div class="float-right">
                            {{ $products->appends(Request::all())->links() }}
                        </div>
                    </td>
                </tr>
            </div>
        @endforeach
    </x-layout-user>
@endsection
