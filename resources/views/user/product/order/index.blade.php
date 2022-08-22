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
                            <th class="text-capitalize">No order</th>
                            <th class="text-capitalize">Pengiriman Asal</th>
                            <th class="text-capitalize">Pengiriman Tiba</th>
                            <th class="text-capitalize">Harga Pengiriman</th>
                            <th class="text-capitalize">Harga Total</th>
                            <th class="text-capitalize">Status Pengiriman</th>
                            <th class="text-capitalize">Status Pembayaran</th>
                        </thead>

                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td id="no_order">{{ $order->no_order }}</td>
                                    <td id="origin">{{ $order->city_origin }}</td>
                                    <td id="destination">{{ $order->city_destination }}</td>
                                    <td id="shipping_price">Rp.{{ number_format($order->shipping_price, 2) }}</td>
                                    <td id="total_price">Rp.{{ number_format($order->total_price, 2) }}</td>
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
                                    @if ($order->payment_status == 1)
                                        <td>
                                            <span class="badge badge-pill bg-danger">Belum Dibayar</span>
                                        </td>
                                    @else
                                        <td>
                                            <span class="badge badge-pill bg-success">Sudah Dibayar</span>
                                        </td>
                                    @endif
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
                    </table>
                </div>
            </div>
        </div>
    </x-layout-user>
@endsection
