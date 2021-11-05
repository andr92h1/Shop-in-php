<?php
session_start();
require_once('config.php');
session_destroy();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Webshop Admin</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
</head>
<body>

<div class="navigation">
    <nav class="navbar justify-content-center" style="background-color: black;" >
        <ul><a href="Index.php" style="color: white;" class="nav-link">Home</a></ul>
        <ul><a href="Products.php" style="color: white;" class="nav-link active">Products</a></ul>
        <ul><a href="Login.php" style="color: white;" class="nav-link">Log Out</a></ul>
    </nav>
</div>

<?php

$connect = mysqli_connect('localhost:3307', 'root', 'root','cart');

if (isset($_POST['upload'])) {

    $name = $_POST['name'];
    $image = $_POST['image'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO products (name, image, price, category, subcategory, quantity) VALUES (?,?,?,?,?,?)";
    $stmtinsert = $db->prepare($sql);
    $result = $stmtinsert->execute([$name, $image, $price, $category, $subcategory, $quantity]);
    if($result){
        header("Location:Products.php");
    }else {
        echo "There were errors";
    }

}

$sql="SELECT * FROM products";
$result=mysqli_query($connect,$sql);


?>
<div class ="container">
    <div class="row col-sm-3 justify-content-center">
        <form method="post" action="Admin.php">
        <label for="product"><b>Product Name</b></label>
        <input type="text" name="name" class="form-update" required />
        <label for="url"><b>Image URL</b></label>
        <input type="url" name="image" class="form-update" />
        <label for="price"><b>Price in DKK</b></label>
        <input type="text" name="price" class="form-update" required/>
            <label for="category"><b>Category</b></label>
            <input type="text" name="category" class="form-update"/>
            <label for="Subcategory"><b>Subcategory</b></label>
            <input type="text" name="subcategory" class="form-update" />
        <label for="quantity"><b>Quantity</b></label>
        <input type="text" name="quantity" class="form-update" value="0" required/>
        <input type="submit" name="upload" style="margin-top:20px;" class="btn btn-info" value="Upload Item" />
         </form>
    </div>
</div>

</body>
</html>