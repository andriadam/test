<?php

$conn = mysqli_connect("localhost", "root", "", "test");
$mhs = mysqli_query($conn, "DELETE FROM mhs where id=$_GET[id]");
header("Location: index.php");
die;


