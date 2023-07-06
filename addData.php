<html>

<head>
	<title>Tambah Data Mahasiswa</title>
</head>

<body>
	<?php
	// Include the database connection file
	require_once("dbConnection.php");

	if (isset($_POST['submit'])) {
		// Escape special characters in string for use in SQL statement	
		$nim = mysqli_real_escape_string($mysqli, $_POST['nim']);
		$nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
		$alamat = mysqli_real_escape_string($mysqli, $_POST['alamat']);
		$nohp = mysqli_real_escape_string($mysqli, $_POST['nohp']);
		$pass = mysqli_real_escape_string($mysqli, $_POST['password']);
		//$pass = password_hash($_POST["password"], PASSWORD_DEFAULT);
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

		// Check for empty fields
		if (empty($nim) || empty($nama) || empty($alamat) || empty($nohp) || empty($pass) || empty($image)) {
			if (empty($nim)) {
				echo "<font color='red'>NIM field is empty.</font><br/>";
			}

			if (empty($nama)) {
				echo "<font color='red'>Nama field is empty.</font><br/>";
			}

			if (empty($alamat)) {
				echo "<font color='red'>Alamat field is empty.</font><br/>";
			}

			if (empty($nohp)) {
				echo "<font color='red'>No. HP field is empty.</font><br/>";
			}

			if (empty($pass)) {
				echo "<font color='red'>Password field is empty.</font><br/>";
			}

			if (empty($image)) {
				echo "<font color='red'>Photo is empty.</font><br/>";
			}

			// Show link to the previous page
			echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
		} else {
			// If all the fields are filled (not empty) 

			// Insert data into database
			$query = "INSERT INTO tbl_mahasiswa  VALUES ('$nim', '$nama', '$alamat','$nohp', '$pass','$image')";
			$result = mysqli_query($mysqli, $query);

			// Display success message
			//echo $query;
			echo "<p><font color='green'>Data added successfully!</p>";
			echo "<a href='index.php#show'>View Result</a>";
		}
	}
	?>
</body>

</html>