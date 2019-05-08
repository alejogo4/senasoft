@extends('layouts.master')


@section('content')

    <div class="sec">
        <h2>Numero 1</h2>
        {{$saludo = "Hola"}}
        @include('layouts.components.menu')
    </div>

    <div class="sec">
        <h2>Numero 2</h2>
    </div>

    <div class="sec">
        <h2>Numero 3</h2>
    </div>
    <div class="sec">
        <h2>Numero 4</h2>
    </div>

    <div class="sec">
        <h2>Numero 5</h2>
    </div>

@endsection

