@extends('user.layout.master')

@section('content')
    {{-- hit login form action --}}
    <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="page-content d-flex align-items-center justify-content-center mt-5 pt-5">
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
                                    <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>
                                    <form class="forms-sample">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email address</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                autocomplete="current-password" placeholder="Password">
                                        </div>
                                        <div>
                                            <div class="form-group">
                                                <button type="submit"
                                                    class="btn form-control btn-secondary rounded submit px-3">{{ __('login') }}</button>
                                            </div>
                                        </div>
                                        <a href="{{ url('/auth/register') }}" class="d-block mt-3 text-muted">Not a user?
                                            Sign
                                            up</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
@endsection
