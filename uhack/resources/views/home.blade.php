@extends('layouts.app')

@section('content')

	<div class="flex-center position-ref full-height">

		<div class="panel-default panel"> 
			<div class="panel-header">
				Total Cash Received
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
				Total Cash Sent
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
		<h2>Expenses</h2>
		<div class="col-md-6 col-md-offset-4">
			<ul>
			@forelse(Auth::user()->expenses as $expense)
				<li>Paid {{$expense->amount}} to {{ $expense->receiving_user->name }} for {{ $expense->description }} on {{ $expense->transaction_date }}</li>
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
				<li>Received {{$income->amount}} from {{ $income->spending_user->name }} for {{ $income->description }} on {{ $income->transaction_date }}</li>
			@empty
				<li>No income</li>
			@endforelse
			</ul>
		</div>
	</div>
@endsection