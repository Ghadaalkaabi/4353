<?php
include_once __DIR__ . '/includes/header.php';
?>

<div class="container">
	<div class="row">
		<div class="col-md-6 mx-auto">
			<div class="card p-3">
				<h2>Fill the Fuel Quote Form Below</h2>
				<form method='post' action="profile.html">
					<div class="form-group">
						<label>Gallons Requested</label><br>
						<input class="form-control" type="number" id="gallons" name="gallons" placeholder="Enter Gallons" required>
					</div>
	
					<div class="form-group">
						<label>Delivery Address</label><br>
						<input class="form-control" type="text" id="address" name="address" readonly>
					</div>
	
					<div class="form-group">
						<label>Delivery Date</label><br>
						<input class="form-control" type="date" id="date" name="date" placeholder="Pick Delivery Date" required>
					</div>
	
					<div class="form-group">
						<label>Suggested Price / Gallon</label><br>
						<input class="form-control" type="number" id="suggested" name="suggested" readonly>
	
					</div>
	
					<div class="form-group">
						<label>Total Amount Due</label><br>
						<input class="form-control" type="number" id="total" name="total" readonly>
					</div>
	
	
					<input class="btn btn-success" type="button" id="getQuote" name="getQuote" value="Get Quote">
					<input class="btn btn-primary" type="button" id="submit" name="submit" value="Submit Quote">
				</form>
			</div>
		</div>
	</div>
</div>


<script>
	$(function() {
		dataItems = {
			action: "getAddress"
		}
		url = "api.php"
		function follow_up_func(data) {
			document.getElementById('address').value = data.address;
		}
				
		function follow_up_func_err(dataItems) {
			alert("An error occured while getting your address")
		}

		send_ajax_req(url, dataItems, follow_up_func, follow_up_func_err)
	});

	$("#getQuote").click(function() {
		var gallons = $("#gallons").val();
		var address = $("#address").val();
		var date = $("#date").val();
		if (gallons != "") {
			if (address != "") {
				if (date != "") {
					dataItems = {
						action: "getQuote",
						gallons: gallons
					}
					url = "api.php"
					function follow_up_func(data) {
						
						document.getElementById('suggested').value = data.suggested_price;
						document.getElementById('total').value = data.total_amount;
					}
							
					function follow_up_func_err(dataItems) {
						alert("An error occured while getting the quote")
					}

					send_ajax_req(url, dataItems, follow_up_func, follow_up_func_err)
				}else{
					alert("Please enter the date")
				}
			}else{
				alert("The address value is required")
			}
		}else{
			alert("Please enter the gallons value")
		}
	});

	$("#submit").click(function() {
		var gallons = $("#gallons").val();
		var address = $("#address").val();
		var date = $("#date").val();
		var suggested = $("#suggested").val();
		var total = $("#total").val();
		if (gallons != "") {
			if (date != "") {
				dataItems = {
					action: "addFuelQuote",
					gallons: gallons,
					address: address,
					date: date,
					suggested: suggested,
					total: total
				}
				url = "api.php"
				function follow_up_func(data) {
					
					if (!data.status) {
						alert(data.message);
					} else {
						alert(data.message);
						window.location.href = "history.php";
					}
					
				}
						
				function follow_up_func_err(dataItems) {
					alert("An error occured while submitting your quote")
				}

				send_ajax_req(url, dataItems, follow_up_func, follow_up_func_err)
			}else{
				alert("Please enter the date")
			}
		}else{
			alert("Please enter the gallons value")
		}
	});
</script>

<?php
include_once __DIR__ . '/includes/footer.php';
?>