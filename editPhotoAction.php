<html>
<head>
	<title>Edit Photo Mahasiswa</title>
</head>

<body>
<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['submit'])) {
	// Escape special characters in string for use in SQL statement	
	$nim = mysqli_real_escape_string($mysqli, $_POST['nim']);
	$nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		
	// Check for empty fields
	if (empty($image)) {

        if (empty($image)) {
			echo "<font color='red'>Photo is empty.</font><br/>";
		}
		
		// Show link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// If all the fields are filled (not empty) 

		// Insert data into database
       // $query = "UPDATE tbl_mahasiswa SET nama = '$nama','image' = '$image' WHERE 'nim' = $nim;";
		$query = "UPDATE `tbl_mahasiswa` SET `image` = '$image' WHERE `tbl_mahasiswa`.`nim` = $nim;";
		//$query = "UPDATE tbl_mahasiswa SET 'image' = '$image' WHERE 'nim' = $nim;";
		$result = mysqli_query($mysqli, $query);
		
		// Display success message
        //echo $query;
		//echo $query;
		echo "<p><font color='green'>Data edited successfully!</p>";
		echo "<a href='index.php#show'>View Result</a>";
	}
}
?>
</body>
</html>
