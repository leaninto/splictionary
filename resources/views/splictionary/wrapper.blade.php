<!DOCTYPE html>
<html>
<head>
	@include('splictionary.head')
</head>
<body>
	@include('splictionary.header')
    <div class="container-fluid">
    	<div class="row">
			<div class="container">
				<div class="container py-4">
					@yield('content')
				</div>
			</div>
		</div>
	</div>
	<footer class="container-fluid bg-splgreen">
		<div class="container py-2 text-center text-white">
				
			<div class="row">
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col">&copy <img src="/img/leaninto-white.svg" width="100px"/> 2020</div>
			</div>
		</div>
	</footer>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<div class="modal fade throttle-modal-sm" tabindex="-1" role="dialog" aria-labelledby="VoteLimit" aria-hidden="true">
	  <div class="modal-dialog modal-sm">
	    <div class="modal-content">
	    	<div class="modal-header">
	    		<h5 class="modal-title">Whoa there cow boy</h5>
	    	</div>
	    	<div class="modal-body">
	    		<p>Getting clicky with it is cool, but we have a limit around these parts</p>
	    	</div>
	    </div>
	  </div>
	</div>
	<div class="modal fade fivezerozero-modal-sm" tabindex="-1" role="dialog" aria-labelledby="VoteLimit" aria-hidden="true">
	  <div class="modal-dialog modal-sm">
	    <div class="modal-content">
	    	<div class="modal-header">
	    		<h5 class="modal-title">Nope</h5>
	    	</div>
	    	<div class="modal-body">
	    		<div style="width:100%;height:0;padding-bottom:58%;position:relative;"><iframe src="https://giphy.com/embed/LRKET0Syb0rDO" width="100%" height="100%" style="position:absolute" frameBorder="0" class="giphy-embed" allowFullScreen></iframe></div><p><a href="https://giphy.com/gifs/LRKET0Syb0rDO">via GIPHY</a></p>
	    		<p>Big ol Five Zero Zero boys</p>
	    		<blockquote>Error Code: Full Face Helmet</blockquote>
	    	</div>
	    </div>
	  </div>
	</div>
	@if(env("APP_DEBUG"))
	@endif
</body>
</html>