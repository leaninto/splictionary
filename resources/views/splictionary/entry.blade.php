@extends('splictionary.wrapper')
@section('content')
<div class="row">
	<div class="col-12 py-3">
		<div class="row">
			<div class="col-12 col-md-auto" vocab="http://schema.org/">
				<div typeof="DefinedTermSet Word"><h1 ><x-spliction-mechanic :first-word-part="$spliction->spliction_parts->first_word_part" :second-word-part="$spliction->spliction_parts->second_word_part" :spliction="$spliction->word_splice"/></h1></div>
				<h2>{{$spliction->pronunciation or ""}}</h2>
					<ul class="share-buttons mt-3" data-source="simplesharingbuttons.com">
  					<li><a href="https://www.facebook.com/sharer/sharer.php?u=&quote=" title="Share on Facebook" target="_blank" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&quote=' + encodeURIComponent(document.URL)); return false;"><img alt="Share on Facebook" src="/images/flat_web_icon_set/color/Facebook.png" /></a></li>
  					<li><a href="https://twitter.com/intent/tweet?source=&text=:%20" target="_blank" title="Tweet" onclick="window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(document.title) + ':%20'  + encodeURIComponent(document.URL)); return false;"><img alt="Tweet" src="/images/flat_web_icon_set/color/Twitter.png" /></a></li> 
				</ul>
			</div>
			<div class="col">
				<div class="row">
				@foreach ( $wordAPI as $word )
					<div class="col-12 mt-3 col-md-6">
						<div class="card small-text">
						  <div class="card-body">
						    <h5 class="card-title">{{$word->word ?? ""}}</h5>
						    @isset($word->pronunciation)
						    	@isset($word->pronunciation->all)
						    		<h6 class="card-subtitle mb-2 text-muted">{{$word->pronunciation->all}}</h6>
						    	@endisset
						    <p class="card-text">{{$word->results[0]->partOfSpeech ?? ""}}<br/>{{$word->results[0]->definition ?? ""}}</p>
						    @endisset
						  </div>
						</div>
					</div>
				@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-md-8 definitions__list--last-child">
		@if(count($definitions) > 0)
		@foreach($definitions as $definition)
		<div class="row border-bottom pt-3 @if($loop->last)last @elseif($loop->first)first @endif">
			<div class="col-1">
				<h2>{{$loop->index+1+(($definitions->currentPage()-1)*$definitions->perPage())}}.</h2>
			</div>
			<div class="col-9 col-md-10">
				<h6 class="text-secondary">{{$typesOfWords[$definition->type_of_word] }}</h6>
		    	{!!$definition->sanitisedDefinition!!}
			</div>
			<div class="col-2 col-md-1">
				<div class="row voting">
					<div class="col-6">
						<span class="text-center vote" data-vote="1" data-spliction_id="{{$spliction->id}}" data-definition_id="{{$definition->id}}" data-session_token="{{$session_token}}" >
							<i class="fas fa-arrow-up"></i><span class="badge badge-success">{{$definitionVotes[$definition->id]['votesUp'] ?? "0"}}</span>
						</span>
					</div>
					<div class="col-6">
						<span class="text-center vote" data-vote="0" data-spliction_id="{{$spliction->id}}" data-definition_id="{{$definition->id}}" data-session_token="{{$session_token}}">
							<i class="fas fa-arrow-down"></i><span class="badge badge-danger">{{$definitionVotes[$definition->id]['votesDown'] ?? "0"}}</span>
						</span>
					</div>
				</div>
			</div>
		</div>
		@endforeach
		<div class="row">
			<div class="col-12 p-3 ">
				{{ $definitions->links() }}
			</div>
		</div>
		@else
		<div class="row">
			<div class="col pt-5">
				<span class="display-5">Psst ... Looks like no-one has defined <b>{{strtolower($spliction->word_splice)}}</b>, do us a favor and <a href="{{route("spliction.define",['spliction'=>$spliction->word_splice])}}">add a definition</a></span>
			</div>
		</div>
			
		@endif
	</div>
	<div class="col-12 col-md-4">

		
	</div>
</div>
<div class="row py-3">
	<div class="col-8">
		@if(count($definitions)>0)
		<a class="btn btn-splorange" href="{{route("spliction.define",['spliction'=>$spliction->word_splice])}}">Add definition</a>
		@endif
	</div>
	<div class="col-4">
	</div>
</div>
@stop