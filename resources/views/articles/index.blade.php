@extends('layouts.app')

@section('content')
	
	<div class="row col-md-6 col-md-offset-4">

		<a href="articles/create" class="btn btn-primary">Add new Article</a>
            <br><br>
	</div>	

	<div class="row">
		@forelse($articles as $article)
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<span>{{$article->user_name}}</span>
					<span class="pull-right"> {{$article->created_at->diffForHumans()}}</span>
				</div>
				
				<div class="panel-body">
					{{ $article->ShortContent}}
					<a href="/articles/{{$article->id}}">Read More</a>
				</div>
				
				<div class="panel-footer clearfix" style="background-color: white ">
					@if($article->user_id == Auth::id())
						<form action="/articles/{{$article->id}}" method="POST" class="pull-right" style="margin-left: 25px  ">
							
				{{ method_field('DELETE') }}
				
				{{ csrf_field() }}
							<button class="btn btn-danger btn-sm">Delete</button>
							
						</form>


					@endif

					<i  class="fa fa-heart pull-right"></i></div>
					
			</div>
			
		</div>
		@empty
			<div class="row">
				<div class="col-md-6 col-md-offset-6">
					<span > NO Articles Found !! </span>
				</div>
			</div> 
		@endforelse	

	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			{{$articles->links()}}
		</div>
	</div>

@endsection
