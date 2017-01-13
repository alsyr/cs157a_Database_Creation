<?php include('includes/header.html'); ?>
<?php include('includes/headerStaff.html'); ?>

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
				<li><a href="#tabs-3">3</a></li>
				<li><a href="#tabs-4">4</a></li>
			</ul>
			<div id="tabs-1">
				<form action="queries/queryStaff1.php" method="get">

					<fieldset>
						<legend>Food order from a particular room number</legend>
						<p>
							SELECT food.type, food.rate as cost, orders.quantity as qty, room.room_number, orders.guest_id as guestid<br> 
							FROM food JOIN orders JOIN room <br> 
							WHERE orders.guest_id =room.guest_id <br> 
							AND food.food_id = orders.food_id<br> 
							AND room.room_number = ?????
						</p>
						<p>
							<label>Room number: </label>
							<input name="input" type="text">
						</p>

						<p>
							<input type="submit" value="Submit">
						</p>
					</fieldset>
				</form>
			</div>
			<div id="tabs-2">
				<form action="queries/queryStaff2.php" method="get">

					<fieldset>
						<legend>Total food bill for a guest id</legend>
						<p>
							SELECT guestid, SUM(cost * qty) as Total<br>
							FROM (SELECT food.type, food.rate as cost, orders.quantity as qty, orders.guest_id as guestid<br>
							FROM food JOIN orders, room<br>
							WHERE orders.guest_id = ???????<br>
							AND room.guest_id =  orders.guest_id<br>
							AND food.food_id = orders.food_id) as T

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
			<div id="tabs-3">
				<form action="queries/queryStaff3.php" method="get">

					<fieldset>
						<legend>Total food bill for a room number</legend>
						<p>
							SELECT roomnum, SUM(cost * qty) as Total <br>
							FROM (SELECT food.type, food.rate as cost, orders.quantity as qty, orders.guest_id as guestid, room.room_number as roomnum<br>
							FROM food JOIN orders JOIN room <br>
							WHERE orders.guest_id = room.guest_id <br>
							AND food.food_id = orders.food_id <br>
							AND room.room_number = ??????) as T
						</p>
						<p>
							<label>Room Number: </label>
							<input name="input" type="text">
						</p>

						<p>
							<input type="submit" value="Submit">
						</p>
					</fieldset>
				</form>
			</div>
			<div id="tabs-4">
				<form action="queries/queryStaff4.php" method="get">

					<fieldset>
						<legend>Find out how many guests use each facility, and the bill for each facility</legend>
						<p>
							SELECT facility.type as ftype, SUM(facility.rate) as FacilityBill, facility.rate as Rate, Count(facility.type) as GuestsUsingFacility <br>
							FROM facility JOIN facility_used <br>
							WHERE facility_used.facility_id = facility.facility_id <br>
							GROUP BY facility.type order by 2 DESC
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