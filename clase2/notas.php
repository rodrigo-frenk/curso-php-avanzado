<?php

// truco para abreviar (shorthand)

$variable = 3;

$texto = "La variable es ";

$texto .= $variable > 2 ? "mayor" : "menor";

$texto .= " a 2";

echo $texto;

?>