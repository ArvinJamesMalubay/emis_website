<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "emis_website";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"], $_POST["password"], $_POST["role"])) {
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        $role = mysqli_real_escape_string($conn, $_POST["role"]);

        if ($role == "1") { // Admin
            $query = "SELECT * FROM admin WHERE username = '$username'";
        } elseif ($role == "2") { // Student
            $query = "SELECT * FROM students WHERE username = '$username'";
        } elseif ($role == "3") { // Teacher
            $query = "SELECT * FROM teachers WHERE username = '$username'";
        }

        $result = $conn->query($query);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                // Start session and store necessary data
                session_start();
                $_SESSION['user_id'] = $row['id']; // Use the actual user ID column name
                $_SESSION['role'] = $role;

                // Redirect to the appropriate dashboard
                header("Location: dashboard.php");
                exit();
            } else {
                echo "Authentication failed. Please check your credentials.";
            }
        } else {
            echo "Authentication failed. Please check your credentials.";
        }
    } else {
        echo "Please fill in all required fields.";
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Y School</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="sanjuanlogo.png">
</head>
<body class="body-login">
    <div class="black-fill"><br /> <br />
        <div class="d-flex justify-content-center align-items-center flex-column">
            <form class="login" method="post" action="login.php"> <!-- Adjust the action attribute to the correct PHP file -->
                <div class="text-center">
                    <img src="sanjuanlogo.png" width="100">
                </div>
                <h3>Education Management Information System</h3>
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" required>
                
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Login As</label>
                    <select class="form-control" name="role"> 
                        <option value="1">Admin</option>
                        <option value="2">Student</option>
                        <option value="3">Teacher</option>
                    </select>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Login</button>
                    <a href="index.php" class="btn btn-secondary">Go Back</a>
                </div>
                
                <br /><br />
                <div class="text-center text-light">
                    Copyright &copy; 2024 <br>
                    San Juan National High School. <br>All rights reserved.
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>    
</body>
</html>