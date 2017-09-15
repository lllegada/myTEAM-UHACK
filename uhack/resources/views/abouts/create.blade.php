@extends('layouts.app')


@section('content')
	<form action="/about" method="POST">
					{{ csrf_field() }}
					<input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
					<input type="text" name="title" placeholder="Title"/>
					<textarea name="content" class="form-control"></textarea>
					<input type="submit" class="btn btn-success pull-right" value="Rant" />
	</form>
@endsection