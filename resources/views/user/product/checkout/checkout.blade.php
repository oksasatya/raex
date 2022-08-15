@extends('user.layout.master')

@section('content')
    <x-layout-user>
        <div class="col-md-4 col-xl-4 col-sm-3">
            <div class="card">
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
                            <select name="province_id" id="province_id" class="form-control">
                                <option value="">Select Province</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">City</label>
                            <select name="city_id" id="city_id" class="form-control"></select>
                        </div>
                        <div class="form-group">
                            <label for="">Postal Code</label>
                            <input type="text" class="form-control" name="postal_code" id="postal_code"
                                value="{{ Auth::user()->postal_code }}" placeholder="Postal Code">
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
                    </div>
                </form>
            </div>
        </div>
    </x-layout-user>
@endsection
@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    {{-- jquery --}}

    {{-- select2 --}}
@endpush
@push('custom-scripts')
    {{-- tampilkan data province --}}
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
                        console.log(data.provinces);
                    });
                }
            });
            // tampilkan data city berdasarkan jika province di pilih maka data city yang muncul berdasarkan province yang dipilih
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
                    data: {
                        province_id: $(this).val()
                    },
                    success: function(data) {
                        $.each(data.data, function(i, data) {
                            $('#city_id').append(
                                $('<option>', {
                                    value: data.id,
                                    text: data.city
                                })
                            );
                        });
                    }
                });
            });
        });
    </script>
@endpush
