<?php



function mostrar_datos( $persona ) {
	
	$datos_persona = $persona['nombre'] . " " . $persona["apellido"] . ", " . $persona['edad'] . " años.";
	
	return $datos_persona;

}



function mostrar_hijos( $padre ) {

	$hijos = $padre['hijos'];

	if( is_array( $hijos ) ) {

		$html = '<ul>';

		foreach( $hijos as $hijo ) {
			
			$html .= '<li>';
			$nombre_hijo = $hijo['nombre'] . " " . $hijo["apellido"];
			$html .= $nombre_hijo;
			$html .= mostrar_hijos( $hijo );
			$html .= '</li>';
		
		}

		$html .= '</ul>';

	}

	return $html;


}



function mostrar_familias( $familias ) {

	echo '<ul>';

		foreach( $familias as $jefe_familia ) {

			$datos_persona = mostrar_datos( $jefe_familia );

			echo '<li>' . $datos_persona;
			echo mostrar_hijos( $jefe_familia );
			echo '</li>';

		}

	echo '</ul>';

}



?>