<?php
// Include the database connection file
require_once("dbConnection.php");

// Get id from URL parameter
$nim = $_GET['nim'];

// Select data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM tbl_mahasiswa WHERE nim = $nim");

// Fetch the next row of a result set as an associative array
$resultData = mysqli_fetch_assoc($result);
$row = $result->fetch_assoc();

$nim = $resultData['nim'];
$nama = $resultData['nama'];
$alamat = $resultData['alamat'];
$nohp = $resultData['nohp'];
$password = $resultData['password'];
$image = $resultData['image'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>W3.CSS Template</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
    <style>
        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 500px;
        }

        .center1 {
            padding: 70px 0;
            text-align: center;
        }

        .center2 {
            text-align: center;
        }
    </style>
</head>

<body>
    </div>
    <div class="w3-row-padding" id="input">
        <div>
            <form class="w3-container w3-card-4" action="editPhotoAction.php" method="post" name="edit" enctype="multipart/form-data">
                <h2 class="center2">Edit Data Mahasiswa</h2>
                <div class="w3-section">
                    <label>NIM</label>
                    <input class="w3-input" type="text" name="nim" value="<?php echo $nim;?>" >
                </div>
                <div class="w3-section">
                    <label>Nama Lengkap</label>
                    <input class="w3-input" type="text" name="nama" value="<?php echo $nama; ?>" required>
                </div>
                
                <img height="100px" src="data:image/jpg;base64,<?php echo base64_encode($image); ?>">

                  <div class="w3-section">
                    <label>Upload Photo</label></br>
                    <input type="file" name="image" required>
                </div>

                <div class="w3-section center2">
                <td><input type="hidden" name="nim" value=<?php echo $nim; ?>></td>
                    <input type="submit" name="submit" value="Edit Photo">
                </div>

            </form>
        </div>
    </div>
    <!-- Footer -->
    <footer class="w3-container w3-theme-dark w3-padding-16">
        <h3>Footer</h3>
        <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
        <div style="position:relative;bottom:55px;" class="w3-tooltip w3-right">
            <span class="w3-text w3-theme-light w3-padding">Go To Top</span> 
            <a class="w3-text-white" href="#myHeader"><span class="w3-xlarge">
                    <i class="fa fa-chevron-circle-up"></i></span></a>
        </div>
        <p>Remember to check out our  <a href="w3css_references.asp" class="w3-btn w3-theme-light" target="_blank">W3.CSS Reference</a></p>
    </footer>

    <!-- Script for Sidebar, Tabs, Accordions, Progress bars and slideshows -->
    <script>
        // Side navigation
        function w3_open() {
            var x = document.getElementById("mySidebar");
            x.style.width = "100%";
            x.style.fontSize = "40px";
            x.style.paddingTop = "10%";
            x.style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
        }

        // Tabs
        function openCity(evt, cityName) {
            var i;
            var x = document.getElementsByClassName("city");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            var activebtn = document.getElementsByClassName("testbtn");
            for (i = 0; i < x.length; i++) {
                activebtn[i].className = activebtn[i].className.replace(" w3-dark-grey", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " w3-dark-grey";
        }

        var mybtn = document.getElementsByClassName("testbtn")[0];
        mybtn.click();

        // Accordions
        function myAccFunc(id) {
            var x = document.getElementById(id);
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }

        // Slideshows
        var slideIndex = 1;

        function plusDivs(n) {
            slideIndex = slideIndex + n;
            showDivs(slideIndex);
        }

        function showDivs(n) {
            var x = document.getElementsByClassName("mySlides");
            if (n > x.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = x.length
            };
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            x[slideIndex - 1].style.display = "block";
        }

        showDivs(1);

        // Progress Bars
        function move() {
            var elem = document.getElementById("myBar");
            var width = 5;
            var id = setInterval(frame, 10);

            function frame() {
                if (width == 100) {
                    clearInterval(id);
                } else {
                    width++;
                    elem.style.width = width + '%';
                    elem.innerHTML = width * 1 + '%';
                }
            }
        }
    </script>

</body>

</html>