@extends('layouts.app')

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-4">
			<div class="panel-body panel-default text-center">
				<img class="profile-img" src="/img-uploads/profile-pic.png">
				<h1>{{ Auth::user()->name }}<i>({{ Auth::user()->username }})</i></h1>
				<h4>{{ Auth::user()->email }}</h4>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6 col-md-offset-4">
			
		</div>
	</div>
@endsection