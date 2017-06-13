@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					Edit Article
				</div>
				<form action="/articles/{{$articles->id}}" method="post">
				
				{{ method_field('PUT') }}
				
				{{ csrf_field() }}
				
				<input type="hidden" name="user_id" value="{{Auth::User()->id}}">
				<div class="panel-body">
					<div class="form-group">
						<label for="content">Content</label>

						<textarea  name="content" class="form-control"> {{$articles->content}} </textarea>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="published" {{$articles->published == 1 ? 'checked' : '' }}>
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
				
			</div>
			
		</div>		
	</div>

@endsection