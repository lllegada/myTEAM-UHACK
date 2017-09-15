@extends('layouts.app')

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-4">
			<div class="panel-body panel-default text-center">
				<img class="profile-img" src="/img-uploads/profile-pic.png">
				<h1>{{ $user->name }}<i>({{ $user->username }})</i></h1>
				<h4>{{ $user->email }}</h4>
				<h4>{{ $user->bdate->format('l j F Y') }} ({{ $user->bdate->age}} years old)</h4>
				<input type="submit" class="btn btn-success" value="Follow">
			</div>
		</div>
	</div>

@endsection