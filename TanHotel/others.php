<?php include('includes/header.html'); ?>
<?php include('includes/headerOthers.html'); ?>

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
				<li><a href="#tabs-5">5</a></li>
				<li><a href="#tabs-6">6</a></li>
				<li><a href="#tabs-7">7</a></li>
				<li><a href="#tabs-8">8</a></li>


			</ul>
			<div id="tabs-1">
				<form action="queries/queryOther1.php" method="get">

					<fieldset>
						<legend>Find all rooms checked in on a particular day</legend>
						<p>
							SELECT * <br>
							FROM room <br>
							WHERE check_in_date = YYYY/MM/DD
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
			<div id="tabs-2">
				<form action="queries/queryOther2.php" method="get">

					<fieldset>
						<legend>Select senior employees who works for a particular company and whose ages is greater than 40</legend>
						<p>
							SELECT age, company_name<br> 
							FROM company_member <br> 
							WHERE age > 40 <br> 
							AND company_member.company_name = ????????
						</p>
						<p>
							<label>Company name: </label>
							<input name="input" type="text">
						</p>

						<p>
							<input type="submit" value="Submit">
						</p>
					</fieldset>
				</form>
			</div>
			<div id="tabs-3">
				<form action="queries/queryOther3.php" method="get">

					<fieldset>
						<legend>Find the number of checkins that happen each day</legend>
						<p>
							SELECT room.check_in_date as date , count(*) as NumCheckIns <br>
							FROM room <br>
							GROUP BY check_in_date <br>
							ORDER BY 1 desc
						</p>

						<p>
							<input type="submit" value="Submit">
						</p>
					</fieldset>
				</form>
			</div>
			<div id="tabs-4">
				<form action="queries/queryOther4.php" method="get">

					<fieldset>
						<legend>Select all the families who paid by a certain method, along with their names, addresses and total amounts</legend>
						<p>
							SELECT amount, name, address, payment.guest_id<br>
							FROM payment, family<br>
							WHERE method = ?????<br>
							AND payment.guest_id = family.guest_id
						</p>
						<p>
							<label>Payment method: </label>
							<input name="input" type="text">
						</p>

						<p>
							<input type="submit" value="Submit">
						</p>
					</fieldset>
				</form>
			</div>
			<div id="tabs-5">
				<form action="queries/queryOther5.php" method="get">

					<fieldset>
						<legend>select all the companies from a country, along with the type of facility they used and the rate of the facility</legend>
						<p>
							SELECT company_name, company.guest_id, type, rate<br>
							FROM company, facility JOIN facility_used<br>
							WHERE location = ???????<br>
							AND facility_used.guest_id = company.guest_id
						</p>
						<p>
							<label>Country: </label>
							<input name="input" type="text">
						</p>

						<p>
							<input type="submit" value="Submit">
						</p>
					</fieldset>
				</form>
			</div>
			<div id="tabs-6">
				<form action="queries/queryOther6.php" method="get">

					<fieldset>
						<legend>Trigger Example: A. Create the Table Payment without using trigger</legend>
						<p>
							SELECT * <br>
							FROM payment<br>
							ORDER BY 2<br>
						</p>

						<p>
							<input type="submit" value="Submit">
						</p>
					</fieldset>
				</form>
			</div>
			<div id="tabs-7">
				<form action="queries/queryOther7.php" method="get">

					<fieldset>
						<legend>Trigger Example: B.	After trigger note that the entry with 12396 became 12000</legend>
						<p>
							During creation of the table, <br>
							write a trigger as follows, <br>
							whose job it is to set the amount to 12000, <br>
							if the amount was originally 12396. <br>
							The trigger is declared as follows in SQL:<br>
							<br>
							delimiter //
							CREATE TRIGGER trig23 AFTER INSERT ON `payment` <br>
							FOR EACH ROW <br>
							BEGIN<br>
							IF NEW.amount = 12396 THEN<br>
							SET @amount = 12000;<br>
							END IF;<br>
							END;<br>
							//delimiter ;<br>

						</p>

						<p>
							<input type="submit" value="Submit">
						</p>
					</fieldset>
				</form>
			</div>
			<div id="tabs-8">
				<form action="queries/queryOther8.php" method="get">

					<fieldset>
						<legend>Trigger Example: C.	Similarly, we can do the “BEFORE INSERT” trigger</legend>
						<p>
							Because of this trigger, before a row is inserted into the table, <br>
							the database checks for the trigger condition e.g. <br>
							if the new row to be inserted has the amount 12396, <br>
							we will change that amount to 12000.<br>
							<br>
							delimiter //
							CREATE TRIGGER trig23 BEFORE INSERT ON `payment` <br>
							FOR EACH ROW <br>
							BEGIN<br>
							IF NEW.amount = 12396 THEN<br>
							SET NEW.amount = 12000;<br>
							END IF;<br>
							END;<br>
							//delimiter ;<br>

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