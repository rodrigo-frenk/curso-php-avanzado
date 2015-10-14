<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Foundation | Welcome</title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/foundation.css" />
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" />

  
    <?php wp_head(); ?>

  </head>
  <body>


    <!-- header#cabecera.row>#menu.row -->

    <header id="cabecera" class="row">
      <div id="menu" class="row">
      
                
        <?php

          $inicio = get_page_by_title('Inicio')->ID;

          $paginas_menu = get_posts(
            array(
              'post_parent' => $inicio,
              'post_type' => 'page'
            )
          );
          

          $html = "";
          
          foreach( $paginas_menu as $pagina ) {

            $id = $pagina -> ID;

            $html .= '<li class="small-12 medium-4 columns">';

              $html .= '<a href="' . get_the_permalink( $id ) . '">';
              
               $html .= get_the_title( $id );
              
              $html .= '</a>';

            $html .= '</li>';

          }

          echo $html;

        ?>


      </div>
    </header>



  <!-- section#personas.row -->
  <section id="personas" class="row">
    
<!--
.persona.hidden>.nombre.row+.apellido.row+.imagen.row+.edad.row+.ocupacion.row
-->
    
    <!-- #listado_personas.row -->
    <div id="listado_personas" class="small-12 medium-8 columns">
      <?php 
      $personas = get_posts(array('post_type' => 'persona'));
      
      $html = "";
      foreach( $personas as $persona ) {
        $html .= '<div class="persona_breve" data-id="';
          $html .= $persona->ID;
        $html .= '">';
          $html .= get_post_meta( $persona->ID, 'persona_nombre', true );
          $html .= " ";
          $html .= get_post_meta( $persona->ID, 'persona_apellido', true );
        $html .= '</div>';
      }
      
      echo $html;

      ?>
    </div>

    <div id="persona_completa" class="medium-4 columns">

      <div class="nombre_contenedor row">
        Nombre: 
        <span class="nombre"></span>
      </div>

      <div class="imagen row"></div>

      <div class="edad_contenedor row">
        Edad:
         <span class="edad"></span> 
        años
      </div>
      
      <div class="ocupacion_contenedor row">
        Ocupación: 
        <span class="ocupacion"></span>
      </div>

    </div>

  </section>


    


  </body>
</html>
