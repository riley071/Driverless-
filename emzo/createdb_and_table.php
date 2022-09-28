<?php
//creating and connecting to database

  include_once 'lib/session.php';
  
   $host="127.0.0.1"; //127.0.0.127
   $user="root";
   $password="";
   $connect=mysqli_connect($host, $user, $password);
   $query="Drop database php";
   $ret =mysqli_query($connect, $query);
   
   $query="CREATE database php";
   $con=mysqli_connect($host, $user, $password);
   
   mysqli_query($connect, $query);
   mysqli_select_db($connect, "php");

	// Creating the Users Table
    $query=    "CREATE TABLE `users_two`(
    `id` INT PRIMARY KEY AUTO_INCREMENT, 
    `name` VARCHAR(30),
    `user_name` VARCHAR(30), 
    `user_email` VARCHAR(30),
    `user_dob` date,
    `user_pa` VARCHAR(30), 
    `user_pc` int,
    `user_password` VARCHAR(30))";

    $insert = "";
           
$ret= mysqli_query($connect, $query);

if($ret){
  echo "<p>User Table created</p>";
}else{
  echo "table not created ".mysqli_error();
}

function create_admin($connect, $query) {
  $query = "INSERT INTO users_two(name, user_name, user_email, user_password) VALUES('Administrator', 'admin', 'admin@ptcmw.com', 'password'
  )";

  $result = mysqli_query($connect, $query);

  return $result;
}

$result = create_admin($connect, $query);

if($result) {
  echo "<p>Admin user created successfully.</p>";
} else {
  echo "<p>Failed to create admin user.</p>";
}

session::set("login", false);
