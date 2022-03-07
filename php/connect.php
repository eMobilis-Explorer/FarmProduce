<?php

//connection between php and mysql database
$conn = new mysqli('localhost', 'root', '', 'farm_products');


// If not connected show error
if (!$conn) {
    die(mysqli_error($conn));
}
