@extends('user.layout.master')

@push('plugin-styles')
    {{-- data table --}}
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}">
    {{-- mdi icon --}}
    <link href="{{ asset('assets/plugins/@mdi/css/materialdesignicons.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
    <x-layout-user>
        <div class="col-md-12 grid-margin stretch-card shadow-lg">
            <div class="card">
                <div class="table-responsive">
                    <table class="table" id="tableCart">
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
                            @forelse ($charts as $chart)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td id="product">{{ $chart->product->name }}</td>
                                    <td id="description">{{ $chart->product->description }}</td>
                                    <td id="image">
                                        <img src="{{ asset('images/products/' . $chart->product->image) }}"
                                            alt="{{ $chart->product->name }}">

                                    </td>
                                    <td id="quantity">
                                        <input type="number" value="{{ $chart->quantity }}" id="quantityInput">
                                    </td>
                                    <td id="category">{{ $chart->product->category }}</td>
                                    <td id="price" name="price">Rp
                                        {{ number_format($chart->product->price, 2, ',', ',') }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#formDelete{{ $chart->id }}">Delete</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">
                                        <div class="text-center">
                                            <h3>No Data</h3>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
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
                                    <div class="float-right d-flex">
                                        <p class="mt-1 me-2">Rp</p>
                                        <input id="priceTotal" value=" {{ number_format($total) }}" name="total_price"
                                            disabled>
                                    </div>
                                </td>
                                {{-- checkout --}}
                                <td>
                                    <div class="float-right">
                                        <button class="btn btn-sm btn-facebook" id="checkout">Checkout</button>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    @include('user.product.cart.cart')
                    <div class="btn-group mt-2 mb-5 pb-5">
                        <button class="btn btn-sm btn-facebook"><a class="text-white"
                                href="{{ route('products.index') }}">continue
                                to shopping</a></button>
                        <button class="btn btn-sm btn-success ms-2" id="cekOngkir">Cek Ongkir</button>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="shipping_price" name="shipping_price">
        <input type="hidden" id="no_order" name="no_order">
    </x-layout-user>
@endsection
@push('plugin-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
@endpush
@push('custom-scripts')
    {{-- data table --}}
    <script>
        //    data table
        $(document).ready(function() {
            var generate_no_order = Math.floor(Math.random() * 100000000000000) + 1;
            $('#no_order').val(generate_no_order);
            $('#checkout').click(function() {
                var total_price = $('#priceTotal').val().replace(/\,/g, '');
                var user_id = {{ Auth::user()->id }};
                var city_origin = $('#city_origin').find("option:selected").text();
                var province_origin = $('#province').find("option:selected").text();
                var city_destination = $('#city_destination').find("option:selected").text();
                var province_destination = $('#province_destination').find("option:selected").text();
                var shipping_price = $('#shipping_price').val();
                var no_order = $('#no_order').val();
                var weight = $('#weight').val();
                var courier = $('#courier').val();
                var data = {
                    _token: '{{ csrf_token() }}',
                    total_price: total_price,
                    shipping_price: shipping_price,
                    user_id: user_id,
                    city_origin: city_origin,
                    province_origin: province_origin,
                    city_destination: city_destination,
                    province_destination: province_destination,
                    weight: weight,
                    courier: courier,
                    no_order: no_order
                };
                $.ajax({
                    url: '{{ route('order.store') }}',
                    type: 'POST',
                    data: data,
                    success: function(data) {
                        window.location.href = "{{ route('order.index') }} ";
                        // sweetalert success
                        swal({
                            title: "Success!",
                            text: "Your order has been placed!",
                            icon: "success",
                            button: "OK",
                        });
                        // console.log(data);
                    }
                });
                $.ajax({
                    url: '{{ route('cart.destroyAll') }}',
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        window.location.href =
                            "{{ route('order.index') }} ";
                    }
                });
            });


            // get province
            $.ajax({
                url: "{{ route('provinces') }}",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $.each(data.data, function(i, data) {
                        $('#province').append(
                            $('<option>', {
                                value: data.id,
                                text: data.provinces
                            })
                        );
                    });
                }
            });
            $('#province').change(function() {
                $('#city_origin').empty();
                $.ajax({
                    url: "{{ route('cities') }}",
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $.each(data.data, function(i, data) {
                            if (data.province_id == $('#province').val()) {
                                $('#city_origin').append(
                                    $('<option>', {
                                        value: data.id,
                                        text: data.city
                                    })
                                );
                            }
                        });
                    }
                });
            });

            // destination
            $.ajax({
                url: "{{ route('provinces') }}",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $.each(data.data, function(i, data) {
                        $('#province_destination').append(
                            $('<option>', {
                                value: data.id,
                                text: data.provinces
                            })
                        );
                    });
                }
            });
            $('#province_destination').change(function() {
                $('#city_destination').empty();
                $('#city_destination').append(
                    $('<option>', {
                        value: "",
                    })
                );

                $.ajax({
                    url: "{{ route('cities') }}",
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $.each(data.data, function(i, data) {
                            if (data.province_id == $('#province_destination').val()) {
                                $('#city_destination').append(
                                    $('<option>', {
                                        value: data.id,
                                        text: data.city
                                    })
                                );
                            }
                        });
                    }
                });
            });

            // price
            $('#cekOngkir').click(function(e) {
                e.preventDefault();
                $('#cekOngkir').html('<i class="fa fa-spinner fa-spin"></i>');
                $('#cekOngkir').addClass('disabled');
                setTimeout(function() {
                    $('#cekOngkir').html('Cek Ongkir');
                    $('#cekOngkir').removeClass('disabled');
                }, 2000);
                let origin = $('#city_origin').val();
                let destination = $('#city_destination').val();
                let weight = $('#weight').val();
                let courier = $('#courier').val();
                let total_harga = $('#priceTotal').val().replace(/,/g, '');
                // jika value kosoong
                if (origin == '' || destination == '' || weight == '' || courier == '') {
                    $('#cekOngkir').html('Cek Ongkir');
                    alert('Mohon isi semua form');
                } else {
                    isprocessing = true;
                    $.ajax({
                        url: "{{ route('checkout.ongkir') }}",
                        type: "POST",
                        dataType: "json",
                        data: {
                            _token: "{{ csrf_token() }}",
                            origin: origin,
                            destination: destination,
                            weight: weight,
                            service: 'REG',
                            courier: courier
                        },
                        success: function(data) {
                            isProcessing = false;
                            let harga_ongkir = data['rajaongkir']['results']['0']['costs']['0'][
                                'cost'
                            ][
                                '0'
                            ]['value'];
                            $("#shipping_price").val(harga_ongkir);
                            let harga_total = parseInt(total_harga) + parseInt(harga_ongkir);
                            total_harga = harga_total;
                            let rupiah = harga_total.toString().replace(/\B(?=(\d{3})+(?!\d))/g,
                                ",");
                            $('#priceTotal').val(rupiah);
                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                }
            });

        });
    </script>
@endpush
{{-- // $('.deleteCart').click(function() {
// var id = $(this).data('id');
// var data = {
// _token: '{{ csrf_token() }}',
// id: id
// };
// $.ajax({
// url: '{{ route('cart.destroy') }}',
// type: 'DELETE',
// data: data,
// success: function(data) {
// window.location.href = "{{ route('cart.index') }}";
// }
// });
// }); --}}
