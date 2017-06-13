@extends('layouts.app')

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<span>Article by: {{$articles->user_name}}</span>
					@if($articles->user_id == Auth::id())
					<small>
						<a href="/articles/{{$articles->id}}/edit" class="btn btn-success">Edit </a>
					</small>
					@endif
					<span class="pull-right">{{$articles->created_at->diffForHumans()}}</span>
				</div>
				
				<div class="panel-body">
					{{$articles->content}}
				</div>

				<form action="/comments" method="post">
				{{ csrf_field() }}
				<input type="hidden" name="user_name" value="{{Auth::user()->name}}">
				<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
				<input type="hidden" name="article_id" value="{{$articles->id}}">
				<div class="panel-footer">
					<textarea name="content" id="comment" class="form-control">Write your comment here...
					</textarea>
					<input type="submit" name="" class="btn btn-block btn-xs btn-success pull-right" >
					<br>
				</div>
				</form>
				
				@forelse($comments as $comment)
					<div class="panel-footer">
						
						<span>{{$comment->user_name}} :</span> {{$comment->content}}
						
						@if($comment->user_id == Auth::id())
						<form action="/comments/{{$comment->id}}" method="POST" class="pull-right" style="margin-left: 25px ">
						{{ method_field('DELETE') }}
						<input type="hidden" name="articles_id" value="{{$articles->id}}">
						{{ csrf_field() }}
						<button class="btn btn-danger btn-sm pull-right">Delete</button>	
						</form>
						@endif

					</div>
				@empty

				@endforelse
				
			</div>
			
		</div>
		

	</div>
	
@endsection
