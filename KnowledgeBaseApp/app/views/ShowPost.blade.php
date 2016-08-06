<!DOCTYPE html>
<html>
	<head>
		<title>Knowledge Base Application</title>
		<meta charset="utf-8" />
    	<meta content="width=device-width, initial-scale=1.0" name="viewport" />

		<link rel="stylesheet" href="foundation/css/foundation.css">
    	<link rel="stylesheet" href="foundation/css/app.css">
    	<link rel="stylesheet" href="css/knowledgebase.css">
    	<script src="jquery-2.2.0.min.js"></script>
    	
		<script>
			$(document).ready(function(){
			    $("#hide").click(function(){
			        $("section").hide();
			    });
			    $("#show").click(function(){
			        $("section").show();
			    });
			});
		</script>
	</head>
	<body>
		<div class="row">
			<div class="large-12 columns text-center">
				<h1>Knowledge Base App</h1>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<h3><i>Welcome {{ Auth::user()->name }}</i></h3>
			</div>
			<div class="large-6 medium-6 medium-offset-4 large-offset-3 columns text-right">
				<a href="{{ URL::to('logout') }}">Logout</a>
			</div>

			<br><br>
		</div>



		{{ Form::open(array('url' => 'knowledgebase')) }}

			<div class="row" id="title">
    			<div class="large-4 medium-4 small-3 columns text-right">
        			{{ Form::label('title', 'Title:') }}
    			</div>
			    <div class="large-4 medium-4 small-6 columns end">
			        <input placeholder="title" required name="title" type="text" pattern="[a-zA-Z0-9_- ]+" id="title" value="{{ Input::old('title') }}">
				    <p >
				        {{ $errors->first('title') }}
				    </p>
			    </div>
			</div>
			<div class="row" id="post">
			    <div class="large-4 medium-4 small-3 columns text-right">
			        {{ Form::label('post', 'Post:') }}
			    </div>
			    <div class="large-4 medium-4 small-6 columns end">
			        <textarea rows="5" cols="10" placeholder="Post" required name="post" pattern="[a-zA-Z0-9_- ]+" id="post" value="{{ Input::old('post') }}"></textarea>
				    <p>
				        {{ $errors->first('msg') }}
				    </p>
			    </div>
			    
			</div>
			<div class="row" id="button">
				<div class="large-8 medium-4 small-3 columns text-right">
			        <input type="submit" value="Post" class="button">
			    </div>	
   			</div>
		{{ Form::close() }}

		<div style="text-align:center;">
            <button id="hide">Hide Posts</button>
			<button id="show">Show Posts</button>                   
       		
        </div>
        <br><br>


		@foreach($allpost as $post)
		<section id="post">
			<div class="row">
				<div class="large-6 medium-6 medium-offset-3 large-offset-3 columns text-center" style="background-color: green;">

					<?php $uid = $post->u_id ?>
					<?php $pid = $post->p_id ?>
					<h5>{{$post->title}}</h5>
					<p><span>Desc:</span>{{$post->description}}</p>
					<?php $uid = User::where('id', '=', $uid)->first(); ?>
					<?php $cid = Comment::where('p_id', '=', $pid)->get(); ?>
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns end text-right">
					<div class="large-6 medium-6 medium-offset-3 large-offset-3 columns text-right">
						<p><span>Post by: </span><i>{{ $uid->name }}</i></p>
					</div>
				</div>
				<div class="large-12 columns end text-right">
					<div class="large-6 medium-6 medium-offset-3 columns large-offset-3 text-right">
						<p style="color:pink;">Comments</p>
					</div>
				</div>
				@foreach($cid as $comment)
					
					<div class="large-12 columns end text-right">
						<div class="large-6 medium-6 medium-offset-3 columns large-offset-3 text-right">
							 
							<?php $uid = User::where('id', '=', $comment->u_id)->first(); ?>
							<p><span>{{ $uid->name }} </span>Says: {{ $comment->comment }}</p>
						</div>
					</div>

				@endforeach
				
				{{ Form::open(array('action' => array('HomeController@commentPost', $post->p_id))) }}
				<div class="large-2 medium-4 medium-offset-5 large-offset-7 columns end">
					<textarea rows="2" cols="2" name="comment" placeholder="Comment"></textarea>
				</div>
			</div>
			<div class="row">
				<div class="large-2 medium-2 medium-offset-7 large-offset-7 columns small-offset-8 end">
					<input type="submit" value="comment" class="button">
				</div>

			</div>

				{{ Form::close() }}
			<div class="large-6 medium-6 large-offset-3 medium-offset-3 columns end">
				<hr>
			</div>
		</section>	
		@endforeach

	</body>

</html>