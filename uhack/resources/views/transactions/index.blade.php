@extends('layouts.app')

@section('content')
	<div class="col-md-10 col-md-offset-1 col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Debit</h3>
			</div>

			<div class="panel-body">
				<ul class="list-group">
					<li class="list-group-item current_balance">
					<h5>Current Balance: {{Auth::user()->getBalance()["currency"]}} {{round(Auth::user()->getBalance()["avaiable_balance"], 2)}}</h5></li>
					<li class="list-group-item available_balance"><h5>Available Balance: {{Auth::user()->getBalance()["currency"]}} {{round(Auth::user()->getBalance()["current_balance"], 2)}}</h5></li>
				</ul>
				<ul class="list-group transaction-list">
					@forelse($expenses as $expense)
						<li class="list-group-item transaction" id="transaction_{{ $expense->id }}" data-toUser="{{ $expense->to_user }}">
							<div class="row">
								<div class="col-md-4 col-sm-4 name">{{ $expense->receiving_user->name }}</div>
								<div class="col-md-3 col-sm-3 description">{{ $expense->description }}</div>
								<div class="col-md-3 col-sm-3 amount">{{ $expense->amount }}</div>
								<div class="col-md-2 col-sm-2">
									<div class="btn-group" role="group" aria-label="...">
										<button class="btn btn-orange pay_transaction" id="pay_transaction_{{ $expense->id }}"><span class="glyphicon glyphicon-credit-card"></span> Pay</button>
										<button class="btn btn-blue edit_transaction"> <span class="glyphicon glyphicon-edit"></span> Edit</button>
									</div>
								</div>

								<!-- <input type="text" name="description" value="{{ $expense->description }}" placeholder="Description" /> -->
								<!-- in the amount of Php<input type="number" name="amount" value="{{ $expense->amount }}" min="100" /> -->
							</div>
							
						</li>
					@empty
						<li class="list-group-item">You have no debits.</li>
					@endforelse
				</ul>
			</div>
			<div class="panel-footer">
				<button type="button" class="btn btn-green btn-right " id="add_debit" data-toggle="modal" data-target="#debit_modal"><span class="glyphicon glyphicon-plus"></span> Add Debit</button>

			</div>
		</div>
	</div>
@endsection
@include('modal')
@push('scripts')
	<script type="text/javascript" src="{{ asset('js/transaction_functions.js') }}"></script>
@endpush