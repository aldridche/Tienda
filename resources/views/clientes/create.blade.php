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
    @include('partials.messages')
    <div class="page-header">
        <h3>Nuevo cliente </h3>
    </div>
    <div class="margen">
        <div class="panel-heading">
           Registro nuevo
        </div>


        {!!Form::open(['route'=>'clientes.store','method'=>'POST'])!!}


        <div class="form-group">
            {!!form::label('Nombre')!!}
            {!!form::text('nombre',null,['id'=>'nombre','class'=>'form-control','placeholder'=>'Digite el nombre'])!!}
        </div>

        <div class="form-group">
             {!!form::label('Apellidos')!!}
             {!!form::text('apellido',null,['id'=>'apellido','class'=>'form-control','placeholder'=>'Apellidos'])!!}
        </div>
        <div class="form-group">
            {!!form::label('Edad')!!}
            {!!form::text('edad',null,['id'=>'edad','class'=>'form-control','placeholder'=>'Digite la Edad'])!!}
        </div>

        <div class="form-group">
             {!!form::label('RFC')!!}
             {!!form::text('RFC',null,['id'=>'RFC','class'=>'form-control','placeholder'=>'Digite el RFC'])!!}
        </div>

        <div class="form-group">
                {!!form::label('Direccion')!!}
                {!!form::text('domicilio',null,['id'=>'domicilio','class'=>'form-control','placeholder'=>'Direccion'])!!}
        </div>
            {!!form::submit('Grabar',['name'=>'grabar','id'=>'grabar','content'=>'<span>Grabar</span>','class'=>'btn btn-warning btn-sm m-t-10'])!!}
            <button type="button" id='cancelar'  name='cancelar' class="btn btn-info btn-sm m-t-10" >Cancelar</button>
            {!!Form::close()!!}
        </div>
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

