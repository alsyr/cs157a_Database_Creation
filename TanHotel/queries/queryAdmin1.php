<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>

<body>
	<?php
	function constructTable($data)
	{
            // We're going to construct an HTML table.
		print "    <table border='1'>\n";

            // Construct the HTML table row by row.
		$doHeader = true;
		foreach ($data as $row) {

                // The header row before the first data row.
			if ($doHeader) {
				print "        <tr>\n";
				foreach ($row as $name => $value) {
					print "            <th>$name</th>\n";
				}
				print "        </tr>\n";
				$doHeader = false;
			}

                // Data row.
			print "        <tr>\n";
			foreach ($row as $name => $value) {
				print "            <td>$value</td>\n";
			}
			print "        </tr>\n";
		}

		print "    </table>\n";
	}

	$input = filter_input(INPUT_GET, "input");

	try {
		if (empty($input)) {
			throw new Exception("Missing Input");
		}

		print "<h1>Total Bill Amount for guestID: $input</h1>\n";

            // Connect to the database.
		$con = new PDO("mysql:host=localhost;dbname=cs157a",
			"cs157a", "tanhotel");
		$con->setAttribute(PDO::ATTR_ERRMODE,
			PDO::ERRMODE_EXCEPTION);



		$query = "SELECT guestid, sum(Total) ".
		"FROM (SELECT guestid, SUM(cost * qty) as Total ".
		"FROM (SELECT food.type, food.rate as cost, orders.quantity as qty, orders.guest_id as guestid ".
		"FROM food JOIN orders ".
		"WHERE orders.guest_id = :input and food.food_id = orders.food_id) as T UNION ".
		"SELECT guestid, cost1 as Total ".
		"FROM (SELECT facility.type as ftype, facility.rate as cost1, facility_used.guest_id as guestid ".
		"FROM facility JOIN facility_used ".
		"WHERE facility_used.guest_id = :input and facility_used.facility_id = facility.facility_id) as U UNION ".
		"SELECT guestid, sum((cost2/100.0)*days) as Total ".
		"FROM (select guest_id as guestid, rate as cost2, datediff(check_out_date,check_in_date) as days ".
		"FROM room ".
		"WHERE guest_id = :input) as V) as Z";

$ps = $con->prepare($query);

            // Fetch the matching row.
$ps->execute(array(':input' => $input));
$data = $ps->fetchAll(PDO::FETCH_ASSOC);

            // $data is an array.
if (count($data) > 0) {
	constructTable($data);
}
else {
	print "<h3>(No match.)</h3>\n";
}
}
catch(PDOException $ex) {
	echo 'ERROR: '.$ex->getMessage();
}    
catch(Exception $ex) {
	echo 'ERROR: '.$ex->getMessage();
}
?>
</body>
</html>