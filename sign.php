<?php
$conn = new mysqli('localhost','root','','fixit');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    } else {
        $stmt = $conn->prepare("insert into signup(email, password) values(?, ?)");
        $stmt->bind_param("ss",$email, $password );
        if(mysqli_stmt_execute($stmt)){
            header("location: /index.html");
        }
        $stmt->close();
        $conn->close();
    }
}    