<?php

$uname = $_POST['uname'];
$pass = $_POST['pass'];
   // require_once 'action.php';
    
    $host = "localhost";
    $dbUsername = "id6636891_guruprasath";
    $dbPassword = "1234king";
    $dbname = "id6636891_aameccse";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {

    $SELECT = 'SELECT uname FROM user WHERE uname=? AND pass=?';
    
      $stmt = $conn->prepare($SELECT);  
      $stmt->bind_param('ss', $uname, $pass);
      $stmt->execute();
      $stmt->store_result();
      $num_row = $stmt->num_rows;
      $stmt->bind_result($uname);
      $stmt->fetch();
      $stmt->close();

    if( $num_row === 1 ) {
        session_start();
        $_SESSION['userid'] = $uname;         //set the session username
        $_SESSION["authenticated"] = 'true';  
 
        header("Location: display.php");
        exit();
      
      
    }else {

    header("Location: login.html");
}
}
?>