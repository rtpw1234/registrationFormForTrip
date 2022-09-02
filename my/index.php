<?php
// procedural oriented 
$insert = false;
if(isset($_POST['name'])) { //will be run only if he name is inserted
$submit = true;
$server = "localhost:3307"; //to connect to the mysql server
$username = "root";  //in localhost server , username is root 
$password = "";   //blank is the pw

//connection variable--> con
//mysqli_connect is the built in function available to us
//to securely build the connection
$con = mysqli_connect($server,$username,$password);

//check the connection
if(!$con) //if connection is not secured
{
 die("connection to this database failed due to".mysqli_connect_error()); // . is the string concatenation operator in php
 //mysqli_connect_error() is the function to show error
}
// echo "SUCESSFULLY CONNECTED TO DB";

// 
$name=$_POST["name"];
$gender=$_POST["gender"];
$age=$_POST["age"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$other =$_POST["other"];

$sql = "INSERT INTO `trip`.`trip`(`name`, `age`, `gender`, `email`, `phone`, `date`, `other`) VALUES ('$name', '$age', '$gender', '$email', '$phone',current_timestamp(), '$other');";
// echo $sql;

if($con->query($sql) == true)
{
 // echo "Succesfully inserted";
 $insert = true;
}
else{
  echo "ERROR: $sql <br> $con->error";
}
$con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>welcome to travel form</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  
  <img class="bg" src="pic.jpg" alt="trip photos">
  <!--OVERLAY OF BACKGROUND    -->
  <div id="home-overlay"></div>

  <!-- home -->
  <div class="container">
    <h1>WELCOME TO NIE TRIP FORM</h1>
    <p class = "msg">Enter your details and submit this form to confirm your participation in the trip </p>
    <?php
    if($insert==true)
    {
     echo "<p class='msgAfterSubmitting'>GOOD JOB, YOUR DETAILS ARE SUCCESFULLY SUBMITED. SEE YOU iN THE TRIP</p>";
    }
    ?>
  </div>
  
  <form action="index.php" method="post">
    <input type="text" name="name" id="name" placeholder="Enter your name">
    <input type="text" name="age" id="age" placeholder="Enter your Age">
    <input type="text" name="gender" id="gender" placeholder="Enter your gender - male/female/others">
    <input type="email" name="email" id="email" placeholder="Enter your email">
    <input type="phone" name="phone" id="phone" placeholder="Enter your phone Number">
    <textarea name="other" id="other" cols="12" rows="6" placeholder="Enter any other information here"></textarea>
    <button class="btn">Submit</button>    
  </form>
</div>
<script src="index.js"></script>
</body>
</html>


