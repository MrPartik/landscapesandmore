@extends('beautymail::templates.ark')

@section('content')

    @include('beautymail::templates.ark.heading', [
        'heading' => $title,
        'level' => 'h1'
    ])
    @include('beautymail::templates.ark.contentStart')

    <h4 class="secondary"><strong> {{'Hello ' . $name }}!,</strong></h4>
    <p style="margin-top: 10px; margin-bottom: 15px">{{ $body }}</p>


    @include('beautymail::templates.widgets.newfeatureStart')
    <img style="width: 50%; margin-bottom: 10px" src="{{ (env('APP_ENV') === 'local') ? 'https://landscapesandmore.com/wp-content/uploads/2021/07/logo-4.png' : url(env('LOGO_DARK_URL')) }}"/>
    <h4 class="secondary"><strong> Michaelangelo's Sustainable Landscape and Design Group</strong></h4>
    @include('beautymail::templates.widgets.newfeatureEnd')
    <i><p>If you did not expect to receive this email, you may discard this email</p></i>
    @include('beautymail::templates.ark.contentEnd')
@stop
