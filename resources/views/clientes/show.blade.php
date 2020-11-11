@extends('layouts.master')
@section('title','Nuevo cliente')
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
        <h3>Editar cliente </h3>
    </div>
    <div class="margen">
        <div class="panel-heading">
           Modificacion
        </div>

        {!!Form::open(['route'=>['clientes.destroy',$clientes->id],'method'=>'DELETE'])!!}

        <div class="form-group">
            <label for="exampleInputPassword1">¿DESEA ELIMINAR ESTE REGISTRO?</label>
        </div>
        <!-- 'id', 'nombre','apellido', 'edad', 'RFC', 'domicilio' -->
        <div class="form-group">
            {!!form::label('Nombre')!!}
            {!!$clientes->nombre!!}
        </div>
        <div class="form-group">
            {!!form::label('Apellidos')!!}
            {!!$clientes->apellido!!}
        </div>
        <div class="form-group">
            {!!form::label('Edad')!!}
            {!!$clientes->edad!!}
        </div>
        <div class="form-group">
            {!!form::label('RFC')!!}
            {!!$clientes->RFC!!}
        </div>
        <div class="form-group">
            {!!form::label('Domicilio')!!}
            {!!$clientes->domicilio!!}
        </div>


        {!!form::submit('Eliminar',['name'=>'grabar','id'=>'grabar','content'=>'<span>Eliminar</span>','class'=>'btn btn-danger btn-sm m-t-10'])!!}
            <button type="button" id= 'cancelar' name='cancelar' class="btn btn-default btn-sm m-t-10" >Cancelar</button>
        {!!Form::close()!!}

    </div>

    <script>
        $("#cancelar").click(function(event)
        {
            document.location.href = "{{ route('clientes.index')}}";
        });
    </script>
    </body>
</html>
@endsection

