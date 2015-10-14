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
	
		if ( is_admin() ) {

			add_action( 'admin_init', array( $this, 'registrar_campos_opciones' ) );
			add_action( 'admin_menu', array( $this, 'configurar_menu' ) );
		

		    add_action( 'load-post.php', array($this, 'annadir_metaboxes'));
		    add_action( 'load-post-new.php', array($this, 'annadir_metaboxes'));

		}


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
		        'supports'           => array( 'thumbnail'),
		    );
		 
		    register_post_type( strtolower( $cpt['singular'] ), $args );
	


		}
		
	}
	


	public function annadir_metaboxes() {

		add_action( 'add_meta_boxes', array( $this, 'annadir_metabox' ) );
		add_action( 'save_post', array( $this, 'save_metabox' ) );

	}


	public function annadir_metabox( $post_type ) {
            
            $post_types = array( 'persona' );
           
            if ( in_array( $post_type, $post_types )) {
				add_meta_box(
					'datos_persona'
					,__( 'Datos de la persona', 'plugin_prueba_textdomain' )
					,array( $this, 'mostrar_meta_box' )
					,$post_type
					,'advanced'
					,'high'
				);
            }

	}


	public function save_metabox( $post_id ) {
	
		/*
		 * We need to verify this came from the our screen and with proper authorization,
		 * because save_post can be triggered at other times.
		 */

		// Check if our nonce is set.
		if ( ! isset( $_POST['plugin_prueba_inner_custom_box_nonce'] ) )
			return $post_id;

		$nonce = $_POST['plugin_prueba_inner_custom_box_nonce'];

		// Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $nonce, 'plugin_prueba_inner_custom_box' ) )
			return $post_id;

		// If this is an autosave, our form has not been submitted,
                //     so we don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			return $post_id;

		// Check the user's permissions.
		if ( 'page' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;
	
		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}





		$nombre = sanitize_text_field( $_POST['plugin_prueba_persona_nombre'] );
		update_post_meta( $post_id, 'persona_nombre', $nombre );

		
		$apellido = sanitize_text_field( $_POST['plugin_prueba_persona_apellido'] );
		update_post_meta( $post_id, 'persona_apellido', $apellido );

		
		$edad = sanitize_text_field( $_POST['plugin_prueba_persona_edad'] );
		update_post_meta( $post_id, 'persona_edad', $edad );

		
		$ocupacion = sanitize_text_field( $_POST['plugin_prueba_persona_ocupacion'] );
		update_post_meta( $post_id, 'persona_ocupacion', $ocupacion );


	}



	public function mostrar_meta_box( $post ) {
	
		wp_nonce_field( 'plugin_prueba_inner_custom_box', 'plugin_prueba_inner_custom_box_nonce' );


		$nombre = get_post_meta( $post->ID, 'persona_nombre', true );

		echo '<label for="plugin_prueba_persona_nombre">';
		_e( 'Nombre:', 'plugin_prueba_textdomain' );
		echo '</label> ';
		echo '<input type="text" id="plugin_prueba_persona_nombre" name="plugin_prueba_persona_nombre"';
                echo ' value="' . esc_attr( $nombre ) . '" size="25" />';


   		$apellido = get_post_meta( $post->ID, 'persona_apellido', true );
     
		echo '<label for="plugin_prueba_persona_apellido">';
		_e( 'Apellido:', 'plugin_prueba_textdomain' );
		echo '</label> ';
		echo '<input type="text" id="plugin_prueba_persona_apellido" name="plugin_prueba_persona_apellido"';
                echo ' value="' . esc_attr( $apellido ) . '" size="25" />';

		$edad = get_post_meta( $post->ID, 'persona_edad', true );
                   
		echo '<label for="plugin_prueba_persona_edad">';
		_e( 'Edad:', 'plugin_prueba_textdomain' );
		echo '</label> ';
		echo '<input type="number" id="plugin_prueba_persona_edad" name="plugin_prueba_persona_edad"';
                echo ' value="' . esc_attr( $edad ) . '" size="25" min="18" />';

                                                
		$ocupacion = get_post_meta( $post->ID, 'persona_ocupacion', true );
                                                
		echo '<label for="plugin_prueba_persona_ocupacion">';
		_e( 'Ocupación:', 'plugin_prueba_textdomain' );
		echo '</label> ';
		echo '<input type="text" id="plugin_prueba_persona_ocupacion" name="plugin_prueba_persona_ocupacion"';
                echo ' value="' . esc_attr( $ocupacion ) . '" size="25" />';
	}










	public function configurar_menu() {
		
		add_menu_page(
			"Configurar plugin",
			"Opciones del plugin",
			"manage_options",
			"plugin_prueba_panel",
			array($this, "plugin_prueba_pagina_config")
		);


	}

	public function plugin_prueba_pagina_config() {
		?>
		<h1>Opciones del plugin</h1>
		<form action="options.php" method="post">

			<?php 
				settings_fields( "opciones-plugin" );
				do_settings_sections( "opciones-plugin-principal" );
				submit_button();
			?>

		</form>
		<?php
	}






	public function registrar_campos_opciones() {
		
		add_settings_section(
			"opciones-plugin",
			"Variables de prueba",
			null,
			"opciones-plugin-principal"
		);

		add_settings_field(
			"variable_prueba",
			"Variable de prueba",
			array($this,"seleccionar_variable_prueba"),
			"opciones-plugin-principal",
			"opciones-plugin"

		);


		add_settings_field(
			"otra_variable_prueba",
			"Otra Variable de prueba",
			array($this,"seleccionar_variable_prueba_otra"),
			"opciones-plugin-principal",
			"opciones-plugin"

		);


		register_setting(
			"opciones-plugin",
			"variable_prueba"
		);
		register_setting(
			"opciones-plugin",
			"otra_variable_prueba"
		);


	}

	public function seleccionar_variable_prueba(  ) {
		$this -> input( "variable_prueba", "number" );
	}

	public function seleccionar_variable_prueba_otra(  ) {
		$this -> input( "otra_variable_prueba", "text" );
	}

	public function input( $nombre_opcion, $tipo ) {
		echo '<input type="'.$tipo.'" name="'.$nombre_opcion .
		'" id="'.$nombre_opcion .'" value="'.get_option($nombre_opcion).'">';
	}




}


$plugin_prueba = new PluginPrueba();


?>