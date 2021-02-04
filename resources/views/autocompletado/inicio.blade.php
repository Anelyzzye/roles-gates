<!DOCTYPE html>
<html>
<head>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

	<title></title>
</head>
<body>
<div class="container">
	<h1>Hola</h1>
	<div class="form-group">	
			<input 	type="text" 
					name="username"
					id="username"
					class="for-control">
					<div id="listusername">
					</div>
					<!--Campo oculto con el valor del hash-->
			{{ csrf_field() }}
	</div>
</div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<script>
	$(document).ready(function(){
		console.log('aqui estoy');

		$('#username').keyup(function(){
			let query = $(this).val();
			console.log('dentro');
				if(query != '')
				{
 					var _token = $('input[name="_token"]').val();
 					console.log('Valido');
 					$.ajax({
						url:"{{ route('autocompletar.alumn') }}",
						method: "POST",
						data:{query:query,_token:_token},
						success:function(data)
						{
							$('#listusername').fadeIn();
							$('#listusername').html(data);
						}

					});
					console.log('funciono');
				}

		});

		$(document).on('click','li',function(){
			$('#username').val($(this).text());
			$('#listusername').fadeOut();
		});
	});
</script>
</html>