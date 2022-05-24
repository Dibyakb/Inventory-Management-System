<?php
$servername= "localhost";
$username= "root";
$password= "";
$dbname= "inventory_management_db";

$conn= mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die("conection failed: ". mysqli_connect_error());
}


$show="select * from product";
$result=mysqli_query($conn, $show) ;

?>

<!DOCTYPE HTML>
    <html>
        <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
            <title>
                Product Management
            </title>

            <style>
                #buttons{
                    margin-left=250px;
                }
            </style>
        </head>

        <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="inventoryHome.html" target="_blank">Go To Home Page</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                </div>
            </div>
        </nav>
            <table class="table" border="1">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Product Description</th>
                        <th>Unit Price</th>
                        <th>Unit</th>
                        <th>Delete</th>
                        <th>Update</th>
                    </tr>

                </thead>
                
                <tbody>
                    <?php
                    while($row=mysqli_fetch_assoc($result)){?>
                        <tr>
                        <td><?php echo $row ['product_id'] ?></td>
                        <td><?php echo $row ['product_name'] ?></td>
                        <td><?php echo $row ['product_description']?></td>
                        <td><?php echo $row ['unit_price'] ?></td>
                        <td><?php echo $row ['unit'] ?></td>
                        <td>
                            <form action="deleteRecord.php" method="POST">
                            <input type="hidden" name="delete_id" value= <?php echo $row['product_id']?>>
                            <button type="submit" class="btn btn-danger" name="deletion">DELETE</button>
                            </form>
                        </td>
                        <td>
                            <form action="updateRecord.php" method="POST">
                            
                                <a href="#" onclick='window.open("updateRecord.php");return false;'><button type="submit" class="btn btn-primary" name="product_id">UPDATE</button></a>
                            </form>
                        </td>
                        </tr>
                   <?php }?>
                    
                </tbody>
            </table>
            

<div>
    <!-- Adding new record -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD New Record</button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Records</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="addRecord.php" method="POST">
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
                <label>Unit</label>
                <input type="text" method="POST" name="unit" class="form-control" placeholder="Enter product quantity">
            </div>

                <div>
                    <button type="button" class="btn-btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn-btn-primary">ADD Record</button>
                </div>

            </form>
        </div>

        </div>
    </div>
    </div>

</div>



            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
        </body>

    </html>