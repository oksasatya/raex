@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow-1">
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">New Customers</h6>
                            </div>
                            <h2 class="mt-3"> {{ $roles }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-0">New Orders</h6>
                        </div>
                        <h2 class="mt-3"> {{ $orderCount }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                        <h6 class="card-title mb-0">Pesanan</h6>

                    </div>
                    <div class="row align-items-start mb-2">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table" id="tableOrder">
                                    <thead class="bg-teal">
                                        <tr>
                                            <td>No</td>
                                            <td>No Order</td>
                                            <td>Nama Pemesan</td>
                                            <td>Dikirim Dari</td>
                                            <td>Dikirim Ke</td>
                                            <td>Berat</td>
                                            <td>Courier</td>
                                            <td>Total Harga</td>
                                            <td>Status Pembayaran</td>
                                            <td>Status Pengiriman</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            @foreach ($user->orders as $order)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $order->no_order }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $order->city_origin }}</td>
                                                    <td>{{ $order->city_destination }}</td>
                                                    <td>{{ number_format($order->weight) }} Gram</td>
                                                    <td>{{ $order->courier }}</td>
                                                    <td>Rp. {{ number_format($order->total_price, 2) }}</td>
                                                    @if ($order->payment_status == 1)
                                                        <td>
                                                            <span class="badge badge-pill bg-danger">Belum Dibayar</span>
                                                        </td>
                                                    @else
                                                        <td>
                                                            <span class="badge badge-pill bg-success">Sudah Dibayar</span>
                                                        </td>
                                                    @endif
                                                    @if ($order->status == 1)
                                                        <td>
                                                            <span class="badge badge-pill bg-warning">Siap Dikirim</span>
                                                        </td>
                                                    @elseif ($order->status == 2)
                                                        <td>
                                                            <span class="badge badge-pill bg-primary">Dikirim</span>
                                                        </td>
                                                    @else
                                                        <td>
                                                            <span class="badge badge-pill bg-success">Selesai</span>
                                                        </td>
                                                    @endif

                                                    <td>
                                                        <button class="btn btn-facebook" data-bs-toggle="modal"
                                                            data-bs-target="#formUpdate{{ $order->id }}">Update
                                                            Pengiriman</button>
                                                    </td>
                                                </tr>
                                                @include('user.modal.update')
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> <!-- row -->
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker.js') }}"></script>
@endpush
