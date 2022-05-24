<?php
$servername= "localhost";
$username= "root";
$password= "";
$dbname= "inventory_management_db";

$conn= mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die("conection failed: ". mysqli_connect_error());
}

mysqli_select_db($conn, "inventory_management_db");

$pname=isset($_POST['product_name']) ? $_POST['product_name'] : '';
$unitPrice=isset($_POST['unit_price']) ? $_POST['unit_price'] : '';
$quantity=isset($_POST['quantity']) ? $_POST['quantity'] : '';

$show= "select * from product where product_name='$pname'";
$result=mysqli_query($conn, $show) ;

if(isset($_POST['deletion'])){
    $pID= $_POST['delete_id'];
    $delete="DELETE FROM product WHERE product_id= '$pID'";
    $reg=mysqli_query($conn, $delete);
    if($delete){
        $_SESSION['Success']= 'Your data has been deleted';
        header('location: productManagement.php');
    }
    else{
        $_SESSION['status']= 'Your data could not be deleted';
        header('location: productManagement.php'); 
    }
}






?>