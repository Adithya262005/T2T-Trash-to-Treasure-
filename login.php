<?php
session_start();
include 'db.php';

if(isset($_POST['submit'])){
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        if(password_verify($password, $row['password'])){
            $_SESSION['user'] = $row['fullname'];

            echo "<script>
                    alert('Login Successful!');
                    window.location.href='index.html';
                  </script>";
            exit;
        } else {
            echo "<script>
                    alert('Incorrect password!');
                    window.location.href='signin.html';
                  </script>";
            exit;
        }
    } else {
        echo "<script>
                alert('Email not registered!');
                window.location.href='signin.html';
              </script>";
        exit;
    }
}
?>
