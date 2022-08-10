@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/form-validation/css/formValidation.min.css') }}">
    <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush
{{-- sweet alert --}}
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

@section('content')
    {{-- trigger sweet if form success --}}
    @if (session('success'))
        {{-- success --}}
        <script>
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                type: 'success',
                icon: 'success',
                // position tengah atas
                position: 'top',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @endif
    <div class="row">
        {{-- button for create product --}}
        <div class="col-md-2">
            <button class="btn btn-sm bg-teal mb-3 text-white"data-bs-toggle="modal" data-bs-target="#formProduct">Create
                Product <i class="link-icon" data-feather="plus"></i></button>
            @include('pages.products.form.create')
        </div>
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="table-responsive">
                    <table id="productTable" class="table">
                        <thead>
                            <tr>
                                <th class="text-capitalize">no</th>
                                <td class="text-capitalize">name</td>
                                <td class="text-capitalize">Description</td>
                                <td class="text-capitalize">image</td>
                                <td class="text-capitalize">price</td>
                                <td class="text-capitalize">Category</td>
                                <td class="text-capitalize">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>
                                        <img src="{{ asset('images/products/' . $product->image) }}"
                                            alt="{{ $product->name }}">
                                    </td>
                                    <td>Rp {{ number_format($product->price, 2, ',', ',') }}</td>
                                    <td>{{ $product->category }}</td>
                                    <td>
                                        <button class="btn btn-sm  btn-facebook"data-bs-toggle="modal"
                                            data-bs-target="#formEdit{{ $product->id }}">Edit</button>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#formDelete{{ $product->id }}">Delete</button>
                                    </td>
                                </tr>
                                @include('pages.products.form.delete')
                                @include('pages.products.form.edit')
                            @endforeach
                        </tbody>
                        <tfoot>
                            {{-- <tr>
                                <td colspan="10">{{ $products->appends(Request::all())->links() }}</td>
                            </tr> --}}
                            <tr>
                                <td colspan="10">
                                    <div class="float-right">
                                        {{ $products->appends(Request::all())->links() }}
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.bundle.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
    <script src="{{ asset('assets/js/dropify.js') }}"></script>
    <script src="{{ asset('assets/js/form-validation.js') }}"></script>
    <script src="{{ asset('assets/js/inputmask.js') }}"></script>
@endpush
