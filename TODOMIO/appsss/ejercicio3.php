<?php     

$a = rand(1,10);
$b = rand(1,10);
$c = rand(1,10);

echo"Variables";
echo $a;
echo $b;
echo $c;

if($a>$c && $a<$b || $a<$c && $a>$b)
{
    echo "A es la variable intermedia";
}
elseif ($c>$a && $c<$b || $c<$a&& $c>$b) {
       echo "C es la variable intermedia";
} 
elseif ($b>$a && $b<$c || $b<$a && $b>$c) {
    echo "B es la variable intermedia";
}
else
{
    echo "No hay valor medio...";
}
   


?>