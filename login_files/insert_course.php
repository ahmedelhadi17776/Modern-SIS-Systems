<?php
    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "mydatabase");
    
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // Get the input values from the form
    $course_id = $_POST['course_id'];
    $name_instructor = $_POST['name_instructor'];
    $schedule = $_POST['schedule'];
    $location = $_POST['location'];
    $department_id = $_POST['department_id'];
    $faculty_id = $_POST['faculty_id'];
    
    // Insert the data into the table
    $sql = "INSERT INTO course (course_id, name_instructor, schedule, location, department_id, faculty_id) 
            VALUES ('$course_id', '$name_instructor', '$schedule', '$location', '$department_id', '$faculty_id')";
    
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
?>