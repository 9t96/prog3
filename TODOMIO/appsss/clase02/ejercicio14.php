<?php 

if(esPar(343))
{
    echo "ES par<br/>";
}
else
    echo "ES impar<br/>";

if(esImpar(666))
{
    echo "ES impar<br/>";
}
else
{
    echo "Es par<br/>";
}

function esPar($num)
{
    if($num%2 == 0)
    {
        return true;
    }

    return false;
}

function esImpar($num)
{
    return !esPar($num);
}

?>