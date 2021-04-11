<?php
	$Name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$meassage = $_POST['message'];

	// Database connection
	$conn = new mysqli('localhost','epiz_27940088','b2hy7k4w','epiz_27662007_contact');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into contact(name, email, subject, message) values(?, ?, ?, ?)");
		$stmt->bind_param("contact", $Name, $email, $subject, $meassage);
		$execval = $stmt->execute();
		echo $execval;
		echo "Thank You for the Contact us";
		$stmt->close();
        $conn->close();
    }
?>