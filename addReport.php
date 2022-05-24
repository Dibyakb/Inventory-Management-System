<?php
$servername="localhost";
$username="root";
$password="";
$dbname="inventory_management_db";

$conn=mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die('connection failed: '.mysqli_connect_error());
}

mysqli_select_db($conn, "inventory_management_db");
$pID = isset($_POST['product_id']) ? $_POST['product_id'] : ''; //to avoid error "Undefined index"
$pname=isset($_POST['product_name']) ? $_POST['product_name'] : '';
$pdes=isset($_POST['product_description']) ? $_POST['product_description'] : '';
$uPrice=isset($_POST['unit_price']) ? $_POST['unit_price'] : '';
$sellToday=isset($_POST['sold_today']) ? $_POST['sold_today'] : '';
$sellMonthly=isset($_POST['sold_Month']) ? $_POST['sold_Month'] : '';

$show= "SELECT * from stockreport where product_id='$pID'";
$result=mysqli_query($conn, $show) ;

$add="INSERT INTO stockreport(product_id, product_name, product_description, unit_price, sold_today, sold_month) VALUES ('$pID', '$pname','$pdes', '$uPrice', '$sellToday', '$sellMonthly')";
$reg=mysqli_query($conn, $add);

if($add){
    $_SESSION['Success']= 'Your data has been added';
    header('location: stockReport.php');
}
else{
    $_SESSION['status']= 'Your data could not be added';
    header('location: stockReport.php'); 
}
?>