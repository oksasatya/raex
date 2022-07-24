@extends('user.layout.master')
@push('plugin-styles')
    <link href="{{ asset('assets/plugins/@mdi/css/materialdesignicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/owl-carousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/owl-carousel/assets/owl.theme.default.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/animate-css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/prismjs/prism.css') }}" rel="stylesheet" />
@endpush
@section('content')
    <section class="header" style="background-image: url('assets/images/raex/turtle.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Welcome To Raex</h1>
                        <span class="subheading">the biggest place to buy turtles in Indonesia</span>
                        <a href="https://wa.me/0818846228"><button class="btn btn-md bg-success mt-3"><i
                                    class="mdi mdi-whatsapp">Contact
                                    ME</i></button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container position-relative px-4 px-lg-5">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {{-- owl-carousel --}}
                        @include('user.partials.owl-carousel')
                        {{-- end owl-carousel --}}
                    </div>
                </div>
            </div>
        </div>

        {{-- article story  of turtle --}}
        <div class="row">
            <h1 class="fw-italic text-center mb-3">Sejarah Kura-Kura</h1>
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body shadow-lg">
                        {{-- story turtle from wikipedia --}}
                        <h4 class="card-title text-center fw-bolder">Kura-Kura</h4>
                        @include('user.partials.turtle-story')
                        {{-- end story turtle from wikipedia --}}
                    </div>
                </div>
            </div>
        </div>
        {{-- end article story  of turtle --}}

    </div>
@endsection
@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('assets/plugins/prismjs/prism.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/carousel.js') }}"></script>
@endpush
