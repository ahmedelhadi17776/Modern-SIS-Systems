<?php
// Assuming you have the database connection details, update the following variables accordingly
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the form data
    $facultyId = $_POST["Faculty_id"];
    $courseId = $_POST["course_id"];
    $studentId = $_POST["student_id"];
    $date = $_POST["date_"];
    $report = $_POST["report"];

    // Prepare the SQL statement
    $sql = "INSERT INTO report (faculty_id, course_id, student_id, date_, report) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind the parameters and execute the statement
    $stmt->bind_param("sssss", $facultyId, $courseId, $studentId, $date, $report);
    $stmt->execute();

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>