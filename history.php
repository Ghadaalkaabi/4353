<?php
include_once __DIR__ . '/includes/header.php';

$history = getQuoteHistory($_SESSION['id']);
?>

<div class="container">
	<div class="row">
		<div class="col-md-7 mx-auto">
			<div class="card p-3">
				<h2>Fuel Quote History</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Delivery Date</th>
							<th>Address</th>
							<th>Gallons</th>
							<th>Price</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($history as $quote) { ?>
							<tr>
								<td><?php echo $quote['delivery_date']; ?></td>
								<td><?php echo $quote['delivery_address']; ?></td>
								<td><?php echo $quote['gallons_requested']; ?></td>
								<td><?php echo $quote['suggested_price']; ?></td>
								<td><?php echo $quote['total_amount']; ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php
include_once __DIR__ . '/includes/footer.php';
?>