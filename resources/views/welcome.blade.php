<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Валюта</title>

        <!-- Fonts -->
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<link href="{{ asset('css/style.css') }}" rel="stylesheet">

    </head>
    <body>
		<div class="container">
			<table>
				<tr>
					<th>Название</th>
					<th>Цена</th> 
					<th>Количество</th>
				</tr>
				@foreach($data['stock'] as $value)
				<tr>
					<td>{{ $value['name'] }}</td>
					<td>{{ $value['volume'] }}</td> 
					<td>{{ $value['price']['amount'] }}</td>
				</tr>
				@endforeach
			</table>
			<h1>dfgdfgdfg</h1>
			<pre>
			<?php print_r($data['stock']); ?>
			</pre>
			<h1>xcvbvc</h1>
		</div>
		<button class="btn btn-primary update">Обновить</button>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
             });
			function doSomething() {
				alert('xccv');
				$.ajax({
					headers: {
					  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url: "{{ route('currency') }}",
					cache: false,
					success: function(data){
						var start = data.indexOf('<table>');
						var tag = "</table>";
						var length= tag.length;
						var end = data.indexOf(tag)+length;
						$('.container').html(data.substring(start, end));		
					}
				});
				setTimeout(doSomething, 15000);	
			}
			doSomething();
			$('.update').on('click', function doSomething() {
				$.ajax({
					headers: {
					  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url: "{{ route('currency') }}",
					cache: false,
					success: function(data){
						var start = data.indexOf('<table>');
						var tag = "</table>";
						var length= tag.length;
						var end = data.indexOf(tag)+length;
						$('.container').html(data.substring(start, end));		
					}
				});
			});
		</script>
    </body>
</html>
