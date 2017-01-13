<?php include('includes/header.html'); ?>
<?php include('includes/headerGuest.html'); ?>

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<script type="text/javascript">
$(function() {
	$("#tabs").tabs();
});
</script>
<script type="text/javascript" src="js/programs.js"></script>

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
				<form action="queries/queryGuest1.php" method="get">

					<fieldset>
						<legend>Room Availability</legend>
						<p>
							SELECT CASE WHEN CURRENT_DATE > room.check_out_date<br> 
							THEN 'Available' ELSE 'Not Available' END<br>
							FROM room where room.room_number = ??????
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
				<div id="output"></div>
			</div>
			<div id="tabs-2">
				<form action="queries/queryGuest2.php" method="get">

					<fieldset>
						<legend>Rooms available after a certain date</legend>
						<p>
							SELECT room_number AS Room, type AS Type, rate AS 'Rate in $', check_out_date AS 'Will be free on'<br> 
							FROM room<br> 
							WHERE check_out_date >= YYYY/MM/DD<br> 
							ORDER BY check_out_date<br> 
						</p>
						<p>
							<label>Date: </label>
							<input name="input" type="text">
						</p>

						<p>
							<input type="submit" value="Submit">
						</p>
					</fieldset>
				</form>
			</div>
			<div id="tabs-3">
				<form action="queries/queryGuest3.php" method="get">

					<fieldset>
						<legend>For a given guest id, find out which company he/she belongs to and that company’s location if present. Further, find out that guest’s room number</legend>
						<p>
							SELECT company.company_name, company.location, room.room_number<br> 
							FROM company, company_member, room<br>
							WHERE company.guest_id = room.guest_id <br>
							AND company.company_name =company_member.company_name <br>
							AND room.guest_id = ???
						</p>
						<p>
							<label>Guest id: </label>
							<input name="input" type="text">
						</p>

						<p>
							<input type="submit" value="Submit">
						</p>
					</fieldset>
				</form>
			</div>
			<div id="tabs-4">
				<form action="queries/queryGuest4.php" method="get">

					<fieldset>
						<legend>Different facilities provided by hotel</legend>
						<p>
							SELECT DISTINCT type from facility 
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