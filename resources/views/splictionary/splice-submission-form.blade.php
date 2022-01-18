@extends('splictionary.wrapper')
@section('content')
			<p>Splictionary is a spliced dictionary, a collective of spliced words. Brexit, Bromance ... plus others all belong here.</p>
			<form method="post" action="{{route('spliction.create')}}" autocomplete="off">
				@csrf
				<div class="row">
					<div class="col-12 col-md-3">
						<label for="first-word">First word</label>
						  <input name="first_word" type="text" class="form-control" id="first-word"  data-lpignore="true" />					</div>
					<div class="col-12 col-md-1 text-center pt-3 mt-4">
						<i class="fas fa-plus"></i>
					</div>
					<div class="col-12 col-md-3">
						<label for="first-word">Second word</label>
						  <input name="second_word" type="text" class="form-control" id="second-word" data-lpignore="true" />
					</div>
					<div class="col-12 col-md-1 text-center pt-3 mt-4">
						<i class="fas fa-equals"></i>
					</div>
					<div class="col-12 col-md-4">
						<label for="first-word">Spliction</label>
						<div class="input-group">
						  	<input name="word_splice" type="text" class="form-control float-md-left" id="word-splice" data-lpignore="true" />
						  	<div class="input-group-append">
						  	<input type="submit" class="btn btn-splorange w-100">
							</div>
						</div>
					</div>
				</div>
			</form>
			<div class="pb-3"></div>
			<div class="card-columns">
			@foreach ( $splictions ?? '' as $spliction)
			  	<div class="card bg-white p-3">
    				<blockquote class="blockquote mb-0">
    					<a href="{{route('spliction.entry',strtolower($spliction->word_splice))}}" class="text-dark spliction" data-first-word={{$spliction->first_word}} data-second-word={{$spliction->second_word}}>
	    					<h2><x-spliction-mechanic :first-word-part="$spliction->spliction_parts->first_word_part" :second-word-part="$spliction->spliction_parts->second_word_part" :spliction="$spliction->word_splice"/></h2>
	    					<p>{!! $definitions[$spliction->id]->definition ?? ""!!}</p>
      					</a>
    				</blockquote>
  				</div>
			@endforeach
			</div>
@stop