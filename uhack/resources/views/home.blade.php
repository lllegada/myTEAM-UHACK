@extends('layouts.app')

@section('content')

	<div class="flex-center position-ref full-height">

		<div class="panel-default panel"> 
			<div class="panel-header">
				Total Credit
			</div>
			<div class="panel-body">
				<!--- Pie Graph, then link to breakdown  -->
				<div class="">
					
				</div>
				<div class="">
				</div>
			</div>
		</div>

		<div class="panel-default panel"> 
			<div class="panel-header">
				Total Debit
			</div>
			<div class="panel-body">
				<!--- Pie Graph, then link to breakdown -->
				<div class="">
					
				</div>
				<div class="">
				</div>
			</div>
		</div>

		<div class="panel-defaul panel"> 
			<div class="panel-header">
				Current Balance
			</div>
			<div class="panel-body">
				<!--- Bar Graph  -->
			</div>
		</div>

	</div>

	<div class="row">
		<h2>Debit</h2>
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
		<h2>Credit</h2>
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