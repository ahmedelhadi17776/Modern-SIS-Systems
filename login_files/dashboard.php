<?php
// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$database = "mydatabase";

// Create a database connection
$connection = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$connection) {
    die("Failed to connect to the database: " . mysqli_connect_error());
}

// Fetch attendance data from the database
$query = "SELECT attendance.attendance_id AS ID, student.full_name AS Name, student.student_id AS StudentID, 
          student.academic_email AS AcademicEmail, course.course_id AS CourseID, course.name_instructor AS Instructor, 
          attendance.date AS Date, attendance.status AS Status
          FROM attendance
          INNER JOIN student ON attendance.student_id = student.student_id
          INNER JOIN course ON attendance.course_id = course.course_id
          ORDER BY attendance.date DESC";

$result = mysqli_query($connection, $query);

// Prepare the attendance data as an array
$data = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
}

// Close the database connection
mysqli_close($connection);

// Return the attendance data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>