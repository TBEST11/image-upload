<?php
$con=new mysqli('localhost', 'root', '', 'newwork');
if (!$con) {
    die(mysqli_error($con));
}
?>