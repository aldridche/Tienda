<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Developers::@yield('title')::</title>
    <!-- Bootstrap -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/navbar-fixed-top.css')!!}
    {!!Html::script('js/bootstrap.min.js')!!}


    <!--MENSAJE DE ALERT-->
    {!!Html::style('js/jquery-alertable-master/jquery.alertable.css')!!}
    {!!Html::script('js/jquery-alertable-master/jquery.alertable.js')!!}

  </head>
  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">

            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                <li><a class="btn btn-primary" href="{{url('dashboard')}}" role="button">Inicio</a></li>
                <li><a class="btn btn-primary" href="{{url('ventas')}}" role="button">Ventas</a></li>
                <li><a class="btn btn-primary" href="{{url('producto')}}" role="button">Productos</a></li>
                <li><a class="btn btn-primary" href="{{url('clientes')}}" role="button">Clientes</a></li>
                <div class="btn-group" role="group">
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">

                            <li><a href="{{url('dashboard')}}">Inicio</a></li>
                            <li><a href="{{url('ventas')}}">Ventas</a></li>
                            <li><a href="{{url('producto')}}">Productos</a></li>
                            <li><a href="{{url('clientes')}}">Clientes</a></li>
                    </div>
                </div>
            </div-->
        </div>
    </nav>

      <div class="container">
        @yield('content')

      </div> <!-- /container -->

    </body>
</html>
