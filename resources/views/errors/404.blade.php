@extends("splictionary.wrapper")
@section('content')
<?php var_dump($_SERVER)?>
<div class="row">
	<div class="col mb-3">
		<span class="display-1">Yeeeeeah 404</span>
		<a href="{{url(route('home'))}}"><span class="display-4">Off you pop!</span></a>
	</div>
</div>
<div class="row">
	<div class="col">
		<div style="width:100%;height:0;padding-bottom:51%;position:relative;"><iframe src="https://giphy.com/embed/xUPGcfymeBhFrObuqk" width="100%" height="100%" style="position:absolute" frameBorder="0" class="giphy-embed" allowFullScreen></iframe></div><p><a href="https://giphy.com/gifs/3d-art-404-page-boomberg-xUPGcfymeBhFrObuqk">via GIPHY</a></p>
	</div>
</div>
@stop