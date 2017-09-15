@extends('layouts.app')


@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel-body panel-default">
				<form action="/posts/{{ $post->id }}" method="post">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
					<textarea name="content" class="form-control">{{ $post->content }}</textarea>
					<input type="submit" class="btn btn-success pull-right" value="Rant" />
				</form>
			</div>
		</div>
	</div>
@endsection