<?php
// Include the database connection file
require_once("dbConnection.php");

// Get id parameter value from URL
$nim = $_GET['nim'];

// Delete row from the database table
$result = mysqli_query($mysqli, "DELETE FROM tbl_mahasiswa WHERE `tbl_mahasiswa`.`nim` = $nim");

// Redirect to the main display page (index.php in our case)
header("Location:index.php#show");
?>