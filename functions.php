<?php

$connect = mysqli_connect('localhost:3307', 'root', 'root','cart');
$_SESSION['admin'] = '1';
$sql="SELECT * FROM users WHERE admin = '1'";
$result=mysqli_query($connect,$sql);


if(isset($_POST['admin'])) {
    header("Location:Admin.php");
    }else if(isset($_POST['user'])) {
    header("Location:Login.php");
}

