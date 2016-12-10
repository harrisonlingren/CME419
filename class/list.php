<?php	include('header.php'); ?>

<?php

$listQ = "SELECT street, city, state, zip, bed, bath, garage,
              pets, amenities, details.desc, rent, status,
              availability, elementary, middle, high
            FROM location
              INNER JOIN res_info USING (property_id)
              INNER JOIN details USING (property_id)
              INNER JOIN rent USING (property_id)
              INNER JOIN school USING (property_id)
            WHERE location.property_id >= 0";

// While Result loop
	$list_query = mysqli_query($dbc, $listQ);
	if($list_query) {
		while($row=mysqli_fetch_array($list_query, MYSQLI_ASSOC)) {
			echo '<div class="propertyBox"><h1>' . $row['street'] . ', ' . $row['city'] . ', ' . $row['state'] . '  ' . $row['zip'] . '</h1><br/>';
			echo '<div class="rentTable"><h3>Rent:</h3><p>$' . $row['rent'] . '/month</p><h3>Available Date:</h3><p>';

			if($row['availability']=='0000-00-00') {
				echo '<i>Not available</i>';
			} else {
				echo $row['availability'];
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

include('footer.php'); ?>
