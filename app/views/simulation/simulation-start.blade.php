@extends('layouts.base')
@section('extra_css')
  {{ HTML::style('css/simulation/simulation-start-style.css') }}
@stop
@section('extra_scripts')
  {{ HTML::script('js/simulation/simulation-start.js') }}
@stop
@section('content')
  <section id="start-sect">
    <div class="row">
      <div class="col-xs-12">
        <h1>Simulación de eventos</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        {{ Form::open(array('url' => '/simular-eventos','role'=>'form')) }}
          <div class="form-group">
            {{ Form::radio('simulation-type', '', false, ['class' => '', 'id' => 'quant-simulation', 'onclick' => 'simulationType();']) }}
            <label for="quant-simulation">Simular por cantidad de eventos</label>
          </div>
          <div class="form-group">
            {{ Form::radio('simulation-type', '', false, ['id'=>'tiempo', 'class' => '', 'id' => 'time-simulation', 'onclick' => 'simulationType();']) }}
            <label for="time-simulation">Simular por cantidad de eventos</label>
          </div>
          <div id="quant-simulation-selected" class="form-group no-display">
            <label for="cantidad">Ingresar el número de eventos a simular:</label>
            {{ Form::input('number', 'cantidad', '', array('id'=>'cantidad', 'class' => 'form-control', 'autofocus', 'min' => '1', 'max' => '10000')) }}
          </div>
          <div id="time-simulation-selected" class="form-group no-display">
            <label for="tiempo">Ingresar tiempo a simular:</label>
            {{ Form::input('number', 'tiempo', '', array('class' => 'form-control', 'autofocus', 'min' => '1', 'max' => '1000')) }}
          </div>
          <div class="form-group">
						{{Form::submit('Simular',array('class'=>'button btn btn-primary btn-lg btn-block')) }}
					</div>
        {{ Form::close() }}
        @if($errors->has())
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				@endif
      </div>
    </div>
  </section>
@stop
