@extends('user.layout.master')
@push('plugin-styles')
    <link href="{{ asset('assets/plugins/@mdi/css/materialdesignicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/owl-carousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/owl-carousel/assets/owl.theme.default.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/animate-css/animate.min.css') }}" rel="stylesheet" />
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
    <div class="container">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="owl-carousel owl-theme owl-auto-play">
                            <div class="item">
                                <img src="{{ url('assets/images/turtle/1.jpg') }}" alt="item-image">
                            </div>
                            <div class="item">
                                <img src="{{ url('assets/images/turtle/2.jpg') }}" alt="item-image">
                            </div>
                            <div class="item">
                                <img src="{{ url('assets/images/turtle/3.jpg') }}" alt="item-image">
                            </div>
                            <div class="item">
                                <img src="{{ url('assets/images/turtle/4.jpg') }}" alt="item-image">
                            </div>
                            <div class="item">
                                <img src="{{ url('assets/images/turtle/5.jpg') }}" alt="item-image">
                            </div>
                            <div class="item">
                                <img src="{{ url('assets/images/turtle/6.jpg') }}" alt="item-image">
                            </div>
                            <div class="item">
                                <img src="{{ url('assets/images/turtle/7.jpg') }}" alt="item-image">
                            </div>
                            <div class="item">
                                <img src="{{ url('assets/images/turtle/8.jpg') }}" alt="item-image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/carousel.js') }}"></script>
@endpush
