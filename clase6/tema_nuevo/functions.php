<?php



function cargar_scripts() {

	wp_register_script( 'modernizer', get_stylesheet_directory_uri() .'/js/vendor/modernizr.js' );
	wp_register_script( 'foundation', get_stylesheet_directory_uri() .'/js/foundation.min.js', array('jquery','modernizer') );

	wp_enqueue_script( 'app', get_stylesheet_directory_uri() .'/js/app.js', array('foundation') );
	
	wp_localize_script( 'app',  'Ajax', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

}

add_action( 'wp_enqueue_scripts', 'cargar_scripts' );








add_action( 'wp_ajax_cargar_datos_persona', 'cargar_datos_persona');
add_action( 'wp_ajax_nopriv_cargar_datos_persona', 'cargar_datos_persona');


function cargar_datos_persona() {

	$ID = $_POST['id'];


	$datos = array(

		'nombre' => get_post_meta( $ID, 'persona_nombre', true ),
		'apellido' => get_post_meta( $ID, 'persona_apellido', true ),
		'imagen' => get_the_post_thumbnail( $ID ),
		'edad' => get_post_meta( $ID, 'persona_edad', true ),
		'ocupacion' => get_post_meta( $ID, 'persona_ocupacion', true )

	);

	die( json_encode( $datos ) );

}






?>