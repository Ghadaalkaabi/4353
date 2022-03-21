<?php
	$response = array();
	session_start();

	if (isset($_POST["action"]) && $_POST["action"] == "getQuote") {
		$gallons = htmlspecialchars($_POST["gallons"]);

		getQuote($gallons);
		
	}


	function getQuote($gallons)
	{
		include 'config.php';
		GLOBAL $response;

		$state = $_SESSION['state'];
		
		$current_price = 1.5;
		$location_factor = 0;
		$rate_history_factor = 0;
		$gallons_requested_factor = 0;
		$company_profit_factor = 0.1;

		if ($state == "01") {
			$location_factor = 0.02;
		}else{
			$location_factor = 0.04;
		}
		if (hasHistory()) {
			$rate_history_factor = 0.01;
		}else{
			$rate_history_factor = 0;
		}
		if ($gallons > 1000) {
			$gallons_requested_factor = 0.02;
		}else{
			$gallons_requested_factor = 0.03;
		}

		$margin = $current_price * ($location_factor - $rate_history_factor + $gallons_requested_factor + $company_profit_factor);
		$suggested_price = $current_price + $margin;
		$total_amount = $gallons * $suggested_price;

		$response['suggested_price'] = $suggested_price;
		$response['total_amount'] = $total_amount;

	}

	function hasHistory(){
		include 'config.php';
		$userid = $_SESSION['id'];
		$sql = $con->prepare("select * from fuelquote where userid = ? limit 1");
        $sql->bind_param("s", $userid);
        $sql->execute();

        $result = $sql->get_result();
        if ($result->num_rows > 0) {
        	return true;
        }else{
        	return false;
        }
	}
	echo json_encode($response);

?>