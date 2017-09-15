@extends('layouts.app')


@section('content')
	<div class="row">
		

		@forelse($posts as $post)
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					<div class="panel-heading">
						<span>{{ $post->content }}</span>
						
					</div>
					<div class="panel-body panel-default">
						{{ $post->title }}
					</div>
					<div class="panel-footer clearfix">
						<a href="#" class="pull-right">Hear, hear!</a>
					</div>
				</div>
			</div>
			
			
		@empty
			No results found
		@endforelse
		
	</div>
	<!-- <div class="row">
	<span>
		$post->about->content
	</span>
	</div> -->
@endsection