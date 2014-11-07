@extends('layouts.base')
@section('content')
  <section id="start-sect">
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <h1>Simulación de eventos</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        {{ Form::open(array('url' => '/simular-eventos','role'=>'form')) }}
          <div class="form-group">
            <label for="cantidad">Ingresar el número de eventos a simular:</label>
            <input type="number" class="form-control" id="cantidad" placeholder="" autofocus>
          </div>
          <button type="submit" class="btn btn-default">Simular</button>
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
