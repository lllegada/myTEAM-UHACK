$(document).ready(function(){
	$(document).on("click", ".transaction", edit_transaction);
	$(document).on("click", "#update_transaction", update_transaction);
	$(document).on("click", "#confirm_add", add_debit);
	// $(document).on("click", ".pay_transaction", pay_transaction);
});

function add_debit(e){
	e.preventDefault();
	var formData = new FormData($("#add_debit_form")[0]);
	formData.append("to_user", $("#to_user").val());
	$("#debit_confirm").modal("hide");
	$("#debit_modal").find("#debit_description").val("");
	$("#debit_modal").find("#debit_amount").val("");
	$("#debit_modal").modal("hide");
	$.ajax({
		method: 'POST',
		url: "/transact",
		data: formData,
		processData: false,
		contentType: false,
		success: function(data){
			var message = data.split("|");
			$("#debit_message").modal({keyboard:true});
			$("#debit_message").find(".modal-header").html(message[0]);
			$("#debit_message").find(".modal-body").html(message[1]);
			$("#debit_message").modal('show');
		},
		error: function(data){
			console.log(data.responseText);
		}
	});
}

function update_transaction(){
	var item_id = "#transaction_"+$(this).attr("data-id");
	// console.log($(this).parent().siblings(".modal-body").find("#description").val());
	var description = $(this).parent().siblings(".modal-body").find("#description").val();
	var amount = $(this).parent().siblings(".modal-body").find("#amount").val();
	$(item_id).find(".description").html(description);
	$(item_id).find(".amount").html(amount);
	$("#transaction_modal").modal('hide');
}

function edit_transaction(){
	$("#transaction_modal").modal({keyboard:true});
	var description = $(this).find(".description").text();
	var amount = $(this).find(".amount").text();
	var name = $(this).find(".name").text();
	var id = $(this).attr("id").split("_")[1];
	$("#transaction_modal").find("#description").val($.trim(description));
	$("#transaction_modal").find("#amount").val($.trim(amount));
	$("#transaction_modal").find(".modal-header").html("<h4>"+$.trim(name)+"</h4>");
	$("#transaction_modal").find("#update_transaction").attr("data-id",id);
	$("#transaction_modal").modal('show');
}