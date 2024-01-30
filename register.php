<?php
// Assuming you have a MySQL database connection established
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "emis_website";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $username = $_POST["username"];
    // $password = password_hash($_POST["password"], PASSWORD_DEFAULT); 
    $password = $_POST["password"];
    $role = $_POST["role"];

    switch ($role) {
        case "1": // Admin
            $sql = "INSERT INTO admin (firstName, lastName, username, password) VALUES ('$firstName', '$lastName', '$username', '$password')";
            break;

        case "2": // Student
            $sql = "INSERT INTO students (firstName, lastName, username, password) VALUES ('$firstName', '$lastName', '$username', '$password')";
            break;

        case "3": // Teacher
            $sql = "INSERT INTO teachers (firstName, lastName, username, password) VALUES ('$firstName', '$lastName', '$username', '$password')";
            break;

        default:
            echo "Invalid role selected.";
            exit();
    }

    if ($conn->query($sql) === TRUE) {
        // Redirect to the main page after successful registration
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
