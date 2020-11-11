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
    @include('partials.messages')
    <div class="page-header">
        <h3>Nueva venta </h3>
    </div>
    <div class="margen">
        <div class="panel-heading">
           Registro nuevo
        </div>

            {!!Form::open(['route'=>'ventas.store','method'=>'POST'])!!}


            <div class="form-group">
                {!!form::label('Producto')!!}
                {!! form::select('productos_id',$productos,['id'=>'productos_id','class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Precio</label>
                {!!form::label('Fecha')!!}
                {!!form::text('fecha',null,['id'=>'fecha','class'=>'form-control','placeholder'=>'Digite la fecha'])!!}
            </div>
            <div class="form-group">
                {!!form::label('RFC')!!}
                {!!Form::select('clientess_id',$clientes,['id'=>'clientess_id','class'=>'form-control']) !!}

            </div>
                {!!form::submit('Grabar',['name'=>'grabar','id'=>'grabar','content'=>'<span>Grabar</span>','class'=>'btn btn-warning btn-sm m-t-10'])!!}
                <button type="button" id='cancelar'  name='cancelar' class="btn btn-info btn-sm m-t-10" >Cancelar</button>
                {!!Form::close()!!}
        </div>


    </body>
</html>

<script>
    $("#cancelar").click(function(event)
    {
        document.location.href = "{{ route('ventas.index')}}";
    });
  </script>

@endsection

