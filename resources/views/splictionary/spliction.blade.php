@extends('splictionary.wrapper')

@section('content')
<div class="container-fluid">
	<div class="container bg-splorange">
	  <div class="row">
	  	<div class="col-12">
	  		<p>When you splice {{$spliction->first_word}} with {{$spliction->second_word}} you get</p>
	  		<h1>{{$spliction->word_splice}}</h1>
	  	</div>
	  </div>
	</div>
</div>
@stop