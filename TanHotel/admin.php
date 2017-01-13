<?php include('includes/header.html'); ?>
<?php include('includes/headerAdmin.html'); ?>

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<script type="text/javascript">
$(function() {
	$("#tabs").tabs();
});
</script>

<div class="space">
</div>

<div class="page">
	<!-- ==== START MAIN ==== -->
	<main role="main">
		<div id="tabs">
			<ul>
				<li><a href="#tabs-1">1</a></li>
				<li><a href="#tabs-2">2</a></li>
			</ul>
			<div id="tabs-1">
				<form action="queries/queryAdmin1.php" method="get">

					<fieldset>
						<legend>Calculate the total bill amount according to the guest ID (includes food, facility and stay)</legend>
						<p>
							SELECT guestid, sum(Total)<br>
							FROM (SELECT guestid, SUM(cost * qty) as Total <br>
							FROM (SELECT food.type, food.rate as cost, orders.quantity as qty, orders.guest_id as guestid<br>
							FROM food JOIN orders <br>
							WHERE orders.guest_id = ???? and food.food_id = orders.food_id) as T UNION<br>
							SELECT guestid, cost1 as Total <br>
							FROM (SELECT facility.type as ftype, facility.rate as cost1, facility_used.guest_id as guestid <br>
							FROM facility JOIN facility_used <br>
							WHERE facility_used.guest_id = ???? and facility_used.facility_id = facility.facility_id) as U UNION<br>
							SELECT guestid, sum((cost2/100.0)*days) as Total <br>
							FROM (select guest_id as guestid, rate as cost2, datediff(check_out_date,check_in_date) as days<br>
							FROM room<br>
							WHERE guest_id = ????) as V) as Z
						</p>
						<p>
							<label>Guest ID: </label>
							<input name="input" type="text">
						</p>

						<p>
							<input type="submit" value="Submit">
						</p>
					</fieldset>
				</form>
			</div>
			<div id="tabs-2">
				<form action="queries/queryAdmin2.php" method="get">

					<fieldset>
						<legend>Particular guest stay no. of days and dates</legend>
						<p>
							SELECT guestid, stayperiod<br>
							FROM (SELECT guest_id as guestid, datediff(check_out_date, check_in_date) as stayperiod<br>
							FROM room<br>
							WHERE guest_id = ??????) as T

						</p>
						<p>
							<label>Guest ID: </label>
							<input name="input" type="text">
						</p>

						<p>
							<input type="submit" value="Submit">
						</p>
					</fieldset>
				</form>
			</div>
		</div><!--end tab-->
	</main>
	<!-- end main -->

</div>
<!-- end sidebar -->

</div>
<!-- end container -->

<?php include('includes/footer.html'); ?>