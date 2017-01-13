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

		print "<h1>how many guests use each facility, and the bill for each facility $input</h1>\n";

            // Connect to the database.
		$con = new PDO("mysql:host=localhost;dbname=cs157a",
			"cs157a", "tanhotel");
		$con->setAttribute(PDO::ATTR_ERRMODE,
			PDO::ERRMODE_EXCEPTION);				

		$query = "SELECT facility.type as ftype, SUM(facility.rate) as FacilityBill, facility.rate as Rate, Count(facility.type) as GuestsUsingFacility ".
		"FROM facility JOIN facility_used  ".
		"WHERE facility_used.facility_id = facility.facility_id ".
		"GROUP BY facility.type order by 2 DESC ";

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