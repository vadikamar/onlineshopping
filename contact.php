<?php
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $GENDER = $_POST['GENDER'];

	// Database connection
	$conn = new mysqli('localhost','root','','shuaib');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into contact(fname,lname,email,dob,GENDER) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sssis", $fname,$lname,$email,$dob,$GENDER);
		$execval = $stmt->execute();
		echo $execval;
		echo "Form filled successfully...";
		$stmt->close();
		$conn->close();
	}
?>
