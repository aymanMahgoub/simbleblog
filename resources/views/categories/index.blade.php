@extends('layouts.app')

@section('content')
	<div class="row col-md-6 col-md-offset-4">

		<a href="categories/create" class="btn btn-primary">Add new Category</a>
            <br><br>
	</div>
	<div class="row">
		@forelse($categories as $category)
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<span>{{$category->user_name}}</span>
					<span class="pull-right"> {{$category->created_at->diffForHumans()}}</span>
				</div>
				
				<div class="panel-body">

					{{ $category->name }}
					
					@if($category->user_id == Auth::User()->id)
					<form action="/categories/{{$category->id}}" method="POST" class="pull-right" style="margin-left: 25px">		
					{{ method_field('DELETE') }}	
					{{ csrf_field() }}
						<button class="btn btn-danger btn-sm" ><i class="zmdi zmdi-delete zmdi-hc-2x red-text"></i></button>
					</form>

					<a href="/categories/{{$category->id}}/edit" class="pull-right"><i class="zmdi zmdi-edit zmdi-hc-2x white-text"></i></a>
					@endif
				</div>	
			</div>
			
		</div>
		@empty
		<div class="row">
		<div class="col-md-6 col-md-offset-6">
		<span > NO categories found !! </span>
		</div>
		</div> 
		@endforelse	

	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			{{$categories->links()}}
		</div>
	</div>

@endsection