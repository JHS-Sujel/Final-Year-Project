@extends('layouts.frontend')

@section('title', 'Shop')

@section('vendor-style')
    <!-- Vendor css files -->
    {{-- <link rel="stylesheet" href="{{ asset('vendors/css/extensions/swiper.min.css') }}"> --}}
@endsection
@section('page-style')
    <!-- Page css files -->
    {{-- <link rel="stylesheet" href="{{ asset(mix('css/pages/app-ecommerce-details.css')) }}"> --}}
@endsection
@section('content')

    <contact-us></contact-us>

@endsection

@section('vendor-script')
    <!-- Vendor js files -->
    {{-- <script src="{{ asset('vendors/js/extensions/swiper.min.js') }}"></script> --}}
@endsection
@section('page-script')
    <!-- Page js files -->
    {{-- <script src="{{ asset(mix('js/scripts/pages/app-ecommerce-details.js')) }}"></script> --}}
@endsection
