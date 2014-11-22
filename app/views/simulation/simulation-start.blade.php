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
            {{ Form::input('text', 'tiempo', '', array('id' => 'tiempo', 'class' => 'form-control')) }}
          </div>
      </div>
        <div class="row">
          <div class="col-xs-4">
            <h3>Distribución para el Arribo:</h3>
            <div class="form-group">
              {{ Form::radio('distribution-type-A', 'uniforme', false, ['id' => 'uniform-simulation-A', 'onclick' => 'distributionTypeA();']) }}
              <label for="uniform-simulation-A">Distribución uniforme</label>
            </div>
            <div class="form-group">
              {{ Form::radio('distribution-type-A', 'exponencial', false, ['id'=>'exponential-simulation-A', 'onclick' => 'distributionTypeA();']) }}
              <label for="exponential-simulation-A">Distribución exponencial</label>
            </div>
            <div class="form-group">
              {{ Form::radio('distribution-type-A', 'normal', false, ['id' => 'normal-simulation-A', 'onclick' => 'distributionTypeA();']) }}
              <label for="normal-simulation-A">Distribución normal</label>
            </div>
            <div class="form-group">
              {{ Form::radio('distribution-type-A', 'discreta', false, ['id'=>'discrete-simulation-A', 'onclick' => 'distributionTypeA();']) }}
              <label for="discrete-simulation-A">Distribución discreta</label>
            </div>

            <div id="uniform-distribution-A-selected" class="form-group no-display">
              <label for="uniform-dist-1-A">Ingresar el parametro 1:</label>
              {{ Form::input('text', 'uniform-dist-1-A', '', array('id' => 'uniform-dist-1-A', 'class' => 'form-control')) }}
              <label for="uniform-dist-2-A">Ingresar el parametro 2:</label>
              {{ Form::input('text', 'uniform-dist-2-A', '', array('id' => 'uniform-dist-2-A' , 'class' => 'form-control')) }}
            </div>
            <div id="exponential-distribution-A-selected" class="form-group no-display">
              <label for="exponential-dist-1-A">Ingresar el promedio:</label>
              {{ Form::input('text', 'exponential-dist-1-A', '', array('id' => 'exponential-dist-1-A', 'class' => 'form-control')) }}
            </div>
            <div id="normal-distribution-A-selected" class="form-group no-display">
              <label for="normal-dist-1-A">Ingresar el promedio:</label>
              {{ Form::input('text', 'normal-dist-1-A', '', array('id' => 'normal-dist-1-A', 'class' => 'form-control')) }}
              <label for="normal-dist-2-A">Ingresar el desviación estándar:</label>
              {{ Form::input('text', 'normal-dist-2-A', '', array('id' => 'normal-dist-2-A' , 'class' => 'form-control')) }}
            </div>
            <div id="discrete-distribution-A-selected" class="form-group no-display">
              <label for="discrete-dist-1-A">Ingresar los valores discretos:</label>
              {{ Form::input('text', 'discrete-dist-1-A', '', array('id' => 'discrete-dist-1-A', 'class' => 'form-control')) }}
            </div>
          </div>
          <div class="col-xs-4">
            <h3>Distribución para la Salida 1:</h3>
            <div class="form-group">
              {{ Form::radio('distribution-type-B', 'uniforme', false, ['id' => 'uniform-simulation-B', 'onclick' => 'distributionTypeB();']) }}
              <label for="uniform-simulation-B">Distribución uniforme</label>
            </div>
            <div class="form-group">
              {{ Form::radio('distribution-type-B', 'exponencial', false, ['id'=>'exponential-simulation-B', 'onclick' => 'distributionTypeB();']) }}
              <label for="exponential-simulation-B">Distribución exponencial</label>
            </div>
            <div class="form-group">
              {{ Form::radio('distribution-type-B', 'normal', false, ['id' => 'normal-simulation-B', 'onclick' => 'distributionTypeB();']) }}
              <label for="normal-simulation-B">Distribución normal</label>
            </div>
            <div class="form-group">
              {{ Form::radio('distribution-type-B', 'discreta', false, ['id'=>'discrete-simulation-B', 'onclick' => 'distributionTypeB();']) }}
              <label for="discrete-simulation-B">Distribución discreta</label>
            </div>

            <div id="uniform-distribution-B-selected" class="form-group no-display">
              <label for="uniform-dist-1-B">Ingresar el parametro 1:</label>
              {{ Form::input('text', 'uniform-dist-1-B', '', array('id' => 'uniform-dist-1-B', 'class' => 'form-control')) }}
              <label for="uniform-dist-2-B">Ingresar el parametro 2:</label>
              {{ Form::input('text', 'uniform-dist-2-B', '', array('id' => 'uniform-dist-2-B' , 'class' => 'form-control')) }}
            </div>
            <div id="exponential-distribution-B-selected" class="form-group no-display">
              <label for="exponential-dist-1-B">Ingresar el promedio:</label>
              {{ Form::input('text', 'exponential-dist-1-B', '', array('id' => 'exponential-dist-1-B', 'class' => 'form-control')) }}
            </div>
            <div id="normal-distribution-B-selected" class="form-group no-display">
              <label for="normal-dist-1-B">Ingresar el promedio:</label>
              {{ Form::input('text', 'normal-dist-1-B', '', array('id' => 'normal-dist-1-B', 'class' => 'form-control')) }}
              <label for="normal-dist-2-B">Ingresar el desviación estándar:</label>
              {{ Form::input('text', 'normal-dist-2-B', '', array('id' => 'normal-dist-2-B' , 'class' => 'form-control')) }}
            </div>
            <div id="discrete-distribution-B-selected" class="form-group no-display">
              <label for="discrete-dist-1-B">Ingresar los valores discretos:</label>
              {{ Form::input('text', 'discrete-dist-1-B', '', array('id' => 'discrete-dist-1-B', 'class' => 'form-control')) }}
            </div>
          </div>
          <div class="col-xs-4">
            <h3>Distribución para el Salida 2:</h3>
            <div class="form-group">
              {{ Form::radio('distribution-type-C', 'uniforme', false, ['id' => 'uniform-simulation-C', 'onclick' => 'distributionTypeC();']) }}
              <label for="uniform-simulation-C">Distribución uniforme</label>
            </div>
            <div class="form-group">
              {{ Form::radio('distribution-type-C', 'exponencial', false, ['id'=>'exponential-simulation-C', 'onclick' => 'distributionTypeC();']) }}
              <label for="exponential-simulation-C">Distribución exponencial</label>
            </div>
            <div class="form-group">
              {{ Form::radio('distribution-type-C', 'normal', false, ['id' => 'normal-simulation-C', 'onclick' => 'distributionTypeC();']) }}
              <label for="normal-simulation-C">Distribución normal</label>
            </div>
            <div class="form-group">
              {{ Form::radio('distribution-type-C', 'discreta', false, ['id'=>'discrete-simulation-C', 'onclick' => 'distributionTypeC();']) }}
              <label for="discrete-simulation-C">Distribución discreta</label>
            </div>

            <div id="uniform-distribution-C-selected" class="form-group no-display">
              <label for="uniform-dist-1-C">Ingresar el parametro 1:</label>
              {{ Form::input('text', 'uniform-dist-1-C', '', array('id' => 'uniform-dist-1-C', 'class' => 'form-control')) }}
              <label for="uniform-dist-2-C">Ingresar el parametro 2:</label>
              {{ Form::input('text', 'uniform-dist-2-C', '', array('id' => 'uniform-dist-2-C' , 'class' => 'form-control')) }}
            </div>
            <div id="exponential-distribution-C-selected" class="form-group no-display">
              <label for="exponential-dist-1-C">Ingresar el promedio:</label>
              {{ Form::input('text', 'exponential-dist-1-C', '', array('id' => 'exponential-dist-1-C', 'class' => 'form-control')) }}
            </div>
            <div id="normal-distribution-C-selected" class="form-group no-display">
              <label for="normal-dist-1-C">Ingresar el promedio:</label>
              {{ Form::input('text', 'normal-dist-1-C', '', array('id' => 'normal-dist-1-C', 'class' => 'form-control')) }}
              <label for="normal-dist-2-C">Ingresar el desviación estándar:</label>
              {{ Form::input('text', 'normal-dist-2-C', '', array('id' => 'normal-dist-2-C' , 'class' => 'form-control')) }}
            </div>
            <div id="discrete-distribution-C-selected" class="form-group no-display">
              <label for="discrete-dist-1-C">Ingresar los valores discretos:</label>
              {{ Form::input('text', 'discrete-dist-1-C', '', array('id' => 'discrete-dist-1-C', 'class' => 'form-control')) }}
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-offset-3 col-xs-6">
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
      </div>
    </div>
  </section>
@stop
