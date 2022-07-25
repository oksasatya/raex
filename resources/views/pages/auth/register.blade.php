@extends('user.layout.master')


@section('content')
    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
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
                                        <label for="email" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="email" placeholder="Email"
                                            name="email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password"
                                            autocomplete="current-password" placeholder="Password" name="password">
                                    </div>
                                    {{-- <div class="mb-3">
                                        <label for="confirmed_password" class="form-label">Password Confirmation</label>
                                        <input type="password" class="form-control" id="confirmed_password"
                                            autocomplete="current-password" placeholder="Password Confirmation"
                                            name="confirmed_password">
                                    </div> --}}
                                    <div>
                                        <div class="form-group">
                                            <button type="submit"
                                                class="rounded submit btn btn-primary me-2 mb-2 mb-md-0">{{ __('sign up') }}</button>
                                        </div>

                                    </div>
                                    <a href="{{ url('/auth/login') }}" class="d-block mt-3 text-muted">Already a user?
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
