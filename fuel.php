<?php
	$response = array();
	session_start();

	if (isset($_POST["action"]) && $_POST["action"] == "addFuelQuote") {
		$gallons = htmlspecialchars($_POST["gallons"]);
		$date = htmlspecialchars($_POST["date"]);
		$suggested = htmlspecialchars($_POST["suggested"]);
		$total = htmlspecialchars($_POST["total"]);
		
		addFuelQuote($gallons, $date, $suggested, $total);
		
	}
	if (isset($_POST["action"]) && $_POST["action"] == "getHistory") {

		getHistory();
	
	}
	
	function addFuelQuote($gallons, $date, $suggested, $total)
	{
		include 'config.php';
		GLOBAL $response;

		$userid = $_SESSION['id'];
		$address = $_SESSION['address'];

		$stmt = $con->prepare("INSERT INTO `fuelquote`(`userid`, `gallons_requested`, `delivery_address`, `delivery_date`, `suggested_price`, `total_amount`) VALUES (?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssss", $userid, $gallons, $address, $date, $suggested, $total);

		if ($stmt->execute()) {
			$response['message'] = "Fuel Quote Added successfully";
			$response['status'] = "success";
			

		}else{
			
			$response['message'] = "Unable to add Fuel Quote.";
			$response['status'] = "failed";

		}
	}
	function getHistory(){
		include 'config.php';
		GLOBAL $response;
		$userid = $_SESSION['id'];

		$query  = "SELECT id, gallons_requested, delivery_address, delivery_date, suggested_price, total_amount FROM fuelquote WHERE userid = '$userid'";
		$statement = $db->prepare($query);
		 $output = '
		    <div class="table-responsive" id="assignment-table">
		        <table class="table table-bordered table-striped" id="table_questions">
		            <tr id="tr_title">
		                <th width="20%">Gallons Requested.</th>
		                <th width="35%">Delivery Address</th>
		                <th width="15%">Delivery Date</th>
		                <th width="15%">Suggested Price</th>
		                <th width="15%">Total Amount</th>
		                
		            </tr>

		    ';

        if ($statement->execute()) {
            $result = $statement->fetchAll();
            $fetch_results = mysqli_query($con, $query);
            $result_row = mysqli_fetch_array($fetch_results, MYSQLI_ASSOC);
            if($result_row){
                
                foreach ($result as $row) {
                	$id = $row["id"];
                	$gallons_requested = $row["gallons_requested"];
                	$delivery_address = $row["delivery_address"];
                	$delivery_date = $row["delivery_date"];
                	$suggested_price = $row["suggested_price"];
                	$total_amount = $row["total_amount"];

                	$output .= '
                        <tr class="tr_body">
                            <td align="right">'.$gallons_requested.'</td>
                            <td align="right">'.$delivery_address.'</td>
                            <td align="right">'.$delivery_date.'</td>
                            <td align="right">'.$suggested_price.'</td>
                            <td align="right">'.$total_amount.'</td>
                      
                        </tr>
                   
                        ';

                }
                $output .= '</table></div>';
                $response['output'] = $output;
				$response['message'] = "success";
            }else{
            	$output .= '
                    <tr>
                        <td colspan="5" align="center">No record found at the moment.</td>
                    </tr>
                    ';
                    $output .= '</table></div>';
                $response['output'] = $output;

            	$response['message'] = "none";
            }
        }else{
        	$output .= '
                    <tr>
                        <td colspan="5" align="center">No record found at the moment.</td>
                    </tr>
                    ';
            $output .= '</table></div>';
            $response['output'] = $output;

        	$response['message'] = "none";
        }
    }


	echo json_encode($response);

?>