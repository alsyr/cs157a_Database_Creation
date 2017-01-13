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

		print "<h1>Rooms available after $input</h1>\n";

            // Connect to the database.
		$con = new PDO("mysql:host=localhost;dbname=cs157a",
			"cs157a", "tanhotel");
		$con->setAttribute(PDO::ATTR_ERRMODE,
			PDO::ERRMODE_EXCEPTION);

		$query = "SELECT room_number AS Room, type AS Type, rate AS 'Rate in $', check_out_date AS 'Will be free on' ".
		"FROM room ".
		"WHERE check_out_date >= :input ".
		"ORDER BY check_out_date";
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