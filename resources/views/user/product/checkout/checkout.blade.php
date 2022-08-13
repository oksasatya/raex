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
                            <select name="city_id" id="city_id" class="form-control">
                                <option value="">Choose City</option>
                                {{-- tampilkan citi berdasarkan province_id --}}
                            </select>
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

@push('custom-scripts')
    {{-- province/js
    <script src="{{ asset('js/province.js') }}"></script> --}}
    <script>
        // get city berdasarkan province_id
        $('#province_id').on('change', function() {
            var province_id = $(this).val();
            if (province_id) {
                $.ajax({
                    url: "{{ url('/get/city/') }}/" + province_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#city_id').empty();
                        $.each(data, function(key, value) {
                            $('#city_id').append('<option value="' + key + '">' + value +
                                '</option>');
                        });
                    }
                });
            } else {
                $('#city_id').empty();
            }
        });
    </script>
@endpush
