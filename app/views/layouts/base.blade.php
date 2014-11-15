<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simulación de Eventos</title>

    <!-- Bootstrap -->
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/layouts/base-style.css') }}

    @section('extra_css')
    @show

  </head>
  <body>
    <div class="container">
      @yield('content')
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    {{ HTML::script('js/jquery-1.11.1.min.js') }}
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    {{ HTML::script('js/bootstrap.min.js') }}

    @section('extra_scripts')
    @show
  </body>
</html>
