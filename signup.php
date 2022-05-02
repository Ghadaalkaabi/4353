<?php
include_once __DIR__ . '/includes/header.php';
?>

<div class="container">
	<div class="row">
		<div class="col-md-6 mx-auto">
			<div class="card p-3">
				<h2>Sign Up</h2>
				<form action="#" method="post">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
					</div>
					<button id="signup" class="btn btn-primary">Sign Up</button>
					<h3>Or</h3>
					<a href="index.php">Log In</a>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$("#signup").click(function(e) {
		e.preventDefault();
		
		var username = $("#username").val();
		var password = $("#password").val();

		if (username != "") {
			if (password != "") {
				dataItems = {action: "registerUser", 
						username: username, 
						password: password
					}
				url = "api.php"
				function follow_up_func(data) {
					if (!data.status) {
						alert("Unable to register user. "+data.message);
					} else {
						alert("User registered successfully.");
						window.location.href = "index.php";
					}
				}
						
				function follow_up_func_err(dataItems) {
					alert("An error occured while registering you")
				}

				send_ajax_req(url, dataItems, follow_up_func, follow_up_func_err)

			} else {
				alert("Password can't be empty");
			}

		} else { 
			alert("Username can't be empty");
		}
	});
</script>

<?php
include_once __DIR__ . '/includes/footer.php';
?>