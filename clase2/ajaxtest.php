	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.js"></script>

<script>
	$(document).ready(function(){

		printResult = function(result){
			console.log(result);
		}

		var ajaxData = {
			url: 'procesamiento.php',
			dataType: 'json',
			type: 'post',
			data: {
				nombre: "Nombre...",
				ocupacion: "Ocupacion...",
			},
			success: printResult
		};

		//$.ajax(ajaxData);

	})
</script>
