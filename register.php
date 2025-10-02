<?php
include 'db.php';

if(isset($_POST['submit'])){
    $fullname = $conn->real_escape_string($_POST['fullname']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if email already exists
    $check = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($check);

    if($result->num_rows > 0){
        echo "<script>
                alert('Email already registered! Please log in.');
                window.location.href='register.html';
              </script>";
        exit;
    }

    // Insert new user
    $sql = "INSERT INTO users (fullname, email, password) VALUES ('$fullname', '$email', '$password')";

    if($conn->query($sql) === TRUE){
        echo "<script>
                alert('Registered Successfully!');
                window.location.href='signin.html';
              </script>";
        exit;
    } else {
        echo "<script>
                alert('Error: ".$conn->error."');
                window.location.href='register.html';
              </script>";
        exit;
    }
}
?>
