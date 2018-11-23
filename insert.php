<?php
$name = $_POST['name'];  // set username value to variable usenamr
$name1 = $_POST['name1'];
$collage = $_POST['collage'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$event1=$_POST['event1'];
$event2=$_POST['event2'];
$dept=$_POST['dept'];
//$ddscan = $_POST['ddscan'];
if (!empty($name) || !empty($collage) || !empty($dept) || !empty($email) ||
!empty($event1) || !empty($phone)) {
 $host = "localhost";
    $dbUsername = "user";
    $dbPassword = "pass";
    $dbname = "name";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
        //validation email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
   $emailErr = "Invalid format and please re-enter valid email"; 
}
        
        
        
     $SELECT = "SELECT email From register Where email = ? Limit 1";  //unique mail for each user
     $INSERT = "INSERT Into register (name, collage, dept , event1, event2, email, phone) values(?, ?, ?, ?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);  //select query 
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);  //reterive data from email
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     
	 
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
	  // stringds insert
      $stmt->bind_param("ssssssi", $name, $collage, $dept, $event1, $event2, $email, $phone);
      $stmt->execute();
      
      if (!empty($name1)) {
           // stringds insert
      $stmt->bind_param("ssssssi", $name1, $collage, $dept, $event1, $event2, $email, $phone);
      $stmt->execute();
      }
      
          //sending email to users
//$to_email= "SELECT * FROM register ORDER BY email DESC
//LIMIT 1";	
// Sanitize E-mail Address
$email =filter_var($email, FILTER_SANITIZE_EMAIL);
// Validate E-mail Address
$email= filter_var($email, FILTER_VALIDATE_EMAIL);

$subject = 'Kshatriyah 2k18 | Confirmation';  // Give the email a subject 
$message = 'Dear ' . $name . ',
Thanks for Registering Event
See You Soon!

Instructions:
 1.Mail Your Presentation Papers to kshatriyah18@gmail.com before 31/08/2018.
 2.Participants should bring thier CollegeID Card with  Confirmation Mail.
 3.Events are held at PGBLOCK.
 4.Lunch will be provided.
 
 Date- 01/09/18
 Venue- AAMEC,Kovilvenni.
 
 /***  Event Description  ***/
 
 PAPER PRESENTATION: 
●	Candidate should submit the paper(kshatriyah18@gmail.com) under the following topics only
●	AR/VR
●	Block Chain
●	Deep Learning
●	IIOT/IOT
●	Cyber Security
●	Big Data
●	Cloud Computing
●	Robotics
●	Computer Vision
●	Image Processing

WEB DESIGNING: 
●	First round will have MCQ
●	Second round will have create the website for given concepts
DOMAIN: HTML, CSS, BOOTSTRAP, JS

CODEX:
●	First will have MCQ
●	Second round will have programs to DEBUG and type program for following concept
DOMAIN: C, C++, JAVA

BRAIN STROM: 
●	First round will have MCQ
●	Second round will have PICTURE EXPLANATION
●	Final round will have VOICE ANALYSIS
DOMAIN: GENERAL KNOWLDEGE

ENTREPRENER SKILL: 
Candidate should prepare his/her self to explain their innovative idea by fulfilling this questions of the jury
●	Explain your innovative idea
●	Convince us to sponsorship
●	What is your budget for investment?
●	How will the revenue comes?
●	Who are all the users?
●	How will you promote the idea?
●	What is gain of  your product?

ANIME: 
●	First round will have MCQ
●	Second round will have task to create animation using programming language
DOMAIN: C, JAVA, PYTHON (any)

 
 ';  // Our message
mail($email,$subject,$message);  
      
     // echo "New record inserted sucessfully";
	  //To redirect user back to index.html
	  header('Location: Result.html');
exit;
     } else {
	 //message
     // echo "Someone already register using this email";
      header('Location: Reload.html');
exit;
         
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>
