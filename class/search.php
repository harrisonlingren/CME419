<?php
	include('header.php');
	include('error_report.php');
	require('db_connect.php');
	?>

<form action="search.php" method="post">
	<h1>Search Properties</h1>
	<label for="bed">Beds:</label>
	<input type="text" id="bed" name="bed"/><br/>
	<label for="bath">Baths:</label>
	<input type="text" id="bath" name="bath"/><br/>
	<label>Rent:</label>
	<select name="rent">
		<option value="0">Choose a price range...</option>
		<option value="400">0-400</option>
		<option value="600">401-600</option>
		<option value="800">601-800</option>
		<option value="1000">801-1000</option>
		<option value="2000">1001+</option>
	</select><br/>
	<label for="availDate">Available Date:</label>
	<input type="text" name="availDate" id="availDate" placeholder="MM/DD/YYYY"/><br/>
	<input type="submit" name="submit" id="submit" value="Search Properties"/>
</form>

<?php

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		echo "Form was submitted.";
		$bed=$_POST['bed'];
		$bath=$_POST['bed'];
		$rent=$_POST['bed'];
		$availDate=$_POST['bed'];

		$searchQ = "SELECT street, city, state, zip, bed, bath, garage,
									pets, amenities, details.desc, rent, status,
									availability, elementary, middle, high
								FROM location
									INNER JOIN res_info USING (property_id)
									INNER JOIN details USING (property_id)
									INNER JOIN rent USING (property_id)
									INNER JOIN school USING (property_id)
								WHERE location.property_id >= 0";

		if($bed) {
			$searchQ .= " AND WHERE bed='$bed'";
		}
		if($bath) {
			$searchQ .= " AND WHERE bath='$bath'";
		}
		if($rent) {
			switch($rent) {
				case '0':
					break;
				case '400':
					$searchQ .= " AND WHERE rent <= 400";
				case '2000':
					$searchQ .= " AND WHERE rent > 1000";
				default:
					$rentLow = $rent - 200;
					$searchQ .= " AND (rent > $rentLow) AND (rent <= $rent)";
			}
		}
		if($availDate) {
			$searchQ .= " AND WHERE availability=$availDate";
		}

	} else {
		//echo '<script>alert("It does not work");</script>';
	}


// While Result loop
	$search_query = mysqli_query($dbc, $searchQ);
	if($search_query) {
		while($row=mysqli_fetch_array($search_query, MYSQLI_ASSOC)) {
			echo '<div class="propertyBox"><h1>' . $row['street'] . ', ' . $row['city'] . ', ' . $row['state'] . '  ' . $row['zip'] . '</h1><br/>';
			echo '<div class="rentTable"><h3>Rent:</h3><p>$' . $row['rent'] . '/month</p><h3>Available Date:</h3><p>';

			if($row['availableDate']=='0000-00-00') {
				echo '<i>Not available</i>';
			} else {
				echo $row['availableDate'];
			}

			echo '</p></div><p>Bedrooms: ' . $row['bed'] . '<br/>Bathrooms: ' . $row['bath'] . '<br/>Garage: ' . $row['garage'] . '<br/>';
			echo 'Pets: ';

			if($row['pets']==0) {
				echo "No pets allowed<br/>";
			} else {
				echo "Pets allowed. See owner for details.<br/>";
			};

			echo 'Amenities: ' . $row['amenities'] . '</p>';
			echo '<h3>Property Description</h3><p>';

			if(!$row['desc']) {
				echo '<i>No description is available</i></p>';
			} else {
				echo $row['desc'] . '</p>';
			};

			echo '<div class="school"><h3>School District</h3><p>Elementary School: ' . $row['elementary'] . '<br/>Middle School: '. $row['middle'] . '<br/>High School: ' . $row['high'] . '</p></div></div>';
		}
	}

include('footer.php');
?>
