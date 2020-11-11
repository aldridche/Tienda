@extends('layouts.master')
@section('title','Lista de clientes')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <div class="page-header">
        <h3>Clientes <small>registrados</small></h3>
    </div>
    <style>
        .margen{
            background-color: rgb(148, 176, 228);
            padding: 5px;
            border: rgb(0, 0, 0) 5px sol;
        }
        table{
            background-color: rgb(255, 255, 255);
            padding: 5px;
            border: rgb(0, 0, 0) 5px sol;
        }
    </style>
</head>
<body>
    @include('partials.messages')
    <div class="margen">
        <div class="panel-heading">
           Lista de clientes
           <p class="navbar-text navbar-right" style=" margin-top: 1px;">
              <button type="button"  id="nuevo" name="nuevo" class="btn btn-warning navbar-btn" style="margin-bottom: 1px; margin-top: -5px;margin-left: 999%;padding: 3px 20px;">Nuevo</button>
           </p>
        </div>
        <table width="20%" align="center" class="table table-bordered"-->
            <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>RFC</th>
                <th>Direccion</th>
                <th>Opciones</th>
            </thead>
            <tbody>
                @foreach($clientess as $cliente)
                    <tr>
                        <td>{{$cliente->id}}</td>
                        <td>{{$cliente->nombre}}</td>
                        <td>{{$cliente->apellido}}</td>
                        <td>{{$cliente->edad}}</td>
                        <td>{{$cliente->RFC}}</td>
                        <td>{{$cliente->domicilio}}</td>
                        <td>
                            <a href="{{route('clientes.edit', $cliente->id)}}">[Editar]</a>
                            <a href="{{route('clientes.show', $cliente->id)}}">[Eliminar]</a>
                        </td>
                    </tr>

                @endforeach
                </div class="panel-body">
            </tbody>
        </table>
        <div class="text-center">
            {!!$clientess->links()!!}
        </div>
    </div>
</body>
</html>

<script>
    $("#nuevo").click(function(event)
    {
        document.location.href = "{{route('clientes.create')}}";
    });

</script>

@endsection
