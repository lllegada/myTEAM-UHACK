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
		<h2>Expenses</h2>
		<div class="col-md-6 col-md-offset-4">
			<ul>
			@forelse(Auth::user()->expenses as $expense)
				<li>{{ $expense->description }} on {{ $expense->transaction_date }}</li>
			@empty
				<li>No Expenses.</li>
			@endforelse
			</ul>
		</div>
	</div>

	<div class="row">
		<h2>Income</h2>
		<div class="col-md-6 col-md-offset-4">
			<ul>
			@forelse(Auth::user()->income as $income)
				<li>{{ $income->description }} on {{ $income->transaction_date }}</li>
			@empty
				<li>No income</li>
			@endforelse
			</ul>
		</div>
	</div>
@endsection