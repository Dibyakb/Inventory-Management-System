<?php
$servername="localhost";
$username="root";
$password="";
$dbname="inventory_management_db";

$conn=mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die('connection failed: '.mysqli_connect_error());
}

$show="SELECT product_id, product_name, product_description, purchased, sold, purchased-sold as remaining FROM stock_information";
$show_table=mysqli_query($conn, $show);

//$pID=$_POST['product_id'];

//$query1="INSERT INTO stock_information (sold) SELECT sold_Month FROM stockreport";
//$runquery1=mysqli_query($conn, $query1);





?>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <title>Stock Management</title>
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
        <table class="table" border="2">
            <thead>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Description</th>
                <th>Purchased</th>
                <th>Sold</th>
                <th>Remaining</th>
                <th>Update</th>
            </thead>
            <tbody>
                <?php
                while($row=mysqli_fetch_assoc($show_table)){?>
                    <tr>
                        <td><?php echo $row['product_id']?></td>
                        <td><?php echo $row['product_name']?></td>
                        <td><?php echo $row['product_description']?></td>
                        <td class="qpurchase" value="$row['purchased']"><?php echo $row['purchased']?> </td>
                    <?//php
                        //while($row=mysqli_fetch_assoc($runquery1)){?>
                        <td class="psold" value="$row['sold']"><?php echo $row['sold']?></td>
                        <!--<//?php
                        }
                        ?>-->
                        
                        <td class="premains">
                            <?=$row['remaining']?>
                        </td>
                        <td>
                        
                       
                        <a href="#" onclick='window.open("updateStock.php");return false;'><button type="submit" class="btn btn-primary" >UPDATE</button></a>

                        </td>
                    </tr>
               <?php } ?>
                
            </tbody>
        </table>

        <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="addStock.php" method="POST">
                        <div>
                            <label>Product ID</label>
                            <input type="number" method= "POST" name="product_id" class="form-control" placeholder="Enter product ID">
                        </div>
                        <div>
                            <label>Product Name</label>
                            <input type="text" method= "POST" name="product_name" class="form-control" placeholder="Enter product name">
                        </div>
                        <div>
                            <label>Product Description</label>
                            <input type="text" method= "POST" name="product_description" class="form-control" placeholder="Enter product description">
                        </div>
                        <div>
                            <label>Purchased</label>
                            <input type="number" method= "POST" name="purchased" class="form-control" placeholder="Enter the purchased quantity">
                        </div>
                        <div>
                            <label>Sold</label>
                            <input type="number" method= "POST" name="sold" class="form-control" placeholder="Enter the number of sold quantity">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">ADD</button>
                        </div>
                    </form>
                </div>
                
                </div>
            </div>
            </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    </body>
</html>