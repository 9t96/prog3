<?php



if ($_POST["op"] == "login") 
{
	
	if (isset($_POST["pass"]) && isset($_POST["mail"])) 
	{
		
		if ($_POST["mail"]  == "juan@mail" && $_POST["pass"] == "123" ) {
			session_start();

			$_SESSION["usuario"] = $_POST["mail"];

			echo "ok";
		}
		else
		{
			echo "nook";
		}
	}
}
else if($_POST["op"] == "logout")
{
	session_start();

	session_destroy();

	echo "ok";
}
else if(isset($_POST["color"]))
{
	session_start();

	setcookie("color".$_SESSION["usuario"],$_POST["color"]);

	echo "ok";

}



?>