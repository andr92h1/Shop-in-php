<?php
session_start();
require_once('config.php');
require('functions.php');
?>

    <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Webshop Access</title>
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

<?php

    if (isset($_POST['login'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];


        $q = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $dbc = mysqli_connect('localhost:3307', 'root', 'root', 'cart');
        $result = mysqli_query($dbc, $q);


        if ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            if ($password == $row['password']) {
                header("Location: Index.php");
            }
        }
    }

?>

<form action="" method="post">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-3"
            <p>Log in below.</p>
            <hr class="mb-3">
            <label for="email"><b>Email</b></label>
            <input class="form-control" type="text" name="email" placeholder="Email" required>
            <label for="password"><b>Password</b></label>
            <input class="form-control" type="password" name="password" placeholder="Password" required>
            <hr class="mb-3">
        <input class="btn btn-secondary" type="submit" id="login" name="login" value="Log In">
        </div>
    </div>
</form>

<hr class="mb-3">

<div>

<?php
    if (isset($_POST['create'])){

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];



        $sql = "INSERT INTO users (firstname, lastname, email, phone, password) VALUES (?,?,?,?,?)";
        $stmtinsert = $db->prepare($sql);
        $result = $stmtinsert->execute([$firstname, $lastname, $email, $phone, $password]);
        if($result){
            header("Location:Index.php");
        }else {
            echo "There were errors";
        }
}
$dbc = mysqli_connect('localhost:3307', 'root', 'root','cart');


$sql="SELECT * FROM users";
$result=mysqli_query($dbc,$sql);

?>
</div>


<div>
    <form action="Login.php" method="post">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-3"
            <p>Fill up the form to register.</p>
                <hr class="mb-3">
                <label for="firstname"><b>First Name</b></label>
                <input  class="form-control" type="text" name="firstname" required >
                <label for="lastname"><b>Last Name</b></label>
                <input class="form-control" type="text" name="lastname" required>
                <label for="email"><b>Email Address</b></label>
                <input  class="form-control" type="email" name="email" required>
                <label for="phone"><b>Phone number</b></label>
                <input  class="form-control" type="text" name="phone" required>
                <label for="password"><b>Password</b></label>
                <input  class="form-control" type="password" name="password" required>
                <hr class="mb-3">

            <input class="btn btn-secondary" type="submit" id="register" name="create" value="Sign Up">
            </div>
        </div>
        </div>
    </form>

<hr class="mb-3">

<div class="container" >
    <div class="row justify-content-center">
        <form action="Logout.php" method="post">
            <input class="btn btn-secondary" type="submit" id="logout" name="destroy" value="Log Out">
        </form>
</div>


</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
 ////   $(function() {
 ////       $('#register').click(function() {
 ///           Swal.fire({
  //              'title': 'Welcome!',
  //              'text': "You are now a member.",
  //              'type': 'success',
 //               'timer': 3000
 //           })
 //       });

</script>

</body>
</html>