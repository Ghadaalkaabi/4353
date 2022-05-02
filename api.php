<?php
header("Contet-type:application/json;charset=utf-8");

include_once __DIR__ . '/includes/functions.php';

if (isset($_POST["action"]) && $_POST["action"] == "addFuelQuote") {

	$gallons = htmlspecialchars($_POST["gallons"]);
	$date = htmlspecialchars($_POST["date"]);
	$suggested = htmlspecialchars($_POST["suggested"]);
	$total = htmlspecialchars($_POST["total"]);
	
	$response = addFuelQuote($gallons, $date, $suggested, $total);
    echo json_encode($response);
}

if (isset($_POST["action"]) && $_POST["action"] == "getHistory") {

	$response = getHistory();
    echo json_encode($response);
}

if (isset($_POST["action"]) && $_POST["action"] == "userLogin") {
	$username = htmlspecialchars($_POST["username"]);
	$password = htmlspecialchars($_POST["password"]);
	$response = userLogin($username, $password);

	echo json_encode($response);
}

if (isset($_POST["action"]) && $_POST["action"] == "registerUser") {
	$username = htmlspecialchars($_POST["username"]);
	$password = htmlspecialchars($_POST["password"]);
	$response = registerUser($username, $password);

	echo json_encode($response);
	
}

if (isset($_POST["action"]) && $_POST["action"] == "getAddress") {
	$response = getAddress();
	echo json_encode($response);
}

if (isset($_POST["action"]) && $_POST["action"] == "getQuote") {
	$gallons = htmlspecialchars($_POST["gallons"]);

	$response = getQuote($gallons);
	
	echo json_encode($response);
}

if (isset($_POST["action"]) && $_POST["action"] == "updateProfile") {
	$name = htmlspecialchars($_POST["name"]);
	$address1 = htmlspecialchars($_POST["address1"]);
	$address2 = htmlspecialchars($_POST["address2"]);
	$city = htmlspecialchars($_POST["city"]);
	$state = htmlspecialchars($_POST["state"]);
	$zip = htmlspecialchars($_POST["zip"]);
	$response = updateProfile($name, $address1, $address2, $city, $state, $zip);
	
	echo json_encode($response);
}