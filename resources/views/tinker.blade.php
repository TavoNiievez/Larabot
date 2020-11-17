@extends('Kuros.resources.views.layout')

@section('title', 'BotMan Studio')

@section('styles')
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet" type="text/css">
    <link href="{{ asset('/build/css/tinker.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container" id="app">
        <botman-tinker api-endpoint="/botman"></botman-tinker>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('/build/js/tinker.js') }}" defer></script>
@endsection
