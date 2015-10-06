<?php

$familias = array();


$tataranieto = array(
	'nombre' => 'Eulalio',
	'apellido' => 'Pérez',
	'edad' => '1'
);

$bisnieto = array(
	'nombre' => 'Juan',
	'apellido' => 'Pérez IV',
	'edad' => '15',
	'hijos' => array( $tataranieto )
);

$hija = array(
	'nombre' => 'Hortensia',
	'apellido' => 'Pérez',
	'edad' => '28',
	'hijos' => array( $bisnieto )
);

$padre = array(
	'nombre' => 'Juan',
	'apellido' => 'Pérez II',
	'edad' => '30',
	'hijos' => array( $hija )
);



$tio = array(
	'nombre' => 'Ernesto',
	'apellido' => 'Pérez',
	'edad' => '36',
	'hijos' => array()
);


$abuelo = array(
	'nombre' => 'Juan',
	'apellido' => 'Pérez',
	'edad' => '60',
	'hijos' => array( $padre, $tio )
);


$otro_sennor = array(
	'nombre' => 'Otto',
	'apellido' => 'Klaus',
	'edad' => '67',
	'hijos' => array()
);




array_push( $familias, $abuelo );
array_push( $familias, $otro_sennor );


?>