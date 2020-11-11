@extends('layouts.master')
@section('title','Lista de ventas')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <div class="page-header">
        <h3>Registro <small>ventas</small></h3>
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
           Lista
           <p class="navbar-text navbar-right" style=" margin-top: 1px;">
              <button type="button" id="nuevo" name="nuevo" class="btn btn-warning navbar-btn" style="margin-bottom: 1px; margin-top: -5px;margin-left: 1100%;padding: 3px 20px;">Nuevo</button>
           </p>
        </div>
        <table width="20%" align="center" class="table table-bordered"-->
            <thead>
                <th>ID</th>
                <th>Producto</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Opciones</th>
            </thead>
            <tbody>
                @foreach($ventass as $venta)
                    <tr>
                        <td>{{$venta->id}}</td>
                        <td>{{$venta->producto}}</td>
                        <td>{{$venta->fecha}}</td>
                        <td>{{$venta->clientes}}</td>
                        <td>
                            <a href="{{route('ventas.edit', $venta->id)}}">[Editar]</a>
                            <a href="{{route('ventas.show', $venta->id)}}">[Eliminar]</a>
                        </td>
                    </tr>
                @endforeach
                </div class="panel-body">
            </tbody>
        </table>
        <div class="text-center">
            {!!$ventass->links()!!}
        </div>
    </div>
</body>
</html>

<script>
    $("#nuevo").click(function(event)
    {
        document.location.href = "{{route('ventas.create')}}";
    });

</script>
@endsection
