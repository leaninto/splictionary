@extends("splictionary.wrapper")
@section('content')
<div class="row">
	<div class="col mb-3">
		<span class="display-1">Uh ooh, I think you;ve broken something.</span>
		<a href="{{url(route('home'))}}"><span class="display-4">Off you pop!</span></a>
	</div>
</div>
<div class="row">
	<div class="col">
		<div style="width:100%;height:0;padding-bottom:100%;position:relative;"><iframe src="https://giphy.com/embed/hpF9R9M1PHN5e5liSx" width="100%" height="100%" style="position:absolute" frameBorder="0" class="giphy-embed" allowFullScreen></iframe></div><p><a href="https://giphy.com/gifs/fun-retro-acid-hpF9R9M1PHN5e5liSx">via GIPHY</a></p>
	</div>
</div>
@stop