jQuery(document).foundation();

jQuery(document).ready(function($) {

	$('.persona_breve').click(function(){

		// crear variable para mejorar legibilidad:
		persona = $(this);
		
		persona_id = persona.data('id');


		// declarar función 'callback':
		mostrarPersona = function( result ) {

			$('#persona_completa .nombre').html( result.nombre + " " + result.apellido );

			$('#persona_completa .imagen').html( result.imagen );

			$('#persona_completa .edad').html( result.edad );

			$('#persona_completa .ocupacion').html( result.ocupacion );

		}

		// integrar solicitud ajax
		ajaxData = {
			url: Ajax.ajax_url,
			type: 'post',
			dataType: 'json',
			data: {
				action: 'cargar_datos_persona',
				id: persona_id
			},
			success: mostrarPersona
		}

		// ejecutar solicitud
		$.ajax( ajaxData );

	});


});


