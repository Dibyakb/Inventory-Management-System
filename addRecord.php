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
//$pID = isset($_POST['product_id']) ? $_POST['product_id'] : ''; //to avoid error "Undefined index"
$pname=isset($_POST['product_name']) ? $_POST['product_name'] : '';
$pdes=isset($_POST['product_description']) ? $_POST['product_description'] : '';
$unitPrice=isset($_POST['unit_price']) ? $_POST['unit_price'] : '';
$quantity=isset($_POST['unit']) ? $_POST['unit'] : '';

$show= "select * from product where product_name='$pname'";
$result=mysqli_query($conn, $show) ;

$add="INSERT INTO product(product_id, product_name, product_description, unit_price, unit) VALUES ('NULL', '$pname','$pdes', '$unitPrice', '$quantity')";
$reg=mysqli_query($conn, $add);

if($add){
    $_SESSION['Success']= 'Your data has been added';
    header('location: productManagement.php');
}
else{
    $_SESSION['status']= 'Your data could not be added';
    header('location: productManagement.php'); 
}
?>