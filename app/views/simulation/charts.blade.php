@extends('layouts.base')
@section('extra_css')
	{{ HTML::style('css/chart/jquery.jqChart.css') }}
	{{ HTML::style('css/chart/jquery.jqRangeSlider.css') }}
@stop
@section('extra_scripts')
	{{ HTML::script('js/chart/jquery.mousewheel.js') }}
	{{ HTML::script('js/chart/jquery.jqChart.min.js') }}
	{{ HTML::script('js/chart/jquery.jqRangeSlider.min.js') }}
	{{ HTML::script('js/chart/excanvas.js') }}
	{{ HTML::script('js/chart/simulation-chart.js') }}
	
@stop
@section('content')
	
	<div>
		<div id="servidor1" style="width: 100%; height: 300px; margin : 50px 0">
		</div>
	</div>

	<div>
		<div id="servidor2" style="width: 100%; height: 300px; margin : 50px 0">
		</div>
	</div>

	<div>
		<div id="cola1" style="width: 100%; height: 300px; margin : 50px 0">
		</div>
	</div>

	<div>
		<div id="cola2" style="width: 100%; height: 300px; margin : 50px 0">
		</div>
	</div>

	<div>
		<div id="sistema" style="width: 100%; height: 300px; margin : 50px 0">
		</div>
	</div>
@stop
