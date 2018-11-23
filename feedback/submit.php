<?php
     $dbUser = "user";
$dbPass = "pass";
$dbDatabase = "name";
$dbHost = "localhost";

/* @var $dbConn type */
$Conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbDatabase);

if ($Conn)
    {
        /* @var $mysqli_select_db type */
       
    //echo"<strong>Successfully connected to the database.</strong>";
} else {
    die("<strong>Error:/</strong> Could not connect to database.");
}
/* @var $name type */
$name = $_POST['name'];  // set username value to variable usenamr
/* @var $college type */
$college = $_POST['college'];
/* @var $overall type */
$overall = $_POST['ques1'];
/* @var $likes type */
$likes = $_POST['ques2'];
/* @var $duration type */
$duration=$_POST['ques3'];
/* @var $coordination type */
$coordination=$_POST['ques4'];
/* @var $rate type */
$rate=$_POST['ques5'];
/* @var $review type */
$review=$_POST['ques6'];

if(empty($review)){
    $review="null";
}

{
    $sql =  "INSERT INTO feedback(name, college, overall, likes, duration, coordination, rate, review ) VALUES('$name', '$college', '$overall', '$likes', '$duration', '$coordination', '$rate', '$review')";
/* @var $query type */
    $query= mysqli_query($Conn,$sql);
    if($query)
   {
      header('Location: thankyou.html');
    }
   else
{
echo"resubmit with correct details..";
//header('Location: rating.html');
}
}
?>
