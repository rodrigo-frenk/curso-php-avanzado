<!DOCTYPE HTML>

<!--
html>head>title{Formulario PHP}
-->

<html>
<head>
	<title>Formulario PHP</title>

	<!-- meta[charset="utf-8"] -->
	<meta charset="utf-8">

</head>

<body>
	
	<form action="procesamiento.php" method="post">
		<!-- input#texto_$[type=text][name]*3 -->
		Nombre:
		<input type="text" id="texto_1" name="nombre">
		Apellido:
		<input type="text" id="texto_2" name="apellido">
		Ocupación:
		<input type="text" id="texto_3" name="ocupacion">
		Edad:
		<input type="number" id="" name="edad">
	
		<!-- input[type=submit] -->
		<input type="submit">

	</form>

</body>

</html>