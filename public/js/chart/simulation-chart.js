$(document).ready(function(){
	function chartTest(selector,titulo,ruta,tituloSerie){
		$('#'+selector).jqChart({
			title: { text: titulo },
			tooltips: { type: 'shared' },
			animation: { duration: 1 },
			axes: [
				{
					location: 'bottom',
					
				}
			],
			series: [
				{
					type: 'stepLine',
					title: tituloSerie,
					data: getData(ruta)
				}
			]
		});
	}
	

	chartTest("servidor1","Utilizacion Servidor 1","server1","Utilizacion");
	chartTest("servidor2","Utilizacion Servidor 2","server2","Utilizacion");
	chartTest("cola1","Requirimientos cola 1","req_col_1","Requirimientos");
	chartTest("cola2","Requirimientos cola 2","req_col_2","Requirimientos");
	chartTest("sistema","Requirimientos en Sistema","system","Requirimientos");

});

function getData(ruta){
	var response="";

	$.ajax({
		url      : "chart/"+ruta,
		type     : 'POST',
		dataType : 'json',
		async    : false,
		success  : function(json){
			response = json;
		}
	});
	return response;
}
