<div class="modal fade" id="transaction_modal" tabindex="-1" role="dialog" aria-labelledby="transaction_modal_label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header"></div>
			<div class="modal-body">
				<form class="form-horizontal" role="form" autocomplete="off">
					<div class="form-group">
						<div class="col-md-6 col-sm-6">
							<label for="description" class="control-label">Category</label>
							<input type="text" name="description" id="description" class="form-control" placeholder="Category" required="" />
						</div>
						<div class="col-md-6 col-sm-6">
							<label for="amount" class="control-label">Amount</label>
							<input type="number" name="amount" id="amount" class="form-control" min="100" required="" />
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" id="update_transaction">Save Changes</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>	
</div>

<div class="modal fade" id="debit_modal" tabindex="-1" role="dialog" aria-labelledby="debit_modal_label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header"><h4>Add Debit</h4></div>
			<div class="modal-body">
				<form action="" class="form-horizontal" role="form" id="add_debit_form" enctype="multipart/form-data" autocomplete="off">
					{{ csrf_field() }}
					<div class="form-group">
						<div class="col-md-12 col-sm-12">
							<label for="to_user">Recipient</label>
							<select class="form-control" id="to_user">
								@forelse(App\User::allUsers() as $user)
									<option value="{{$user->acc_no}}">{{ $user->name }}</option>
								@empty
									<option>There are no accounts other than yours</option>
								@endforelse
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6 col-sm-6">
							<label for="debit_description" class="control-label">Category</label>
							<input type="text" name="debit_description" id="debit_description" class="form-control" required="" />
						</div>
						<div class="col-md-6 col-sm-6">
							<label for="debit_amount" class="control-label">Amount</label>
							<input type="number" name="debit_amount" id="debit_amount" class="form-control" min="100" required="" />
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success" id="add_debit" data-target="#debit_confirm" data-toggle="modal">Add Debit</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>	
</div>

<div class="modal fade" id="debit_confirm" tabindex="-1" role="dialog" aria-labelledby="debit_confirm_label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Add Debit Confirmation</h4>
			</div>
			<div class="modal-body">
				Adding this transaction will automatically transfer the amount to the recipient. Proceed?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" id="confirm_add">Yes</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="debit_message" tabindex="-1" role="dialog" aria-labelledby="debit_confirm_label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header"></div>
			<div class="modal-body"></div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>