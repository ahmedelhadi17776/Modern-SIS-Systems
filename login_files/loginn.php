<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  $message = "Connection failed: " . $conn->connect_error;
} else {
  $message = "Connection successful";
}

file_put_contents('connection.log', $message . PHP_EOL, FILE_APPEND);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM login WHERE username='$username'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (strcmp($password, $row['password']) == 0) {
      session_start();
      $_SESSION['username'] = $username;
      header('Location:Dashboard.html');
      exit;
    } else {
      echo "Incorrect password";
    }
  } else {
    echo "User not found";
  }
}

$conn->close();
?>