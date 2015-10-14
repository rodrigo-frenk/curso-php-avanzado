<?php


<div id="personas">


<?php 

$args = array(			
	'post_type' => 'persona',
	); 

$q = new WP_Query( $args );

if($q->have_posts()) {

	while($q->have_posts()) {
		
		$q->the_post();

		$imagen = get_the_post_thumbnail();
		$nombre = get_post_meta(get_the_ID(),'persona_nombre', true);
		$apellido = get_post_meta(get_the_ID(),'persona_apellido', true);
		$edad = get_post_meta(get_the_ID(),'persona_edad', true);
		$ocupacion = get_post_meta(get_the_ID(),'persona_ocupacion', true);

		echo '<div class="persona">';
		
		echo $imagen;
		echo $apellido . ", ";	
		echo $nombre . ". ";	
		echo $ocupacion . ". ";	
		echo $edad . " años.";	

		echo '</div>';

	}

}

?>

</div><!-- #personas -->


?>