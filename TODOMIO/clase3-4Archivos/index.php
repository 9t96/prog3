<!doctype html>

<head>
    <meta charset="utf-8"/>

</head>

<body>

    <!--Action destino de la peticion Method:forma de envio-->
	<!--form para ingreso de datos  //puede terner 'name'-->  
 	<form action="servidor.php" method="post">
        Nombre: <input type="text" name="txtName">
        <!--Input: define un lugar donde es usuario puede ingresar datos-->
        <input type="submit" value= " enviar datos" name="enviar" ><br/>
        <input type="submit" value= "leer de archivo" name="leer"><br/>
        
    </form>


</body>

</html> 