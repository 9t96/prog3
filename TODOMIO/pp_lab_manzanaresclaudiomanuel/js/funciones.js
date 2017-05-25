function cambiarProgreso()
{
	$(function(){
		var valor=$("#miRango").val();
		$("#progreso").css('width',valor+'%');
	});
}

function cambiarProgresoConDelay()
{
	$.ajax({
	type:"POST", 
	dataType:"Text", 
	url:"./backend/delay.php",
	statusCode:
	{
		200:function(){ alert("Se encontro");},
		404:function(){ alert("Error 404");}
	}
	})
	.done(function(valor){

		$("#progreso").css('width',valor+'%');

	})		
	.fail(function(jqXHR, textStatus, errorThrown){
		alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
	})
}
