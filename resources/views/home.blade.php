 <!-- Importamos los layauts y el content -->
@extends('layouts.app')

@section('content')

<style>
    .card {
        /* Centra y escala el background */
        background: url(images/bgwelcome.jpeg);
        width: 100%;
        height: auto;
        background-repeat: no-repeat;
        background-size: cover;

    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header d-flex  align-items-center">
                    <img src="images/logo.webp">
                    <h1>Introduce una fiesta</h1>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <!-- Create Fiestas-->
                    <a href="{{ url('/parties/create') }}" class="btn  btn-success" title="Añadir fiesta">Añadir Fiestas</a>
                    <!-- Para moverse a canciones-->
                    <td><a href="/song" class="btn text-light btn-warning bg-dark" type="button">Ver Canciones</a></td>
                    <div class="parties_container">
                        <br>
                        <div class="card">
                            <div class="card-body">
                                <h2>Fiestas</h2>
                                <table id="parties_Table" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Fiesta</th>
                                            <th>Cartel</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <!--le pasamos la variable en la que se almaceno todas las parties en PartyController
                                        y cada vez que entre lo almacena en $party -->
                                    <tbody>
                                        @php
                                        $parties=\App\Models\Party::all();
                                        @endphp
                                        @foreach($parties as $party)
                                        <tr>
                                            <td>{{$party->id}}</td>
                                            <td>{{$party->name}}</td>
                                            <td>{{$party->photo}}</td>
                                            <!-- editar fiestas-->
                                            <td><a href="/parties/{{$party->id}}/edit" class="btn btn-info">Editar Fiesta</a></td>
                                            <!-- eliminar fiestas-->
                                            <td>
                                                <form action="{{route('parties.destroy',$party->id)}}" method='POST'>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Eliminar Fiesta</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <!-- Termina todas las secciones inicializadas al principio -->
    @endsection