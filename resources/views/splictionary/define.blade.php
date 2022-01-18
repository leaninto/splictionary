@extends('splictionary.wrapper')
@section('title', "home page")
@section('content')
			<h1>{{$spliction->word_splice}}</h1>
			<form method="post" id="spliction-define" action="{{route('spliction.define')}}/{{$spliction->word_splice}}">
				@csrf
				<div class="row">
					<div class="col-9">
						@if ( $errors->any())
		    			<div class="alert alert-danger">
			        		<ul>
			            		@foreach ($errors->all() as $error)
			                		<li>{{ $error }}</li>
			            		@endforeach
			        		</ul>
		    			</div>
						@endif
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label for="typeOfSpeachSelect">Type of speach</label>
								    <select class="form-control" id="typeOfSpeachSelect" name="type_of_word">
								    	@foreach($typesOfWords as $typeOfWordKey => $typeOfWordValue)
								    		<option value="{{$typeOfWordKey}}">{{$typeOfWordValue}}</option>
								    	@endforeach
								    </select>
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label for="definitionTextArea">Definition</label>
									<textarea class="form-control" name="definition" id="definitionTextArea" rows=3></textarea>
								</div>
								<p><span class="text-danger">Attention!</span> Currently splictionary is in a beta phase, during this phase definitions are limited to styled text only.</p>

							</div>
							<div class="col-12">
								
							</div>
							<div class="col-12">
								<button type="submit" class="btn btn-splorange g-recaptcha" 
								type="submit"/>Submit</button>
								<a class="btn btn-splpink" href="{{route('spliction.entry',['spliction'=>$spliction->word_splice])}}" >Cancel</a>
							</div>
						</div>
					</div>
					<div class="col-3">
					</div>
					<script>
						tinymce.init({
						  selector: 'textarea',
						  menubar: false,
						  statusbar: false,
						  plugins: "image link",
						  content_css: '/css/tiny-app.css',
						  toolbar1: 'undo redo | styleselect | bold italic | link image',
						  toolbar2: 'alginleft aligncenter alignright'
						});
					</script>

				</div>
			</form>
@stop