// $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN' : $('input[name="_token"]').val()
//     }
// });

$(document).ready(function(){
	$(document).on("click", ".edit_transaction", edit_transaction);
	$(document).on("click", "#update_transaction", update_transaction);
	$(document).on("click", "#confirm_add", add_debit);
	$(document).on("click", ".pay_transaction", pay_transaction);
	// $(document).on("click", ".pay_transaction", pay_transaction);
});

function pay_transaction(e){
	e.preventDefault();
	var formData = new FormData();
	var description = $.trim($(this).parent().siblings(".description").text());
	var amount = $.trim($(this).parent().siblings(".amount").text());
	var to_user = $(this).parent().parent().parent().attr("data-toUser");
	formData.append("_token", $('input[name="_token"]').val());
	formData.append("debit_description", description);
	formData.append("debit_amount", amount);
	formData.append("to_user", to_user);
	for (var pair of formData.entries()){
		console.log(pair[0]+', '+pair[1]);
	}
	$("#loading").modal("show");
	$.ajax({
		method: 'POST',
		url: "/transact",
		data: formData,
		processData: false,
		contentType: false,
		success: function(data){
			var message = data[0].split("|");
			$("#loading").modal("hide");
			$("#debit_message").modal({keyboard:true});
			$("#debit_message").find(".modal-header").html(message[0]);
			$("#debit_message").find(".modal-body").html(message[1]);
			$("#debit_message").modal('show');
			$(".transaction-list").html(data[1]);
			$(".available_balance").html("<h3>Current Balance: "+data[2]+"</h3>");
			$(".current_balance").html("<h3>Available Balance: "+data[3]+"</h3>");
			console.log(data[2]);
		},
		error: function(data){
			console.log(data.responseText);
		}
	})
}

function add_debit(e){
	e.preventDefault();
	var formData = new FormData($("#add_debit_form")[0]);
	formData.append("to_user", $("#to_user").val());
	for (var pair of formData.entries()){
		console.log(pair[0]+', '+pair[1]);
	}
	$("#debit_confirm").modal("hide");
	$("#debit_modal").find("#debit_description").val("");
	$("#debit_modal").find("#debit_amount").val("");
	$("#debit_modal").modal("hide");
	$("#loading").modal("show");
	$.ajax({
		method: 'POST',
		url: "/transact",
		data: formData,
		processData: false,
		contentType: false,
		success: function(data){
			var message = data[0].split("|");
			$("#loading").modal("hide");
			$("#debit_message").modal({keyboard:true});
			$("#debit_message").find(".modal-header").html(message[0]);
			$("#debit_message").find(".modal-body").html(message[1]);
			$("#debit_message").modal('show');
			$(".transaction-list").html(data[1]);
			$(".available_balance").html("<h3>Current Balance: "+data[2]+"</h3>");
			$(".current_balance").html("<h3>Available Balance: "+data[3]+"</h3>");
			console.log(data[2]);
		},
		error: function(data){
			console.log(data.responseText);
		}
	});
}

function update_transaction(){
	var item_id = "#transaction_"+$(this).attr("data-id");
	var description = $(this).parent().siblings(".modal-body").find("#description").val();
	var amount = $(this).parent().siblings(".modal-body").find("#amount").val();
	$(item_id).find(".description").html(description);
	$(item_id).find(".amount").html(amount);
	$("#transaction_modal").modal('hide');
}

function edit_transaction(){
	$("#transaction_modal").modal({keyboard:true});
	var description = $(this).parent().parent().find(".description").text();
	var amount = $(this).parent().parent().find(".amount").text();
	var name = $(this).parent().parent().find(".name").text();
	var id = $(this).parent().parent().parent().attr("id").split("_")[1];
	$("#transaction_modal").find("#description").val($.trim(description));
	$("#transaction_modal").find("#amount").val($.trim(amount));
	$("#transaction_modal").find(".modal-header").html("<h4>"+$.trim(name)+"</h4>");
	$("#transaction_modal").find("#update_transaction").attr("data-id",id);
	$("#transaction_modal").modal('show');
}