<?php
session_start();

require_once('functions.php');

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Yoga Webshop</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
</head>
<body>

<div class="navigation">
    <nav class="navbar navbar-expand-md justify-content-center" style="background-color: black;" ></nav>

    <div class="mainbuttons">
    <form method="post" class="btn">
        <input class="btn btn-light" type="submit" id="user" name="user" value="USER">
        <input class="btn btn-dark" type="submit" id="admin" name="admin" value="ADMIN">
    </form>
    </div>

</div>

</body>
</html>
