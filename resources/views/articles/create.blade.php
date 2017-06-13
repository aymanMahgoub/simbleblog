@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					Create Article
				</div>
				@if($categoryCount > 0)
				<form action="/articles" method="post">
				{{ csrf_field() }}
				<input type="hidden" name="user_id" value="{{Auth::User()->id}}">
				<input type="hidden" name="user_name" value="{{Auth::User()->name}}">
				<div class="panel-body">
					<div class="form-group">
						<label for="content">Content</label>
						<textarea  name="content" class="form-control"></textarea>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="published">
							Published 
						</label>
					</div>
					<div class="form-group">
						<select class="form-control" name="category_id">
							@foreach($categories as $category)
                            	<option value="{{$category->id}}">{{$category->name}}</option>
                        	@endforeach
                        </select>
						
					</div>

					<input type="submit" name="" class="btn btn-success pull-right" >
				</div>
				</form>	
				@else
					<div class="row">
						<div class="col-md-6 col-md-offset-1">
							<span > NO categories found please add category first !! </span>
						</div>
					</div> 

				@endif				
			</div>
			
		</div>		
	</div>

@endsection