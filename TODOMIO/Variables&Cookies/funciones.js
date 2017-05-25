function Guardar()
{
	var datos = "pass=" + $("#pass").val() + "&mail=" + $("#mail").val() + "&op=login" ; 

		$.ajax({
		type:"POST", 
		dataType:"Text", 
		url:"Administrar.php",
		data:datos,
		async:true,
		statusCode:
		{
			200:function(){ alert("Se encontro");},
			404:function(){ alert("Error 404");}
		}
		})
		.done(function(valor){

			if (valor == "ok")
			{
				window.location.href = "principal.php";
			}
			else
			{
				console.log("error");
			}
		})		
		.fail(function(jqXHR, textStatus, errorThrown){
			alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
		})

}

function Deslogear()
{
	var logout = "op=logout";

		$.ajax({
		type:"POST", 
		dataType:"Text", 
		url:"Administrar.php",
		data:logout,
		async:true,
		statusCode:
		{
			200:function(){ alert("Se encontro");},
			404:function(){ alert("Error 404");}
		}
		})
		.done(function(valor){

			if (valor == "ok")
			{
				window.location.href = "index.php";
			}
			else
			{
				alert("Erro al deslogear");
			}
			
		})		
		.fail(function(jqXHR, textStatus, errorThrown){
						alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
		})
			
}

function GuardarCookieColor()
{
	var micolor = "color=" + $("#color").val();
		
		$.ajax({
		type:"POST", 
		dataType:"Text", 
		url:"Administrar.php",
		data:micolor,
		async:true,
		statusCode:
		{
			200:function(){ alert("Se encontro");},
			404:function(){ alert("Error 404");}
		}
		})
		.done(function(valor){

			if (valor == "ok")
			{
				window.location.href = "principal.php";
			}

		})		
		.fail(function(jqXHR, textStatus, errorThrown){
						alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
		})
}