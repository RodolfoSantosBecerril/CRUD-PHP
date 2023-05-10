@extends('theme.base')
@section('content')
 <div class="container py-5 text-center">
     <h1> Bienvenido al registro cliente. </h1>
     <a href="{{ route('client.index') }}" class="btn btn-primary"> Cliente </a>
 </div>
@endsection