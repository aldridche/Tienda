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
    @include('partials.messages')
    <div class="page-header">
        <h3>Editar producto </h3>
    </div>
    <div class="margen">
        <div class="panel-heading">
           Modificacion
        </div>
            {!!Form::model($producto, ['route'=>['producto.update',$producto->id],'method'=>'PUT'])!!}


            <div class="form-group">
                <label for="exampleInputPassword1">Producto</label>
                {!!form::label('Producto')!!}
                {!!form::text('producto',null,['id'=>'producto','class'=>'form-control','placeholder'=>'Digite el Producto'])!!}
           </div>

           <div class="form-group">

                {!!form::label('Disponibles')!!}
                {!!form::text('disponibles',null,['id'=>'disponibles','class'=>'form-control','placeholder'=>'Disponibles'])!!}
           </div>
           <div class="form-group">
            <label for="exampleInputPassword1">Precio unitario</label>
               {!!form::label('Precio')!!}
               {!!form::text('precioUnitario',null,['id'=>'precioUnitario','class'=>'form-control','placeholder'=>'Digite el Precio'])!!}
          </div>

          <div class="form-group">
               {!!form::label('IVA')!!}
               {!!form::text('iva',null,['id'=>'iva','class'=>'form-control','placeholder'=>'Digite el Iva'])!!}
          </div>

          <div class="form-group">
               {!!form::label('Precio total')!!}
               {!!form::text('precioTotal',null,['id'=>'precioTotal','class'=>'form-control','placeholder'=>'Precio final'])!!}
          </div>
                {!!form::submit('Grabar',['name'=>'grabar','id'=>'grabar','content'=>'<span>Grabar</span>','class'=>'btn btn-warning btn-sm m-t-10'])!!}
                <button type="button" id='cancelar'  name='cancelar' class="btn btn-info btn-sm m-t-10" >Cancelar</button>
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

