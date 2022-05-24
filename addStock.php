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
$pID = isset($_POST['product_id']) ? $_POST['product_id'] : ''; //to avoid error "Undefined index"
$pname=isset($_POST['product_name']) ? $_POST['product_name'] : '';
$pdes=isset($_POST['product_description']) ? $_POST['product_description'] : '';
$purchaseQuantity=isset($_POST['purchased']) ? $_POST['purchased'] : '';
$sellQuantity=isset($_POST['sold']) ? $_POST['sold'] : '';

$show= "SELECT * from stock_information where product_id='$pID'";
$result=mysqli_query($conn, $show) ;

$add="INSERT INTO stock_information(product_id, product_name, product_description, purchased, sold) VALUES ('$pID', '$pname','$pdes', '$purchaseQuantity', '$sellQuantity')";
$reg=mysqli_query($conn, $add);

if($add){
    $_SESSION['Success']= 'Your data has been added';
    header('location: stockManagement.php');
}
else{
    $_SESSION['status']= 'Your data could not be added';
    header('location: stockManagement.php'); 
}
?>