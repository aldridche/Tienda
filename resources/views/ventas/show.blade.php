@extends('layouts.master')
@section('title','Nueva venta')
@section('content')

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

    <div class="page-header">
        <h3>Editar venta </h3>
    </div>
    <div class="margen">
        <div class="panel-heading">
           Editar
        </div>

        {!!Form::open(['route'=>['ventas.destroy',$ventas->id],'method'=>'DELETE'])!!}

        <div class="form-group">
            <label for="exampleInputPassword1">¿DESEA ELIMINAR ESTE REGISTRO?</label>
        </div>

        <div class="form-group">
            {!!form::label('Fecha')!!}
            {!!$ventas->fecha!!}
        </div>

        {!!form::submit('Eliminar',['name'=>'grabar','id'=>'grabar','content'=>'<span>Eliminar</span>','class'=>'btn btn-danger btn-sm m-t-10'])!!}

            <button type="button" id= 'cancelar' name='cancelar' class="btn btn-default btn-sm m-t-10" >Cancelar</button>

        {!!Form::close()!!}

    </div>
<script>
    $("#cancelar").click(function(event)
    {
        document.location.href = "{{ route('ventas.index')}}";
    });
  </script>

@endsection

