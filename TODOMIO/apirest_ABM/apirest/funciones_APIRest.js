
function traerTodos(){

    var pagina = "http://localhost:..........";

    $.ajax({
        type: 'GET',
        url: pagina,
        dataType: "json",
        async: true
    })
    .done(function (objJson) {

        var tablaEncabezado = "<table border='1' class='table'>";
        tablaEncabezado += "<tr><th>ID</th><th>CHAR</th><th>DATE</th><th>INT</th><th>ACCION</th></tr>";
        var tablaCuerpo = "";
        var tablaPie = "</tr></html>";

        for(var i=0;i<objJson.length;i++){
            tablaCuerpo += "<tr><td>"+objJson[i].id+"</td><td>"+objJson[i].valor_char;
            tablaCuerpo += "</td><td>"+objJson[i].valor_date+"</td><td>"+objJson[i].valor_int;
            tablaCuerpo += "</td><td><a href='#' data-id='"+objJson[i].id+"' onclick='administrarModificar("+objJson[i].id+")' data-toggle='modal' data-target='#myModal' class='open-Modal'>MODIFICAR</a>&nbsp;";
            tablaCuerpo += "&nbsp;<a href='#' onclick='eliminar("+objJson[i].id+")'>ELIMINAR</a></td></tr>";
        }

        $("#divTabla").html(tablaEncabezado+tablaCuerpo+tablaPie);

    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });    

}
function agregar(){

    var pagina = "http://localhost:.........";
	var foto = $("#archivo").val();
	
	if(foto === "")
	{
		return;
	}

	var archivo = $("#archivo")[0];
	var formData = new FormData();
	formData.append("archivo",archivo.files[0]);
	formData.append("valor_char",$("#valor_char").val());
	formData.append("valor_date",$("#valor_date").val());
	formData.append("valor_int",$("#valor_int").val());

	$.ajax({
        type: 'POST',
        url: pagina,
        dataType: "json",
		cache: false,
		contentType: false,
		processData: false,
        data: formData,
        async: true
    })
    .done(function (objJson) {

        alert("Elemento agregado exitosamente!!!");        

    })
    .fail(function (jqXHR, textStatus, errorThrown) {
    });    

}
function administrarModificar(id){

    var pagina = "http://localhost:........../traerUno/"+id;

    $.ajax({
        type: 'GET',
        url: pagina,
        dataType: "json",
        async: true
    })
    .done(function (objJson) {

        $("#id").val(objJson[0].id);
        $("#valor_char").val(objJson[0].valor_char);
        $("#valor_date").val(objJson[0].valor_date);
        $("#valor_int").val(objJson[0].valor_int);

    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });    
}

function modificar(){

    if(!confirm("Seguro de modificar?"))
        return;

    var pagina = "http://localhost:.............";

    $.ajax({
        type: 'PUT',
        url: pagina,
        dataType: "json",
        data: {
            id : $("#id").val(),
            valorChar : $("#valor_char").val(),
            valorDate : $("#valor_date").val(),
            valorInt : $("#valor_int").val()
        },
        async: true
    })
    .done(function (objJson) {

        $("#divMensaje").css("display", "block");
        $("#spanMensaje").removeClass("label label-danger");
        $("#spanMensaje").addClass("label label-success");
        $("#spanMensaje").html("Elemento modificado exitosamente!!!");
        $("#btnModificar").css("display", "none");

        traerTodos();

    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        $("#divMensaje").css("display", "block");
        $("#spanMensaje").addClass("label label-danger");
        $("#spanMensaje").html("Error al intentar modificar elemento!!!");
        $("#btnModificar").css("display", "none");
    });    

}
function eliminar(id){

    if(!confirm("Seguro de eliminar el elemneto con id="+id+"?"))
        return;

    var pagina = "http://localhost:..................";

    $.ajax({
        type: 'DELETE',
        url: pagina,
        dataType: "json",
        data: {
            id : id
        },
        async: true
    })
    .done(function (objJson) {

        traerTodos();
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });    

}

function SubirFoto(){
	
    var pagina = "http://localhost:..................";
	
	var foto = $("#archivo").val();
	
	if(foto === "")
	{
		return;
	}

	var archivo = $("#archivo")[0];
	var formData = new FormData();
	formData.append("archivo",archivo.files[0]);

	$.ajax({
        type: 'POST',
        url: pagina,
        dataType: "json",
		cache: false,
		contentType: false,
		processData: false,
        data: formData,
        async: true
    })
	.done(function (objJson) {

		if(!objJson.Exito){
			alert(objJson.Mensaje);
			return;
		}
		$("#divFoto").html(objJson.Html);
	})
	.fail(function (jqXHR, textStatus, errorThrown) {
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });   
}