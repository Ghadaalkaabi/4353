<?php
include_once __DIR__ . '/includes/header.php';
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-5 mx-auto">
			<div class="card p-3 mt-4">
				<h2>Login</h2>
				<form method="post" action="#">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
					</div>
					<button id="login" class="btn btn-primary">Login</button>
					<h3>Or</h3>
					<a href="signup.php">Signup</a>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$("#login").click(function(e) {
		e.preventDefault();

		var username = $("#username").val();
		var password = $("#password").val();

		if (username != "") {
			if (password != "") {
				$.ajax({
					type: "POST",
					data: {
						action: "userLogin",
						username: username,
						password: password
					},
					url: "api.php",
					success: function(response) {
						var dataArray = JSON.parse(response);
						if (dataArray.message == "failed") {
							alert("Invalid Username or Password.");
						} else {
							if (dataArray.profile == "false") {
								window.location.href = "profile.php";
							} else {
								window.location.href = "fuel.php";
							}
						}
					}
				});

			} else {
				alert("Password can't be empty");
			}
		} else {
			alert("Username can't be empty");
		}

	});

	$("#signup").click(function() {
		window.location.href = "signup.php";
	});
</script>

<?php
include_once __DIR__ . '/includes/footer.php';
?>