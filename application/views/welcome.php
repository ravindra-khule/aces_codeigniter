<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $phoneErr = "";
$name = $email = $gender = $phone = $query =$subject= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "Name is required";
   } else {
     $name = test_input($_POST["name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Only letters and white space allowed"; 
     }
   }
   
   if (empty($_POST["email"])) {
     $emailErr = "Email is required";
   } else {
     $email = test_input($_POST["email"]);
     // check if e-mail address syntax is valid
     if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
       $emailErr = "Invalid email format";
     }
   }
   
    if (empty($_POST["phone"])) {
     $phoneErr = "Phone no is required";
   } else {
     $phone = test_input($_POST["phone"]);
     // check if e-mail address syntax is valid
	 
	 if( !preg_match("/^([1]-)?[0-9]{3}-[0-9]{3}-[0-9]{4}$/i", $phone) ) {
    	$phoneErr = "Invalid phone number";
     
     }
   }
   
     if (empty($_POST["subject"])) {
     $subject = "";
   } else {
     $subject = test_input($_POST["subject"]);
   }
   

   if (empty($_POST["query"])) {
     $query = "";
   } else {
     $query = test_input($_POST["query"]);
   }

   if (empty($_POST["gender"])) {
     $genderErr = "Gender is required";
   } else {
     $gender = test_input($_POST["gender"]);
   }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $phone;
echo "<br>";
echo $query;
echo "<br>";
echo $gender;

?>