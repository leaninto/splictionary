@extends('splictionary.wrapper')
@section('content')
		<div class="card-columns">
			@foreach ( $splictions ?? '' as $spliction)
			  	<div class="card bg-primary text-white text-center p-3">
    				<blockquote class="blockquote mb-0">
    					<a href="{{route('spliction.entry',strtolower($spliction->word_splice))}}" class="text-white">
	    					<h2>{{$spliction->word_splice}}</h2>
	      					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.</p>
	      					<footer class="blockquote-footer text-white" >
	      					</footer>
      					</a>
    				</blockquote>
  				</div>
			@endforeach
		</div>
@stop