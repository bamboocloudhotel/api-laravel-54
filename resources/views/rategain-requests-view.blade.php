@extends('layouts.app')

  

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
			{{$rategainRequest->reference}} - {{$rategainRequest->type}}<br>
			{{$rategainRequest->created_at}}
			
		</div>
		<div class="col-md-8 col-md-offset-2">
			<pre>{{$rategainRequest->request}}</pre>
		</div>
	</div>
</div>

@endsection