<?php
//connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Escape user inputs for security
$faculty_id = mysqli_real_escape_string($conn, $_POST['faculty_id']);
$full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
$academic_email = mysqli_real_escape_string($conn, $_POST['academic_email']);
$national_id = mysqli_real_escape_string($conn, $_POST['national_id']);
$phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);

// attempt insert query execution
$sql = "INSERT INTO faculty(faculty_id, full_name, academic_email, national_id, phone_number) VALUES ('$faculty_id', '$full_name', '$academic_email', '$national_id', '$phone_number')";

if(mysqli_query($conn, $sql)){
  echo "<script>alert('Records added successfully.')</script>";
} else{
  echo "<script>alert('ERROR: Could not able to execute $sql.')</script>" . mysqli_error($conn);
}

// close connection
mysqli_close($conn);
?>