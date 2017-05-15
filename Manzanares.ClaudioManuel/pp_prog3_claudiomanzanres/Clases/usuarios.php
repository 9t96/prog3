<?php

class usuarios
{
	public $nombre;
	public $edad;
	public $email;
	public $clave;

    public function __construct($nombre=NULL,$clave=NULL,$edad=NULL,$email=NULL)
    {
        if($nombre !==NULL && $clave !==NULL && $edad!==NULL  && $email!==NULL)
        {
            $this->clave = $clave;
            $this->nombre = $nombre;
            $this->email = $email;
            $this->edad = $edad;
        }
    }

    public function setClave($value)
    {
       $this->codigo = $clave;
    }
    
    public function setNombre($value)
    {

        $this->nombre = $value;
    }
    
    public function setEmail($value)
    {
        $this->email = $value;
        
    }

    public function setEdad($value)
    {
        $this->edad = $value;
        
    }

   	public function getClave()
    {
        return $this->clave;
    }
    
    public function getNombre()
    {
        return $this->nombre;      
    }

    public function getEdad()
    {
        return $this->edad;      
    }

    public function getEmail()
    {
        return $this->email;      
    }
    

    public function ToString()
    {
        return $this->nombre."-".$this->clave."-".$this->edad."-".$this->email."\r\n";
    }

    public function GuardarEnArchivo()
    {
    	 	$arch = fopen("usuarios.txt","a");
        
			if(fwrite($arch,$this->ToString()))
			{
			    echo "Escribio exitosamente.";
			}
			else
			{
			    echo "No logro escribir.";
			}
			fclose($arch);
    }

    public static function Listar()
    {
        $arrayPersonas = array();

        $archivo = fopen("../Punto1/usuarios.txt", "r");

        while(!feof($archivo)) {
            
            $unalinea = fgets($archivo);

            $exploded = explode("-",$unalinea);

            $exploded[0] = trim($exploded[0]);

            if ($exploded[0]!="") {
            $arrayPersonas[]  = new usuarios($exploded[0],$exploded[1],$exploded[2],$exploded[3]);           }

        }
  
        fclose($archivo);




            echo     "<table class='table' border='1px solid black' border='1' width='100%' align='center'>
        <thead>
        <tr style='background-color:powderblue;'>
            <th>Nombre</th>
            <th>Edad</th>   
            <th>Email</th>
            <th>Clave</th>
        </tr>
        </thead>";

    foreach ($arrayPersonas as $value) {
        echo "  <tr>
                    <td> ".$value->getNombre()."</td>
                    <td>".$value->getEdad()."</td>
                    <td>".$value->getEmail()."</td>
                    <td>".$value->getClave()."</td>
                </tr>
            ";
    }

    echo "</table>";
    }
}

?>