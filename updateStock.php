<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <title>Stock Update</title>
    </head>
    
    <body>
        <form action="" method="POST">
        <div class="form-group">
              <label>Product ID</label>
              <input type="number" method="POST" name="product_id"  class="form-control" placeholder="Enter product id">
          </div>
          <div class="form-group">
              <label>Product Name</label>
              <input type="text" method="POST" name="product_name"  class="form-control" placeholder="Enter product name">
          </div>

          <div class="form-group">
              <label>Product Description</label>
              <input type="text" method="POST" name="product_description"  class="form-control" placeholder="Enter product description">
          </div>

          <div class="form-group">
              <label>Purchased</label>
              <input type="number" method="POST" name="purchased"  class="form-control" placeholder="Enter unit price">
          </div>

          <div class="form-group">
              <label>Sold</label>
              <input type="number" method="POST" name="sold"  class="form-control" placeholder="Enter product quantity">
          </div>

          <button type="submit" name="updateStock" class="btn-btn-primary">Update</button>

        </form>

        <a href="stockManagement.php"><button type="submit" class="btn btn-primary">Go Back</button></a>

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
    die("connection failed: ".mysqli_connect_error());
}

mysqli_select_db($conn, "inventory_management_db");






if(isset($_POST['updateStock'])){

    $pID=($_POST['product_id'] ? $_POST['product_id'] : '');
    $productname=isset($_POST['product_name']) ? $_POST['product_name'] : '';
    $productdescr=isset($_POST['product_description']) ? $_POST['product_description'] : '';
    $purchaseQuantity=isset($_POST['purchased']) ? $_POST['purchased'] : '';
    $sellQuantity=isset($_POST['sold']) ? $_POST['sold'] : '';


    $update="UPDATE stock_information SET purchased='$purchaseQuantity', sold='$sellQuantity' WHERE product_id='$pID'";
    $reseult=mysqli_query($conn, $update);




}


?>