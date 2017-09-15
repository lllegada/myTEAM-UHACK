@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel-body panel-default">
				<h3>Debit</h3>
				<ul>
					@forelse($expenses as $expense)
						<li>
							<div>
								{{ $expense->receiving_user->name }} for
								<input type="text" name="description" value="{{ $expense->description }}" placeholder="Description" />
								in the amount of Php<input type="number" name="amount" value="{{ $expense->amount }}" min="100" />
								<button class="btn btn-success">Pay</button>
							</div>
						</li>
					@empty
						<li>You have no debits.</li>
					@endforelse
				</ul>
			</div>
		</div>
	</div>
@endsection