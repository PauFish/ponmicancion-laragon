 <!-- Importamos los layauts y el content -->
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header d-flex  align-items-center">
                    <img src="images/logo.webp">
                    <h1>Las Mejores Canciones las eliges tu!!!</h1>
                </div>
                <div class="card-body">
                     <!-- seguridad y muestra el estado de la sesion -->
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                     <!-- Bracias a bootrap el <a> arece un boton  -->
                    <td><a href="/userParty" class="btn text-light btn-warning bg-dark" type="button">Volver a Fiestas</a></td>
                    <div class="songs_container">
                        <br>
                        <div class="card">
                            <div class="card-body">
                                <div class="songs_container">
                                    <h2 style="color: #800080">Vota tu canción preferida YA!</h2>
                                    <table id="songs_Table" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Canción</th>
                                                <th>Artista</th>
                                                <th>Votos</th>
                                                <th>vota</th>
                                            </tr>
                                        </thead>
                                          <!-- Necesario para el for each -->
                                        @php
                                        $songs=\App\Models\Song::all();
                                        @endphp
                                        <!--le pasamos la variable en la que se almaceno todas las Songs en SongController
                                        y cada vez que entre lo almacena en $song -->
                                        @foreach($songs as $song)
                                        <tr>
                                            <td>{{$song->title}}</td>
                                            <td>{{$song->artist}}</td>
                                            <td>{{$song->vote}}
                                            </td>
                                            <!-- Vota Canciones-->
                                            <td><a href="{{route('songs.show',$song->id)}}" type="button" class="btn text-light btn-warning bg-dark ">Vota</a></td>
                                        </tr>
                                        @endforeach
                                        <tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Termina todas las secciones inicializadas al principio -->
    @endsection