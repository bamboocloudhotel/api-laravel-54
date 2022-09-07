@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
			{{$rategainRequest->reference}} - {{$rategainRequest->type}}<br>
			{{$rategainRequest->created_at}}
			<br>

		</div>
		<div class="col-md-2">
			<button class="btn btn-warning" id="resendReservation" onclick="sendReservation()">Reenviar Reserva</button>
		</div>
		<div class="col-md-8 col-md-offset-2">
			<pre>{{$rategainRequest->request}}</pre>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<b>Request</b>
		</div>
		<div class="col-md-8 col-md-offset-2">
			{{$rategainRequest->xml}}
		</div>		
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<b>Response</b>
		</div>
		<div class="col-md-8 col-md-offset-2">
			{{$rategainRequest->response}}
		</div>		
	</div>
</div>

@endsection

@section('script')
	<script>
		var loading = false;


		function sendReservation() {
			// alert('{{$rategainRequest->xml}}');

			loading = true;
			$('#resendReservation').attr('disabled', true);

			if (confirm("Esta seguro de reenviar la reserva?") == true) {
				axios.post('https://rategain.bamboochamootor.com/api-laravel-54/public/index.php/api/rgbridgeapi/push/receive', '{!! $rategainRequest->xml !!}', {
					headers: {'Content-Type': 'text/xml'}
				})
						.then(function (response) {
							console.log(response);
							loading = false;
							$('#resendReservation').attr('disabled', false);
							alert('La reserva se recibio con exito.');
						})
						.catch(function (error) {
							console.log(error);
							loading = false;
							$('#resendReservation').attr('disabled', false);
							alert('Ocurrio un error recibiendo la reserva.');
						});
			}

		}

	</script>
@endsection
