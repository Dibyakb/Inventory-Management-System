<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <title>Update Record</title>
    </head>
    
    <body>
        <form action="" method="POST">
        <div class="form-group">
              <label>Product ID</label>
              <input type="text" method="POST" name="product_id"  class="form-control" placeholder="Enter product id">
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
              <label>Unit Price</label>
              <input type="text" method="POST" name="unit_price"  class="form-control" placeholder="Enter unit price">
          </div>

          <div class="form-group">
              <label>Unit</label>
              <input type="text" method="POST" name="unit"  class="form-control" placeholder="Enter product quantity">
          </div>

          <button type="submit" name="update" class="btn-btn-primary">Update</button>

        </form>

        <a href="productManagement.php"><button type="submit" class="btn btn-primary">Go Back</button></a>

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




//$show="SELECT * from product";
//$reg=mysqli_connect($conn, $show);

if(isset($_POST['update'])){
    $pID=$_POST['product_id'] ? $_POST['product_id'] : '';
    $pname=isset($_POST['product_name']) ? $_POST['product_name'] : '';
    $pdes=isset($_POST['product_description']) ? $_POST['product_description'] : '';
    $unitPrice=isset($_POST['unit_price']) ? $_POST['unit_price'] : '';
    $quantity=isset($_POST['unit']) ? $_POST['unit'] : '';


    $update="UPDATE product SET product_name='$pname', product_description='$pdes', unit_price='$unitPrice', unit='$quantity' WHERE product_id='$pID'";
    $reseult=mysqli_query($conn, $update);


}

?>