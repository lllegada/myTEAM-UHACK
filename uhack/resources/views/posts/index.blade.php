@extends('layouts.app')


@section('content')
	<div class="row">
		

		@forelse($posts as $post)
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					<div class="panel-heading">
						<!-- <span>{{$post->user_id}}</span> -->
						<span>{{$post->user->name}}</span>
						<span class="pull-right">{{ $post->created_at->diffForHumans() }}</span>
					</div>
					<div class="panel-body">
						<div>
							{{ substr($post->content, 0, 100) }}...
							<a href="/posts/{{ $post->id}}">Read more</a>
						</div>
					</div>
					<div class="panel-footer clearfix" style="background-color: #fff;">
						<a href="#" class="pull-right">Like</a>
					</div>
						<!-- <span>{{ $post->user->name }}</span>
						<span class="pull-right">{{ $post->created_at->diffForHumans() }}</span>
					</div>
					<div class="panel-body panel-default">
						{{ $post->content }}
					</div>
					<div class="panel-footer clearfix">
						<a href="#" class="pull-right">Hear, hear!</a> -->
				<!-- 	</div>
				</div>
			</div> -->
				</div>
			</div>
			
		@empty
			No results found
		@endforelse
		<div class="col-md-6 col-md-offset-3">
			<div class="panel-body">
				{{ $posts->links() }}
			</div>
		</div>
	</div>
@endsection