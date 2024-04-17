<?php
// Connect to the database (update with your database credentials)
$db = new mysqli('127.0.0.1', 'root', '', 'nara thai');

if ($db->connect_error) {
    die('Connection failed: ' . $db->connect_error);
}

if (isset($_POST['name']) && isset($_POST['message'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sub = $_POST['subject'];
    $message = $_POST['message'];

    // Insert the message into the database, marking it as a  message
    $query = "INSERT INTO contact (name, email,contact_no,subject,message) VALUES ('$name', '$email','$phone','$sub','$message')";
    $result = $db->query($query);

    if ($result) {
        // Message sent successfully
        echo '<script>alert("Message sent successfully!"); window.location.href = "Home.php";</script>';
    } else {
        echo "Error: " . $db->error;
    }

    $db->close();
}
?>