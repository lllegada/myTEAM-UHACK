@extends('layouts.app')

@section('content')
	<body>
	<div class="position-ref full-height">

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
			<div class="">
					
				</div>
				<div class="">
				</div>
		</div>

	</div>

	<div class="tbl">
		<h4><span class="glyphicon glyphicon-list"></span> Debit</h4>
		<div class="col-sm-12">
			<ul>
			@forelse(Auth::user()->expenses as $expense)
				<li>Paid {{$expense->amount}} to {{ $expense->receiving_user->name }} for {{ $expense->description }} on {{ $expense->transaction_date }}</li>
			@empty
				<li>No Expenses.</li>
			@endforelse
			</ul>
		</div>
	</div>

	<div class="tbl">
		<h4><span class="glyphicon glyphicon-list"></span> Credit</h4>
		<div class="col-sm-12 tblrw">
			<ul>
			@forelse(Auth::user()->income as $income)
				<li>Received {{$income->amount}} from {{ $income->spending_user->name }} for {{ $income->description }} on {{ $income->transaction_date }}</li>
			@empty
				<li>No income</li>
			@endforelse
			</ul>
		</div>
	</div>
	</body>
@endsection