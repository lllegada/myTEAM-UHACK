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
					PHP {{ $total_income }}
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
					PHP {{ $total_expense }}
				</div>
				<div class=""></div>
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

		<div class="panel-defaul panel"> 
			<div class="panel-header">
				MONTHS
			</div>
			<div class="panel-body">
				<div >
					<li><a href="/home/1">January</a></li>
					<li><a href="/home/2">Febuary</a></li>
					<li><a href="/home/3">March</a></li>
					<li><a href="/home/4">April</a></li>
					<li><a href="/home/5">May</a></li>
					<li><a href="/home/6">June</a></li>
					<li><a href="/home/7">July</a></li>
					<li><a href="/home/8">August</a></li>
					<li><a href="/home/9">September</a></li>
					<li><a href="/home/10">October</a></li>
					<li><a href="/home/11">November</a></li>
					<li><a href="/home/12">December</a></li>
				</div>
			</div>
		</div>

	</div>

	<div class="row">
		<h2>Debit</h2>
		<div class="col-md-6 col-md-offset-4">
			<ul>
			@forelse($expenses as $expense)
				<li>Paid {{$expense->amount}} to {{ $expense->receiving_user->name }} for {{ $expense->description }} on {{ $expense->transaction_date }}</li>
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
			@forelse($incomes as $income)
				<li>Received {{$income->amount}} from {{ $income->spending_user->name }} for {{ $income->description }} on {{ $income->transaction_date }}</li>
			@empty
				<li>No income</li>
			@endforelse
			</ul>
		</div>
	</div>
@endsection