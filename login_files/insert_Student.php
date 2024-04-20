<?php
// Database connection parameters
$host = "localhost";
$username = "root";
$password = "";
$database = "mydatabase";

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the form data
    $stName = $_POST["full_name"];
    $stNationalID = $_POST["national_id"];
    $stPhonenumber = $_POST["phone_number"];
    $stFacultyID = $_POST["student_id"];
    $stAcademicemail = $_POST["academic_email"];
    $stStudentLevelID = $_POST["student_level_id"];

    // Prepare the SQL statement
    $sql = "INSERT INTO student (student_id, full_name, academic_email, phone_number, student_level_id, national_id) 
            VALUES ('$stFacultyID', '$stName', '$stAcademicemail', '$stPhonenumber', '$stStudentLevelID', '$stNationalID')";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Student data inserted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>