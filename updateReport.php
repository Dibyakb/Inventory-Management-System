<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <title>Update Report</title>
    </head>

    <body>
        <form action="" method="POST">
            <div class="form-group">
                <label>Product ID</label>
                <input type="number" method="POST" name="product_id" class="form-control" placeholder="Enter product id">
            </div>
            <div class="form-group">
                <label>Product Name</label>
                <input type="text" method="POST" name="product_name" class="form-control" placeholder="Enter product name">
            </div>
            <div class="form-group">
                <label>Product Description</label>
                <input type="text" method="POST" name="product_description" class="form-control" placeholder="Enter product description">
            </div>
            <div class="form-group">
                <label>Unit Price</label>
                <input type="text" method="POST" name="unit_price" class="form-control" placeholder="Enter unit price">
            </div>
            <div class="form-group">
                <label>Sold Today</label>
                <input type="number" method="POST" name="sold_today" class="form-control" placeholder="Enter the number of this product sold today">
            </div>
            <div class="form-group">
                <label>Sold Monthly</label>
                <input type="number" method="POST" name="sold_Month" class="form-control" placeholder="Enter the number of this product sold this month">
            </div>
            <div>
                <button type="submit" class="btn btn-primary" name="updateReport">Update</button>
            </div>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    </body>
</html>

<?php
$servername="localhost";
$username="root";
$password="";
$dbname="inventory_management_db";

$conn=mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die('connection failed: '.mysqli_connect_error());
}

$show="SELECT * from stockreport";
$show_table=mysqli_query($conn, $show);

if(isset($_POST['updateReport'])){
    $productID=($_POST['product_id'] ? $_POST['product_id'] : '');
    $productname=isset($_POST['product_name']) ? $_POST['product_name'] : '';
    $productdescr=isset($_POST['product_description']) ? $_POST['product_description'] : '';
    $unitPrice=isset($_POST['unit_price']) ? $_POST['unit_price'] : '';
    $dailySell=isset($_POST['sold_today']) ? $_POST['sold_today'] : '';
    $monthlySell=isset($_POST['sold_Month']) ? $_POST['sold_Month'] : '';

    $update="UPDATE stockreport SET unit_price='$unitPrice', sold_today='$dailySell', sold_Month='$monthlySell' WHERE product_id='$productID'";
    $reseult=mysqli_query($conn, $update);
}
?>
