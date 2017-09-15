@extends('layouts.app')


@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<span>Posted by {{ $post->user->name}}</span>
					<span class="pull-right">{{ $post ->created_at ->diffForHumans() }}</span>
				</div>
				<div class="panel-body">
					{{ $post->content }}
				</div>
				<div class="panel-footer clearfix" style="background-color: #fff;">
					<a href="#" class="pull-right">Like</a>
				</div>
			</div>
		</div>
	</div>
@endsection