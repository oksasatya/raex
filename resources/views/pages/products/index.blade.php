@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush


@section('content')
    <div class="row">
        {{-- button for create product --}}
        <a href=""><button class="btn btn-sm bg-teal mb-3">Create Product</button></a>
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                {{-- if product == null --}}
                @if ($products == null)
                    <h4>No Data</h4>
                @endif
                <div class="table-responsive">
                    <table id="productTable" class="table">
                        <thead>
                            <tr>
                                <td>name</td>
                                <td>Description</td>
                                <td>image</td>
                                <td>price</td>
                                <td>Category</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Contoh1</td>
                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus saepe explicabo
                                    debitis.
                                </td>
                                <td>null</td>
                                <td>Rp 30.000</td>
                                <td>Makanan</td>
                                <td>
                                    <button class="btn btn-sm btn-success">Create</button>
                                    <button class="btn btn-sm btn-success">Create</button>
                                    <button class="btn btn-sm btn-success">Create</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush
