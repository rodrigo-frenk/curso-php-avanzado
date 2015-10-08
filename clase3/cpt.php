<?php
add_action( 'init', 'wpdocs_codex_Reporte_init' );


function wpdocs_codex_Reporte_init() {
    $labels = array(
        'name'               => _x( 'Reportes', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Reporte', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Reportes', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Reporte', 'Añadir nuevo on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Añadir nuevo', 'Reporte', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Añadir nuevo Reporte', 'your-plugin-textdomain' ),
        'new_item'           => __( 'Nuevo Reporte', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Editar Reporte', 'your-plugin-textdomain' ),
        'view_item'          => __( 'Ver Reporte', 'your-plugin-textdomain' ),
        'all_items'          => __( 'Todos los Reportes', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Buscar Reportes', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Reportes superiores:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'No Reportes found.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'No Reportes found in Trash.', 'your-plugin-textdomain' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'reporte' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
    );
 
    register_post_type( 'reporte', $args );
}
?>