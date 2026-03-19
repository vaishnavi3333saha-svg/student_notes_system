<?php
session_start();
include "db.php";

if(isset($_POST['login'])){

    // Get form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check user in database
    $result = $conn->query(
        "SELECT * FROM users 
         WHERE username='$username' 
         AND password='$password'"
    );

    // If user found
    if($result->num_rows > 0){

        // Create session (IMPORTANT)
        $_SESSION['user'] = "Vaishnavi";

        // Redirect to dashboard
        header("Location: dashboard.php");
        exit();

    } else {

        echo "<script>alert('Invalid username or password');</script>";
    }
}
?>