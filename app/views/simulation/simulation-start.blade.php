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
            {{ Form::radio('simulation-type', '', false, ['id' => 'quant-simulation', 'onclick' => 'simulationType();']) }}
            <label for="quant-simulation">Simular por cantidad de eventos</label>
          </div>
          <div class="form-group">
            {{ Form::radio('simulation-type', '', false, ['id'=>'time-simulation', 'onclick' => 'simulationType();']) }}
            <label for="time-simulation">Simular por tiempo</label>
          </div>
          <div id="quant-simulation-selected" class="form-group no-display">
            <label for="cantidad">Ingresar el número de eventos a simular:</label>
            {{ Form::input('number', 'cantidad', '', array('id' => 'cantidad', 'class' => 'form-control', 'min' => '1', 'max' => '1000')) }}
          </div>
          <div id="time-simulation-selected" class="form-group no-display">
            <label for="tiempo">Ingresar tiempo a simular:</label>
            {{ Form::input('number', 'tiempo', '', array('id' => 'tiempo', 'class' => 'form-control', 'min' => '1', 'max' => '1000')) }}
          </div>

          <h3>Distribución para el Arribo:</h3>
          <div class="form-group">
            {{ Form::radio('distribution-type-A', '', false, ['id' => 'uniform-simulation-A', 'onclick' => 'distributionTypeA();']) }}
            <label for="uniform-simulation-A">Distribución uniforme</label>
          </div>
          <div class="form-group">
            {{ Form::radio('distribution-type-A', '', false, ['id'=>'exponential-simulation-A', 'onclick' => 'distributionTypeA();']) }}
            <label for="exponential-simulation-A">Distribución exponencial</label>
          </div>
          <div class="form-group">
            {{ Form::radio('distribution-type-A', '', false, ['id' => 'normal-simulation-A', 'onclick' => 'distributionTypeA();']) }}
            <label for="normal-simulation-A">Distribución normal</label>
          </div>
          <div class="form-group">
            {{ Form::radio('distribution-type-A', '', false, ['id'=>'discrete-simulation-A', 'onclick' => 'distributionTypeA();']) }}
            <label for="discrete-simulation-A">Distribución discreta</label>
          </div>

          <div id="uniform-distribution-A-selected" class="form-group no-display">
            <label for="uniform-dist-1-A">Ingresar el parametro 1:</label>
            {{ Form::input('number', 'uniform-dist-1-A', '', array('id' => 'uniform-dist-1-A', 'class' => 'form-control', 'min' => '1', 'max' => '1000')) }}
            <label for="uniform-dist-2-A">Ingresar el parametro 2:</label>
            {{ Form::input('number', 'uniform-dist-2-A', '', array('id' => 'uniform-dist-2-A' , 'class' => 'form-control', 'min' => '1', 'max' => '1000')) }}
          </div>
          <div id="exponential-distribution-A-selected" class="form-group no-display">
            <label for="exponential-dist-1-A">Ingresar el promedio:</label>
            {{ Form::input('number', 'exponential-dist-1-A', '', array('id' => 'exponential-dist-1-A', 'class' => 'form-control', 'min' => '1', 'max' => '1000')) }}
          </div>
          <div id="normal-distribution-A-selected" class="form-group no-display">
            <label for="normal-dist-1-A">Ingresar el promedio:</label>
            {{ Form::input('number', 'normal-dist-1-A', '', array('id' => 'normal-dist-1-A', 'class' => 'form-control', 'min' => '1', 'max' => '1000')) }}
            <label for="normal-dist-2-A">Ingresar el desviación estándar:</label>
            {{ Form::input('number', 'normal-dist-2-A', '', array('id' => 'normal-dist-2-A' , 'class' => 'form-control', 'min' => '1', 'max' => '1000')) }}
          </div>
          <div id="discrete-distribution-A-selected" class="form-group no-display">
            <label for="discrete-dist-1-A">Ingresar los valores discretos:</label>
            {{ Form::input('number', 'discrete-dist-1-A', '', array('id' => 'discrete-dist-1-A', 'class' => 'form-control', 'min' => '1', 'max' => '1000')) }}
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
