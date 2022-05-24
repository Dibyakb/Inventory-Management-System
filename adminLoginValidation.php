<?php
session_start();
$servername="localhost";
$username="root";
$password="";

//connection_creation
$conn=mysqli_connect($servername, $username, $password);
if(!$conn){
	die("connection failed". mysqli_connect_error());
}

mysqli_select_db($conn, 'inventory_management_db');

if(isset($_POST['LOGIN'])){

    $Username = $_POST['username'];
    $Password = $_POST['password'];
    
    $s = "select * from admintable where username = '$Username' && password = '$Password'";
    $result = mysqli_query($conn, $s);
    
    $num = mysqli_num_rows($result);



    if($num == 1){
         session_start();
         $_SESSION['adminloginid']= $_POST['username'];

         header ('location:inventoryHome.html');
    }   
    else{
    
         echo "please eneter correct info";
    }
}
?>