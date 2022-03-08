<?php

//connection between php and mysql database
// $conn = new mysqli('localhost', 'root', '', 'farm_products');

// // If not connected show error
// if (!$conn) {
//     die(mysqli_error($conn));
// }



//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"], 1);
$active_group = 'default';
$query_builder = true;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
