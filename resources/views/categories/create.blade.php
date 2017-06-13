@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					Create category
				</div>
				<form action="/categories" method="post">
				{{ csrf_field() }}
				<input type="hidden" name="user_name" value="{{Auth::User()->name}}">
				<input type="hidden" name="user_id" value="{{Auth::User()->id}}">
				<div class="panel-body">
					<div class="form-group">
						<label for="content">Category Name</label>
						<input type="text" name="name" class="form-control">
					</div>
					<input type="submit" name="" class="btn btn-success pull-right" >
				</div>
				</form>	
				
			</div>
			
		</div>		
	</div>

@endsection