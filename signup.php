<?php
$conn = new mysqli('localhost','root','','travel');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $destination = trim($_POST["destination"]);

    
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    } else {
        $stmt = $conn->prepare("insert into signup(name,email, destination) values(?, ?, ?)");
        $stmt->bind_param("sss", $name,$email, $destination );
        if(mysqli_stmt_execute($stmt)){
            header("location: /index.html");
        }
        $stmt->close();
        $conn->close();
    }
}    