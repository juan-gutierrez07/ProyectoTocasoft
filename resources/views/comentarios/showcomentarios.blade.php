@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/comentarios.css') }}">
@endsection
@section('content')
    @foreach ($comentarios as $comentario)
        <div class="container-comments my-3">
            <div class="comments">
                 <div class="photo-perfil">
                     {{-- <img src="image/perfil.png" alt=""> --}}
                 </div>
                 <div class="info-comments">
                     <div class="header">
                         <h4>{{ $comentario->user->name }}</h4>
                         <h5>25 noviembre 2017</h5>
                     </div>
                     <p>{{ $comentario->content }}</p>
                     <div class="footer">
                         {{ $comentario->points }}
                     </div>
                 </div>
             </div>
         </div>
    @endforeach
@endsection