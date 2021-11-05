<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Webshop</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
</head>
<body>

<div class="navigation">
    <nav class="navbar navbar-expand-md justify-content-center" style="background-color: black;" >
        <ul><a href="Index.php" style="color: white;" class="nav-link active">Home</a></ul>
        <ul><a href="Products.php" style="color: white;" class="nav-link">Products</a></ul>
        <ul><a href="Login.php" style="color: white;" class="nav-link">Login</a></ul>
    </nav>
</div>

<div class="promo">

<?php

$dbc = mysqli_connect('localhost:3307', 'root', 'root','cart');

$sql="SELECT * FROM products";
$result=mysqli_query($dbc,$sql);
$categories=[];
$subcategories=[];
foreach($result->fetch_all(MYSQLI_ASSOC) as $row){
    $categories[$row["category"]]=$row["category"]  ;
    $subcategories[$row["subcategory"]]=$row["category"];

}
?>



<form action="Products.php">
    <select name="products" onchange="if (this.value!=1){window.location = this.value;}"  onfocus="this.selectedIndex = -1;}">
        <option value="1">Find products by category</option>
        <?php
        foreach ($categories as $category){
            ?>    <optgroup label="<?php echo $category ?>">
                <?php
                foreach($subcategories as $key=>$subcategory) {
                    if ($subcategory==$category){
                        ?>            <option value="<?php echo "?subcategory=".$key;  ?>">  <?php echo $key; ?></option>
                        <?php
                    }
                }
                ?>    </optgroup>
            <?php

        }
        if ($_GET["subcategory"]){
            header("LOCATION: Products.php?subcategory=".$_GET["subcategory"]);
        }

        ?></select>
</form>

</div>
</body>
</html>
