@extends('layouts.front')
@section('body')
    <div id="wrapper">
        @include('front.navigation.header', ['active' => 'process'])
        @include('front.navigation.footer')
    </div>
@endsection
@section('extra-js')
@endsection
