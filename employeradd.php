<?php

displayhandleform (); 



function connectToDB($dbname){

	$dbc= @mysqli_connect("localhost", "freemaal", "zUtqzmrJ", $dbname) or

					die("Connect failed: ". mysqli_connect_error());

	return $dbc;

}



function disconnectFromDB($dbc, $result){

	mysqli_free_result($result);

	mysqli_close($dbc);

}



function performQuery($dbc, $query){

	$result = mysqli_query($dbc, $query) or die("bad query".mysqli_error($dbc));

	return $result;

}



function displayhandleFORM() {

$dbc = connectToDB( "freemaal" ); 

	$company = isset ($_POST ['usercompany'] ) ? $_POST['usercompany'] : ''; 

	$jobtitle = isset ($_POST ['employertitle'] ) ? $_POST['employertitle'] : ''; 

	$firstname = isset ( $_POST['firstname'] ) ? $_POST['firstname'] : ''; 

	$lastname = isset ($_POST ['lastname'] ) ? $_POST['lastname'] : '';	

	$phone = isset ($_POST ['employerphone'] ) ? $_POST['employerphone'] : ''; 	

	$email = isset ($_POST ['employeremail'] ) ? $_POST['employeremail'] : ''; 



if (isset ($company, $firstname, $lastname, $phone, $email, $jobtitle ) ) {

	$result = performQuery ( $dbc, "INSERT INTO Employer (Company, ContactFirstName, ContactLastName, Phone, Email, JobTitle) VALUES ('$company', '$firstname', '$lastname', '$phone', '$email', '$jobtitle')" ); 

	if ($result == null) { 

		echo "Fail"; 

	} else { 

		echo " <a href='http://cscilab.bc.edu/~freemaal/JobSeeker/employerquiz.php'>Take Our Employer Quiz to Find the Right Applicant For You</a>  ";

	}

	}

}



?> 
