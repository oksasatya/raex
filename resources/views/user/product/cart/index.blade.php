@extends('user.layout.master')

@push('plugin-styles')
    {{-- data table --}}
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}">
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
                                        <h5 id="price" name="price">Rp {{ number_format($total, 2, ',', ',') }}</h5>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card shadow-sm bg-primary">
                                <div class="card-body">
                                    <h3>ORIGIN</h3>
                                    <hr>
                                    <div class="form-group mb-3">
                                        <label class="fw-bolder text-white">PROVINSI ASAL</label>
                                        <select class="form-control" name="province_origin" id="province">
                                            <option value="0">-- pilih provinsi asal --</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="fw-bolder text-white">KOTA / KABUPATEN ASAL</label>
                                        <select class="form-control" name="city_origin" id="city_origin">
                                            <option value="">-- pilih kota asal --</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card shadow-sm bg-primary">
                                <div class="card-body">
                                    <h3>DESTINATION</h3>
                                    <hr>
                                    <div class="form-group mb-3">
                                        <label class="fw-bolder text-white">PROVINSI TUJUAN</label>
                                        <select class="form-control" name="province_destination" id="province_destination">
                                            <option value="0">-- pilih provinsi tujuan --</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="fw-bolder text-white">KOTA / KABUPATEN TUJUAN</label>
                                        <select class="form-control kota-tujuan" name="city_destination"
                                            id="city_destination">
                                            <option value="">-- pilih kota tujuan --</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card shadow-sm bg-primary">
                                <div class="card-body">
                                    <h3>KURIR</h3>
                                    <hr>
                                    <div class="form-group mb-3">
                                        <label class="fw-bold text-white">PROVINSI TUJUAN</label>
                                        <select class="form-control" name="courier" id="courier">
                                            <option value="0">-- pilih kurir --</option>
                                            <option value="jne">JNE</option>
                                            <option value="pos">POS</option>
                                            <option value="tiki">TIKI</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="fw-bolder text-white">BERAT (GRAM)</label>
                                        <input type="number" class="form-control" name="weight" id="weight"
                                            placeholder="Masukkan Berat (GRAM)">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn-group mt-2 mb-5 pb-5">
                        <button class="btn btn-sm btn-facebook"><a class="text-white"
                                href="{{ route('products.index') }}">continue
                                to shopping</a></button>

                        {{-- checkout get api raja ongkir --}}
                        <a class="btn btn-sm btn-success ms-2" id="cekOngkir">Cek Ongkir</a>
                    </div>
                </div>
            </div>
        </div>

        </div>
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
            $('#tableCart').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": false,
                "ordering": false,
                "info": false,
                "autoWidth": true,
                "responsive": true,
            });
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
            // cek ongkir
            $('#cekOngkir').click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('checkout.ongkir') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        _token: "{{ csrf_token() }}",
                        origin: $('#city_origin').val(),
                        destination: $('#city_destination').val(),
                        weight: $('#weight').val(),
                        courier: $('#courier').val(),
                    },
                    success: function(data) {
                        $('#price').empty();
                        console.log(data);
                        if (json.rajaongkir.status.code == 200) {
                            var result = json.rajaongkir.results[0].costs;
                            var ongkir = data[0].cost[0].value;
                            var estimasi = data[0].cost[0].etd;
                            // update #price
                            $('#price').val(ongkir);
                        } else {
                            $('#price').html('0');
                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
        });
    </script>
@endpush
