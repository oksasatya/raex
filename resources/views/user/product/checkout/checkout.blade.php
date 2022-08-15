@extends('user.layout.master')

@section('content')
    <x-layout-user>
        <div class="col-md-8 col-xl-8 col-sm-3 mb-4">
            <div class="card shadow-lg">
                {{-- buat from untuk alamat unser dan ambil data province dan ciry --}}
                <form action="{{ route('checkout.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Shipping Address</h4>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                value="{{ Auth::user()->name }}" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" class="form-control" name="address" id="address"
                                value="{{ Auth::user()->address }}" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <label for="">Province</label>
                            <select name="province" id="province_id" class="form-control">
                                <option value="">Select Province</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <select name="city" id="city_id" class="form-control"></select>
                        </div>
                        <div class="form-group">
                            <label for="postal_code">Postal Code</label>
                            <select name="postal_code" id="postal_code" class="form-control"></select>
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" class="form-control" name="
                                    phone"
                                id="phone" value="{{ Auth::user()->phone }}" placeholder="Phone">

                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email" id="email"
                                value="{{ Auth::user()->email }}" placeholder="Email">
                        </div>

                        {{-- cek ongkir button --}}
                        <button type="button" class="btn btn-primary" id="cekOngkir">
                            Check Shipping Cost
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </x-layout-user>
@endsection

@push('custom-scripts')
    <script>
        $(document).ready(function() {
            $.ajax({
                url: "{{ route('provinces') }}",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $.each(data.data, function(i, data) {
                        $('#province_id').append(
                            $('<option>', {
                                value: data.id,
                                text: data.provinces
                            })
                        );
                    });
                }
            });
            $('#province_id').change(function() {
                $('#city_id').empty();
                $('#city_id').append(
                    $('<option>', {
                        value: "",
                        text: "Select City"
                    })
                );

                $.ajax({
                    url: "{{ route('cities') }}",
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $.each(data.data, function(i, data) {
                            if (data.province_id == $('#province_id').val()) {
                                $('#city_id').append(
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
            $('#city_id').change(function() {
                $('#postal_code').empty();
                $('#postal_code').append(
                    $('<option>', {
                        value: "",
                        text: "Select Postal Code"
                    })
                );
                $.ajax({
                    url: "{{ route('cities') }}",
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $.each(data.data, function(i, data) {
                            if (data.id == $('#city_id').val()) {
                                $('#postal_code').append(
                                    $('<option>', {
                                        value: data.postal_code,
                                        text: data.postal_code
                                    })
                                );
                            }
                        });
                    }
                });
            });

            // cek ongkir
            $('#cekOngkir').click(function() {
                $.ajax({
                    url: "{{ route('checkout.ongkir') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        _token: "{{ csrf_token() }}",
                        province_id: $('#province_id').val(),
                        city_id: $('#city_id').val(),
                        postal_code: $('#postal_code').val(),
                        weight: $('#weight').val(),
                        courier: $('#courier').val()
                    },
                    success: function(data) {
                        $('#ongkir').empty();
                        $('#ongkir').append(
                            $('<option>', {
                                value: "",
                                text: "Select Shipping Cost"
                            })
                        );
                        $.each(data.data, function(i, data) {
                            $('#ongkir').append(
                                $('<option>', {
                                    value: data.cost[0].value,
                                    text: data.cost[0].value
                                })
                            );
                        });
                    }
                });
            });
        });
    </script>
@endpush
