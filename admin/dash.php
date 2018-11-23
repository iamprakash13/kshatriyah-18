<?php
//session 
session_start();
if(empty($_SESSION["authenticated"]) || $_SESSION["authenticated"] != 'true') {
    header('Location: table.html');
}

//In every page that requires authentication, On page load event, check
if (!isset($_SESSION['nID'])){
    echo $_SESSION['userid'] . ' is logged in';
} else {
    header("Location: login.html");
    exit();
}

//connection
$db_host = 'localhost'; 
$db_user = 'id6636891_guruprasath'; 
$db_pass = '1234king'; 
$db_name = 'id6636891_aameccse';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Dash board</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="assets/home.ico"/>
<style>
body {
    font-family: "Lato", sans-serif;
   
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}


#logout{
    Position=absolute;
}
#logout img{
    position: absolute;
    top: 0px;
    right: 0px;
    float: left;
    padding: 14px 16px;
}

</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">DASH BOARD</a>
  <a href="display.php">TABLE</a>
  <a href="custom.php">CUSTOM</a>
  
</div>

<center><h2>ADMIN</h2></center>
 <div id="logout">
        <a href="login.html">
        <img src="assets/logout.png" alt="logout" width="50" height="50">
        
       </a></div>
   

<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>
     
	<SCRIPT LANGUAGE="JavaScript">
function clickIE() {if (document.all) {alert(message);return false;}}
function clickNS(e) {if 
(document.layers||(document.getElementById&&!document.all)) {
if (e.which==2||e.which==3) {alert(message);return false;}}}
if (document.layers) 
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}

document.oncontextmenu=new Function("return false")
window.history.forward(-1);
</script>     
</body>
</html> 
