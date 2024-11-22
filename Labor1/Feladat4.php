<?php
function calculate($a,$b,$szam)
{
    switch ($szam){
        case "*":
            return $a*$b;
        case "/":
            return $a/$b;
        case "+":
            return $a+$b;
        case "-":
            return $a-$b;
    }
}
$b=2;
$a=4;
$szam="*";
echo calculate($a,$b,$szam);

?>