<?php
include_once __DIR__ . '/includes/header.php';
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-7 mx-auto">
			<div class="card p-3">
				<h2>Update Profile</h2>
				<form method="post" action="#">
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Enter Full Name" required>
					</div>
					<div class="form-group">
						<label for="address1">Address 1</label>
						<input type="address1" class="form-control" id="address1" name="address1" placeholder="Enter Address 1" required>
					</div>
					<div class="form-group">
						<label for="address2">Address 2</label>
						<input type="address2" class="form-control" id="address2" name="address2" placeholder="Enter Address 2" required>
					</div>
					<div class="form-group">
						<label for="city">City</label>
						<input type="text" class="form-control" id="city" name="city" placeholder="Enter City" required>
					</div>
					<div class="form-group">
						<label for="state">State</label>
						<select class="form-control" id="state" name="state">
							<option value="01">Texas</option>
							<option value="02">Colorado</option>
							<option value="03">Kansas</option>
							<option value="04">Maine</option>
							<option value="05">Others</option>
						</select>
					</div>
					<div class="form-group">
						<label for="zip">Zip Code</label>
						<input type="text" class="form-control" id="zip" name="zip" placeholder="Enter ZIP Code" required>
					</div>
					<button id="update" class="btn btn-primary">Update</button>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$("#update").click(function(e) {
		e.preventDefault();

		var name = $("#name").val();
		var address1 = $("#address1").val();
		var address2 = $("#address2").val();
		var city = $("#city").val();
		var state = $("#state").val();
		var zip = $("#zip").val();
		if (name != "") {
			if (address1 != "") {
				if (city != "") {
					if (zip != "") {
						if (zip.length >= 5 && zip.length <= 9) {
							
							dataItems = {
								action: "updateProfile",
								name: name,
								address1: address1,
								address2: address2,
								city: city,
								state: state,
								zip: zip
							}
							url = "api.php"
							function follow_up_func(data) {
								
								if (!data.status) {
									alert(data.message);
								} else {
									alert(data.message);
									window.location.href = "fuel.php";
								}
								
							}
									
							function follow_up_func_err(dataItems) {
								alert("An error occured while updating your profile")
							}

							send_ajax_req(url, dataItems, follow_up_func, follow_up_func_err)
								
						} else {
							alert("ZIP Code should have a minimum of 5 characters and a maximum of 9 characters");
						}
					} else {
						alert("ZIP Code can't be empty");
					}

				} else {
					alert("City can't be empty");
				}
			} else {
				alert("Address 1 can't be empty");
			}
		} else {
			alert("Name can't be empty");
		}
	});
</script>

<?php
include_once __DIR__ . '/includes/footer.php';
?>