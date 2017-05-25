<?php
   
   echo imprimir();
   echo imprimirValor("Hola como estas con parametro");

   imprimirValores("CAdena param ");
   imprimirValores("CAdena param ",7);

   function imprimir()
   {
        return "Hola como estas";
   } 

   function imprimirValor($cadena)
   {
        return $cadena;
   }

   function imprimirValores($miCAdena,$entero = 3)
   {
       echo $miCAdena .$entero. "</br>";
   }



?>