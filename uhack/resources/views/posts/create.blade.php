@extends('layouts.app')


@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel-body panel-default">
				<form action="/posts" method="post">
					{{ csrf_field() }}
					<input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
					<textarea name="content" class="form-control"></textarea>
					<input type="submit" class="btn btn-success pull-right" value="Rant" />
				</form>
			</div>
		</div>
	</div>
@endsection