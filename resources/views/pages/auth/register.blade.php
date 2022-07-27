@extends('user.layout.master')
@push('plugin-styles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/form-validation/css/formValidation.min.css') }}">
    <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@section('content')
    @if (session('success'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                title: 'Success!',
                icon: 'success',
                text: '{{ session('success') }}',
            });
        </script>
    @endif
    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data" id="signupForm">
        @csrf
        <div class="page-content d-flex align-items-center justify-content-center my-5 pt-5">
            <div class="row w-100 mx-0 auth-page">
                <div class="col-md-8 col-xl-6 mx-auto">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-4 pe-md-0">
                                <div class="auth-side-wrapper"
                                    style="background-image: url({{ asset('assets/images/turtle/5.jpg') }})">

                                </div>
                            </div>
                            <div class="col-md-8 ps-md-0">
                                <div class="auth-form-wrapper px-4 py-5">
                                    <a href="{{ url('/') }}" class="noble-ui-logo d-block mb-2">Raex</a>
                                    <h5 class="text-muted fw-normal mb-4">Create a account.</h5>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Username</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" placeholder="Username">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email address</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" placeholder="Email" name="email" value="{{ old('email') }}"
                                            required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="password" name="password" placeholder="Password" required
                                            autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirmed_password" class="form-label">Password Confirmation</label>
                                        <input type="password"
                                            class="form-control @error('confirmed_password') is-invalid @enderror"
                                            id="confirmed_password" name="confirmed_password"
                                            placeholder="Password Confirmation" required autocomplete="new-password">
                                        @error('confirmed_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <button type="submit"
                                                class="rounded submit btn btn-primary me-2 mb-2 mb-md-0">{{ __('sign up') }}</button>
                                        </div>

                                    </div>
                                    <a href="{{ route('login') }}" class="d-block mt-3 text-muted">Already a user?
                                        Sign
                                        in</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
@endsection
@push('plugin-scripts')
    {{-- form-validation --}}
    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
@endpush

@push('custom-scripts')
    {{-- form-validation js --}}
    <script src="{{ asset('assets/js/form-validation.js') }}"></script>
@endpush
