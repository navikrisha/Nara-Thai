<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contact = $_POST['Phone'];

    $conn = new mysqli('127.0.0.1', 'root', '', 'nara thai');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO userdetails (email, password,contact_no) VALUES ('$email','$password','$contact')";
   


    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Registration successful!");window.location.href = "./proj/menu.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

