@extends('theme.base')
@section('content')
<div class="container py-5 text-center">
    <!-- Validacion si no se edita se crea cliente-->
    @if(isset($client))
    <h1> Editar Cliente </h1>
    @else
    <h1> Crear Cliente </h1>
    @endif


    @if(isset($client))

    <form action="{{ route('client.update', $client) }}" method="post">
        <!-- No lleva parametros por el metodo post// HTML 5 no reconoce put desde aqui peo agregamos el metodo  -->
        @method('PUT')



        @else

        <form action="{{ route('client.store') }}" method="post">
            <!-- No lleva parametros por el metodo post -->
            @endif





            @csrf
            <div class="mb-3">
                <label for="name" class="from-lable"> Nombre</label>
                <input type="text" name="name" class="form-control" placeholder="Nombre del Cliente" value="{{ old('name') }}">
                <p class="form-text">Escriba el nombre del cliente</p>
                @error('name')
                <p class="form-text text-deanger">{{$message}}</p> <!-- si hay un error en el parametro laravel indica un error-->
                @enderror
            </div>
            <div class="mb-3">
                <label for="due" class="from-lable"> Saldo</label>
                <input type="number" name="due" class="form-control" placeholder="Saldo del Cliente" step="0.01" value="{{ old('due') }}"> <!-- steep permite el numero de decimales que quiera-->
                <p class="form-text">Saldo del cliente</p>
                @error('due')
                <p class="form-text text-deanger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="comments" class="from-lable"> Comentarios</label>
                <textarea name="comments" cols="30" rows="4" class="form-control">value="{{ old('comments') }}"</textarea>
                <p class="form-text">Escriba algnos comentarios</p>
                @error('comments')
                <p class="form-text text-deanger">{{$message}}</p>
                @enderror
            </div>


            @if(isset($client))
            <button type="submit" class="btn btn-info">Editar Cliente</button>
            @else
            <button type="submit" class="btn btn-info">Guardar Cliente</button>
            @endif

        </form>
</div>
@endsections