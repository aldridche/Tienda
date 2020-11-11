@extends('layouts.master')
@section('title','Lista de productos')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <h3>Productos <small>disponibles</small></h3>
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
                <th>Disponibles</th>
                <th>Precio c/p</th>
                <th>IVA</th>
                <th>Precio Total</th>
                <th>Opciones</th>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                    <tr>
                        <td>{{$producto->id}}</td>
                        <td>{{$producto->producto}}</td>
                        <td>{{$producto->disponibles}}</td>
                        <td>{{$producto->precioUnitario}}</td>
                        <td>{{$producto->iva}}</td>
                        <td>{{$producto->precioTotal}}</td>
                        <td>
                            <a href="{{route('producto.edit', $producto->id)}}">[Editar]</a>
                            <a href="{{route('producto.show', $producto->id)}}">[Eliminar]</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center">
            {!!$productos->links()!!}
        </div>
    </div>
</body>
</html>

<script>
    $("#nuevo").click(function(event)
    {
        document.location.href = "{{route('producto.create')}}";
    });

</script>

@endsection
