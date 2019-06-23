@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Preparar los Roles ! {{$mensaje}}

                    @can('read proyectos')
                        <h2>Acceso para evaluador de proyecto</h2>
                        <a href="{{route('proyecto_list')}}">Ver Proyectos</a>
                    @endcan
                    @can('read users')
                        <h2>Acceso para moderadores</h2>
                    @endcan
                    <h2>Acceso para full</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
