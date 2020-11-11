@extends('layouts.master')
@section('title','Editar producto')
@section('content')


<!DOCTYPE html>
<html lang="en">
<head>
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
    <div class="page-header">
        <h3>Editar producto </h3>
    </div>
    <div class="margen">
        <div class="panel-heading">
           Modificacion
        </div>


            {!!Form::open(['route'=>['producto.destroy',$producto->id],'method'=>'DELETE'])!!}

            <div class="form-group">
                <label for="exampleInputPassword1">¿DESEA ELIMINAR ESTE REGISTRO?</label>
            </div>
            <!--'id', 'producto', 'disponibles','precioUnitario', 'iva', 'precioTotal'-->
            <div class="form-group">
                {!!form::label('Producto')!!}
                {!!$producto->producto!!}
            </div>
            <div class="form-group">
                {!!form::label('Disponibles')!!}
                {!!$producto->disponibles!!}
            </div>
            <div class="form-group">
                {!!form::label('Precio unitario')!!}
                {!!$producto->precioUnitario!!}
            </div>
            <div class="form-group">
                {!!form::label('iva')!!}
                {!!$producto->iva!!}
            </div>
            <div class="form-group">
                {!!form::label('Precio total')!!}
                {!!$producto->precioTotal!!}
            </div>


            {!!form::submit('Eliminar',['name'=>'grabar','id'=>'grabar','content'=>'<span>Eliminar</span>','class'=>'btn btn-danger btn-sm m-t-10'])!!}
                <button type="button" id= 'cancelar' name='cancelar' class="btn btn-default btn-sm m-t-10" >Cancelar</button>
            {!!Form::close()!!}

        </div>


    <script>
        $("#cancelar").click(function(event)
        {
            document.location.href = "{{ route('producto.index')}}";
        });
    </script>
    </body>
</html>

@endsection

