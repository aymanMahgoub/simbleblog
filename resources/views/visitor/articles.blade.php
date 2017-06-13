@extends('layouts.visitor')

@section('content')
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<form action="/visitor/articleByCategory" method="POST">
			{{ csrf_field() }}
			<label for="Category">Category By</label>
			<div class="form-groub">
			<select class="form-control" name="category_id">
				<option selected></option>
				@foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            </div>
            <input type="submit" name="" class="btn btn-success pull-right" >
            </form>
		</div>
	</div>
	<hr>
	<div class="row">
		@forelse($articles as $article)
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<span>{{$article->user_name}}</span>
					<span class="pull-right"> {{$article->created_at->diffForHumans()}}</span>
				</div>
				
				<div class="panel-body">
					{{ $article->ShortContent }}
					<a href="/visitor/articles/{{$article->id}}">Read More</a>
				</div>	
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