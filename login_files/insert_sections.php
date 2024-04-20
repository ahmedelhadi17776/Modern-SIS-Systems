<?php
// database connection details
$host = "localhost";
$username = "root";
$password = "";
$database = "mydatabase";

// create database connection
$conn = new mysqli($host, $username, $password, $database);

// check for connection errors
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // get form data
  $section_id = $_POST["section_id"];
  $faculty_id = $_POST["faculty_id"];
  $department_id = $_POST["department_id"];
  $schedule = $_POST["faculty_id"];
  $location = $_POST["location"];
  $course_id = $_POST["course_id"];

  // prepare SQL statement
  $sql = "INSERT INTO section (section_id, faculty_id, department_id, schedule, location, course_id) VALUES (?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssssss", $section_id, $faculty_id, $department_id, $schedule, $location, $course_id);

  // execute statement and check for errors
  if ($stmt->execute() === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // close statement and connection
  $stmt->close();
  $conn->close();
}
?>