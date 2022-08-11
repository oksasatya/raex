@extends('user.layout.master')


@section('content')
    <x-layout-user>
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <th class="text-capitalize">no</th>
                            <th class="text-capitalize">name</th>
                            <th class="text-capitalize">description</th>
                            <th class="text-capitalize">image</th>
                            <th class="text-capitalize">quantity</th>
                            <th class="text-capitalize">category</th>
                            <th class="text-capitalize">price</th>
                            <th class="text-capitalize">Action</th>
                        </thead>

                        <tbody>
                            @foreach ($charts as $chart)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $chart->product->name }}</td>
                                    <td>{{ $chart->product->description }}</td>
                                    <td>
                                        <img src="{{ asset('images/products/' . $chart->product->image) }}"
                                            alt="{{ $chart->product->name }}">
                                    </td>
                                    <td>
                                        <input type="number" value="{{ $chart->quantity }}" id="quantityInput"
                                            name="quantity">
                                    </td>
                                    <td>{{ $chart->product->category }}</td>
                                    <td id="price" name="price">Rp
                                        {{ number_format($chart->product->price, 2, ',', ',') }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#formDelete{{ $chart->id }}">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            {{-- grand Total --}}
                            <tr>
                                <td colspan="7">
                                    <div class="float-right">
                                        <h5>Grand Total</h5>
                                    </div>
                                </td>
                                <td>
                                    <div class="float-right">
                                        <h5>Rp {{ number_format($total, 2, ',', ',') }}</h5>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>

                    </table>
                    <div class="btn-group mt-2 mb-5 pb-5">
                        <button class="btn btn-sm btn-facebook"><a class="text-white"
                                href="{{ route('products.index') }}">continue
                                to shopping</a></button>

                        {{-- checkout get api raja ongkir --}}
                        <button class="btn btn-twitter ms-2"><a class="text-white"
                                href="{{ route('checkout.index') }}">checkout</a></button>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </x-layout-user>
@endsection
