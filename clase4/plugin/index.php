<?php
/*
Plugin Name: Plugin de prueba
Author: furenku
*/

class PluginPrueba {

	function __construct() {

		$this->cpts = array(
			array( 'singular' => 'Reporte', 'plural' => 'Reportes' ),
			array( 'singular' => 'Persona', 'plural' => 'Personas' ),
			array( 'singular' => 'Inventariable', 'plural' => 'Inventariables' ),
		);

		add_action( 'init', array( $this, 'registrar_cpts' ) );
	
	}

	private $cpts;



	public function registrar_cpts() {

		foreach( $this->cpts as $cpt ) {

		    $labels = array(
		        'name'               => _x( $cpt['plural'], 'post type general name', 'plugin-prueba-textdomain' ),
		        'singular_name'      => _x( $cpt['singular'], 'post type singular name', 'plugin-prueba-textdomain' ),
		        'menu_name'          => _x( $cpt['plural'], 'admin menu', 'plugin-prueba-textdomain' ),
		        'name_admin_bar'     => _x( $cpt['singular'], 'Añadir nuevo on admin bar', 'plugin-prueba-textdomain' ),
		        'add_new'            => _x( 'Añadir nuevo', $cpt['singular'], 'plugin-prueba-textdomain' ),
		        'add_new_item'       => __( 'Añadir nuevo ' . $cpt['singular'], 'plugin-prueba-textdomain' ),
		        'new_item'           => __( 'Nuevo ' . $cpt['singular'], 'plugin-prueba-textdomain' ),
		        'edit_item'          => __( 'Editar ' . $cpt['singular'], 'plugin-prueba-textdomain' ),
		        'view_item'          => __( 'Ver ' . $cpt['singular'], 'plugin-prueba-textdomain' ),
		        'all_items'          => __( 'Todos los ' . $cpt['plural'], 'plugin-prueba-textdomain' ),
		        'search_items'       => __( 'Buscar ' . $cpt['plural'], 'plugin-prueba-textdomain' ),
		        'search_items'       => __( 'Buscar ' . $cpt['plural'], 'plugin-prueba-textdomain' ),
		        'parent_item_colon'  => __( $cpt['plural'] . ' superiores:', 'plugin-prueba-textdomain' ),
		        'not_found'          => __( 'No se encontraron ' . $cpt['plural'], 'plugin-prueba-textdomain' ),
		        'not_found_in_trash' => __( 'No se encontraron ' . $cpt['plural'] . ' en la Papelera.', 'plugin-prueba-textdomain' ),
		    );
		 
		    $args = array(
		        'labels'             => $labels,
		        'public'             => true,
		        'publicly_queryable' => true,
		        'show_ui'            => true,
		        'show_in_menu'       => true,
		        'query_var'          => true,
		        'rewrite'            => array( 'slug' => strtolower($cpt['singular']) ),
		        'capability_type'    => 'post',
		        'has_archive'        => true,
		        'hierarchical'       => true,
		        'menu_position'      => null,
		        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
		    );
		 
		    register_post_type( strtolower( $cpt['singular'] ), $args );
	


		}
		
	}
	

}


$plugin_prueba = new PluginPrueba();


?>