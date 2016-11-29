<?php
	include('header.html');
	include('error_report.php');
	require('dbConnect.php');
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

	if (_SERVER['REQUEST_METHOD'] == 'POST') {
		echo '<script>alert("It works");</script>';
	} else {
		echo '<script>alert("It does not work");</script>';
	}

// While Result loop
			while($row=mysqli_fetch_array($r,MYSQLI_ASSOC)) {
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
				if(!$row['description']) {
					echo '<i>No description is available</i></p>';
				} else {
					echo $row['description'] . '</p>';
				};
				echo '<div class="school"><h3>School District</h3><p>Elementary School: ' . $row['elementary'] . '<br/>Middle School: '
				. $row['middle'] . '<br/>High School: ' . $row['high'] . '</p></div></div>';

				}


	?>
