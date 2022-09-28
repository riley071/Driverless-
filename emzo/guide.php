<?php
//first create the database php to see if its working
//then create this table:
CREATE TABLE `users` (
    `user_id` int(11) NOT NULL,
    `user_first_name` varchar(15) NOT NULL,
    `user_last_name` varchar(15) NOT NULL,
    `user_email` varchar(35) NOT NULL,
    `user_password` varchar(35) NOT NULL
);
// try login and registering 
//then if its works change the classes an variables:
    //to avoid prajarism

    // you can use this code to make your system auto create the database & table

    //creating and connecting to database

   $host="127.0.0.1"; //127.0.0.127
   $user="root";
   $password="";
   $connect=mysql_connect($host,$user,$password);
   $query="Drop database php1";
   $ret =mysql_query($query);
   
   $query="CREATE database php1";
   $con=mysql_connect($host,$user,$password);
   
   mysql_query($query);
   mysql_select_db("php1");


    
	// Creating the Users Table
    $query=    " create table `users_two`(`user_name` varchar(30) primary key, 
    `user_username` varchar(30), 
    `user_email` varchar(30), 
    `user_password` varchar(30))";
           
$ret= mysql_query($query);
if($ret){
   echo "<p>User Table created</p>";
}else{
   echo "table not created ".mysql_error();
   }

    