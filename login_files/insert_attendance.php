<?php
// Database connection information
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve values from the form
$attendanceID = $_POST["attendance_id"];
$status = $_POST["status"];
$courseID = $_POST["course_id"];
$studentID = $_POST["student_id"];
$date = $_POST["date"];

// Insert values into the attendance table
$sql = "INSERT INTO attendance (attendance_id, date, student_id, course_id, status)
        VALUES ('$attendanceID', '$date', '$studentID', '$courseID', '$status')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>