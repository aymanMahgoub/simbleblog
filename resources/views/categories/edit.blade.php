@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					Edit Category
				</div>
				<form action="/categories/{{$category->id}}" method="post">
				
				{{ method_field('PUT') }}
				
				{{ csrf_field() }}
				
				<div class="panel-body">
					<div class="form-group">
						<label for="content">Name</label>
						<input type="text" name="name" value="{{$category->name}}" class="form-control">
					</div>
					
					<input type="submit" name="" class="btn btn-success pull-right" >
				</div>
				</form>	
				
			</div>
			
		</div>		
	</div>

@endsection