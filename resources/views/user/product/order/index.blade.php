@extends('user.layout.master')

@push('plugin-styles')
    {{-- data table --}}
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}">
    {{-- mdi icon --}}
    <link href="{{ asset('assets/plugins/@mdi/css/materialdesignicons.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@section('content')
    @if (session('success'))
        <script>
            Swal.fire({
                position: 'top',
                showConfirmButton: true,
                title: 'Success!',
                icon: 'success',
                text: '{{ session('success') }}',
            });
        </script>
    @endif
    <x-layout-user>
        <h2>Transaction User</h2>
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
                        <tfoot>
                            <td colspan="10">
                                <div class="float-right">
                                    {{ $orders->appends(Request::all())->links() }}
                                </div>
                            </td>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center">Konfirmasi Bukti Pembayaran</h3>
                    <p>Silahkan kirim bukti pembayaran anda disini</p>
                    @forelse ($orders as $order)
                        @if ($order->payment_status == 1)
                            <p>Total Tagihan Anda <strong> Rp. {{ number_format($total, 2) }}</strong> Silahkan
                                kirim Pembayaran Anda ke Bank BCA A/N : BAYU HARTHADINATA <strong>No
                                    Rek:1239834642431</strong>
                            </p>
                        @else
                            <p>Anda Belum Memiliki Pembayaran, Silahkan Belanja </p>
                        @endif
                    @empty
                        <p>Tidak Ada Pembayaran</p>
                    @endforelse
                    <div class="mt-5 mb-3 text-center">
                        <h2>Silahkan Kirim Bukti Pembayaran Anda Disini</h2>
                        <span class="fs-1"><i class="mdi mdi-arrow-down"></i></span>
                    </div>
                    <form action="{{ route('images.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @foreach ($orders as $order)
                            <input type="hidden" value="{{ $order->id }}" name="order_id">
                        @endforeach
                        <input type="file" id="ProofOfPayment" name="image"
                            class="@error('image') is-invalid @enderror" value="{{ old('image') }}" required
                            autocomplete="image" autofocus />
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <button class="btn btn-primary btn-sm mt-3" id="SumbitForm">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </x-layout-user>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/dropify.js') }}"></script>
@endpush
