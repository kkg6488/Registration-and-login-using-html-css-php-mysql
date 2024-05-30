<?php
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = $_POST['password'];

    // Database connection
    $conn = new mysqli('localhost','root','','reg_db');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into registration(firstName, lastName, email, number, password)
            values(?, ?, ?, ?, ?)");
        $stmt->bind_param("sssis",$firstName, $lastName, $email, $number, $password);
        $stmt->execute();
        echo "<script>window.location.href = 'user.html';</script>";
        $stmt->close();
        $conn->close();
    }
?>