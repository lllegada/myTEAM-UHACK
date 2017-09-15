@extends('layouts.app')

@section('content')
	<div class="col-md-10 col-md-offset-1 col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Debit</h3>
			</div>
			<ul class="list-group">
				@forelse($expenses as $expense)
					<li class="list-group-item transaction" id="transaction_{{ $expense->id }}">
						<div class="row">
							<div class="col-md-4 col-sm-4 name">{{ $expense->receiving_user->name }}</div>
							<div class="col-md-3 col-sm-3 description">{{ $expense->description }}</div>
							<div class="col-md-3 col-sm-3 amount">{{ $expense->amount }}</div>
							<div class="col-md-2 col-sm-2">
								<button class="btn btn-success pay_transaction" id="pay_transaction_{{ $expense->id }}">Pay</button>
							</div>
							<!-- <input type="text" name="description" value="{{ $expense->description }}" placeholder="Description" /> -->
							<!-- in the amount of Php<input type="number" name="amount" value="{{ $expense->amount }}" min="100" /> -->
						</div>
					</li>
				@empty
					<li class="list-group-item">You have no debits.</li>
				@endforelse
			</ul>
			<div class="panel-footer">
				<button type="button" class="btn btn-success btn-right" id="add_debit" data-toggle="modal" data-target="#debit_modal">Add Debit</button>
			</div>
		</div>
	</div>
@endsection
@include('modal')
@push('scripts')
	<script type="text/javascript" src="{{ asset('js/transaction_functions.js') }}"></script>
@endpush