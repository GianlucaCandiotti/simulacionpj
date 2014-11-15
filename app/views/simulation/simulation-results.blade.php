@extends('layouts.base')
@section('extra_css')
  {{ HTML::style('css/simulation/simulation-results-style.css') }}
  {{ HTML::style('css/simulation/modals/results-modal-style.css') }}
@stop
@section('extra_scripts')
@stop
@section('content')
  <section id="result-sect">
    <div class="row">
      <div class="col-xs-12">
        <h1>Resultados</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <h3>Todos los eventos simulados</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th><span class="glyphicon glyphicon-file"></span> Requerimiento del Evento</th>
              <th><span class="glyphicon glyphicon-time"></span> Tiempo Arribo</th>
              <th><span class="glyphicon glyphicon-time"></span> Tiempo Salida Servidor 1</th>
              <th><span class="glyphicon glyphicon-time"></span> Tiempo Salida Servidor 2</th>
              <th>Tipo de evento</th>
            </tr>
          </thead>
          <tbody>
            @foreach($eventos as $evento)
              <tr>
                <td>{{$evento->id}}</td>
                <td>{{$evento->requerimiento_id}}</td>
                @if($evento->tipo_evento_id == 1)
                  <td>{{$evento->time_A}} <span class="glyphicon glyphicon-ok-circle"></span></td>
                @else
                  <td>{{$evento->time_A}}</td>
                @endif
                @if($evento->time_S1 == 9999)
                  <td>Infinito</td>
                @else
                  @if($evento->tipo_evento_id == 2)
                    <td>{{$evento->time_S1}} <span class="glyphicon glyphicon-ok-circle"></span></td>
                  @else
                    <td>{{$evento->time_S1}}</td>
                  @endif
                @endif
                @if($evento->time_S2 == 9999)
                  <td>Infinito</td>
                @else
                  @if($evento->tipo_evento_id == 3)
                    <td>{{$evento->time_S2}} <span class="glyphicon glyphicon-ok-circle"></span></td>
                  @else
                    <td>{{$evento->time_S2}}</td>
                  @endif
                @endif
                <td>{{TipoEvento::find($evento->tipo_evento_id)->nombre}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-md-offset-2 col-md-4">
        <button class="button btn btn-primary btn-lg" data-toggle="modal" data-target="#results-modal">
          Mostrar estadísticos
        </button>
      </div>
      <div class="col-md-4">
        <a href="{{route('showSimulation')}}">
          <button class="button btn btn-primary btn-lg">
            Nueva simulación
          </button>
        </a>
      </div>
    </div>
  </section>
  @include('simulation.modals.results-modal')
@stop
