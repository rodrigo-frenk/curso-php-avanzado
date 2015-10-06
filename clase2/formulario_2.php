<!DOCTYPE HTML>

<!--
html>head>title{Formulario PHP}
-->

<html>
<head>

	<!-- meta[charset="utf-8"] -->
	<meta charset="utf-8"></meta>

	<title>Formulario PHP</title>

	<!-- link[href=estilos.css] -->
	<link rel="stylesheet" href="estilos.css">

</head>

<body>


	<?php
	
		$nombre_error = $apellido_error = $email_error =
		$sitio_web_error = $ocupacion_error = $edad_error = $genero_error = "";
	
		$nombre = $apellido = $email = $sitio_web = $ocupacion = $edad = $genero = "";

		function proteger_datos( $datos ) {
			$datos = trim( $datos );
			$datos = stripslashes( $datos );
			$datos = htmlspecialchars( $datos );
			return $datos;
		}

		if( $_SERVER["REQUEST_METHOD"] == "POST" ) {

			if( empty( $_POST[ "nombre" ] ) ) {
				$nombre_error = "Por favor introduce tu nombre.";
			} else {
				$nombre = proteger_datos( $_POST[ "nombre" ] );
				
				if( ! preg_match( "/^[a-zA-Zá-úÁ-Ú ]*$/", $nombre ) ) {
					$nombre_error = "Sólo se permiten letras y espacios.";
					$nombre = "";
				}

			} 
			if( empty( $_POST[ "apellido" ] ) ) {
				$apellido_error = "Por favor introduce tu apellido.";
			} else {
				$apellido = proteger_datos( $_POST[ "apellido" ] );
				if( ! preg_match( "/^[a-zA-Zá-úÁ-Ú ]*$/", $apellido ) ) {
					$apellido_error = "Sólo se permiten letras y espacios.";
					$apellido = "";
				}
			}
			if( empty( $_POST[ "email" ] ) ) {
				$email_error = "Por favor introduce tu email.";
			} else {
				$email = proteger_datos( $_POST[ "email" ] );

				if( ! filter_var( $email, FILTER_VALIDATE_EMAIL )) {
					$email_error = "Formato de e-mail inválido";
					$email = "";
				}
			}
			if( empty( $_POST[ "ocupacion" ] ) ) {
				$ocupacion_error = "Por favor introduce tu ocupacion.";
			} else {
				$ocupacion = proteger_datos( $_POST[ "ocupacion" ] );
				if( ! preg_match( "/^[a-zA-Zá-úÁ-Ú ]*$/", $ocupacion ) ) {
					$ocupacion_error = "Sólo se permiten letras y espacios.";
					$ocupacion = "";
				}			
			}
			if( empty( $_POST[ "sitio_web" ] ) ) {
				$sitio_web_error = "Por favor introduce tu sitio_web.";
			} else {
				$sitio_web = proteger_datos( $_POST[ "sitio_web" ] );

				if( ! filter_var( $sitio_web, FILTER_VALIDATE_URL )) {
					$sitio_web_error = "Formato de URL inválido";
					$sitio_web = "";
				}
			}
			if( empty( $_POST[ "edad" ] ) ) {
				$edad_error = "Por favor introduce tu edad.";
			} else {
				$edad = proteger_datos( $_POST[ "edad" ] );

				if( ! filter_var( $edad, FILTER_VALIDATE_INT )) {
					$edad_error = "Formato de URL inválido";
					$edad = "";
				}
			}
			if( empty( $_POST[ "genero" ] ) ) {
				$genero_error = "Por favor introduce tu genero.";
			} else {
				$genero = proteger_datos( $_POST[ "genero" ] );
			}
		}
		else if( $_SERVER["REQUEST_METHOD"] == "GET" ) {
			echo "<h3>Por favor introduce tus datos:</h3>";
		}

	?>

	<?php if( $nombre) { ?>
	<h3>Bienvenido, <?php echo $nombre; ?></h3>
	<?php } ?>


	<form action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?>" method="post">
		<!-- input#texto_$[type=text][name]*3 -->
		Nombre:
		<input type="text" name="nombre" value="<?php echo $nombre; ?>">
		<span class="error">* <?php echo $nombre_error; ?></span>
		
		Apellido:
		<input type="text" name="apellido" value="<?php echo $apellido; ?>">
		<span class="error">* <?php echo $apellido_error; ?></span>

		E-mail:
		<input type="text" name="email" value="<?php echo $email; ?>">
		<span class="error">* <?php echo $email_error; ?></span>

		Sitio Web:
		<input type="text" name="sitio_web" value="<?php echo $sitio_web; ?>">
		<span class="error">* <?php echo $sitio_web_error; ?></span>

		Ocupación:
		<input type="text" name="ocupacion" value="<?php echo $ocupacion; ?>">
		<span class="error">* <?php echo $ocupacion_error; ?></span>

		Edad:
		<input type="number" name="edad" value="<?php echo $edad; ?>">
		<span class="error">* <?php echo $edad_error; ?></span>
	
		Género:

		<?php
		$generos_nombres = array( "Femenino", "Masculino", "Otro", "Marciano", "Trans" );

		foreach( $generos_nombres as $genero_nombre ) {
			$genero_nombre_minuscula = strtolower( $genero_nombre );
			echo '<input type="radio" name="genero" value="';
			echo $genero_nombre_minuscula . '" ';
			echo isset( $genero ) && $genero == $genero_nombre_minuscula ? " checked" : "";
			echo '>'.$genero_nombre;
		}
		?>

		<span class="error">* <?php echo $genero_error; ?></span>
	
		<input type="submit">

	</form>



</body>

</html>