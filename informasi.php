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

    <?php
    session_start();
    include('dbConnection.php');
    //include('cekLogin.php');  

    //  $nim = isset($_POST['nim']) ? $_POST['nim'] : '';

    $nim = $_SESSION['nim'];
    //$password = $_POST['password'];
    $query = "SELECT * FROM tbl_mahasiswa where nim=$nim";
    $result = $mysqli->query($query);
    $row = $result->fetch_assoc()
    ?>

    <!-- Header -->
    <header class="w3-container w3-theme w3-padding" id="myHeader">
        <div class="w3-center">
            <h4>Membuat Web Dengan PHP Native</h4>
            <h1 class="w3-xxxlarge w3-animate-bottom">INFORMASI MAHASISWA</h1>
            <!--
    <div class="w3-padding-32">
      <button class="w3-btn w3-xlarge w3-dark-grey w3-hover-light-grey" onclick="document.getElementById('id01').style.display='block'" style="font-weight:900;">LEARN W3.CSS</button>
    </div>
  </div> -->
    </header>

    <!-- Modal -->
    <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-top">
            <header class="w3-container w3-theme-l1">
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">×</span>
                <h4>Oh snap! We just showed you a modal..</h4>
                <h5>Because we can <i class="fa fa-smile-o"></i></h5>
            </header>
            <div class="w3-padding">
                <p>Cool huh? Ok, enough teasing around..</p>
                <p>Go to our <a class="w3-btn" href="/w3css/default.asp">W3.CSS Tutorial</a> to learn more!</p>
            </div>
            <footer class="w3-container w3-theme-l1">
                <p>Modal footer</p>
            </footer>
        </div>
    </div>

    <div class="w3-row-padding w3-center w3-margin-top center">
        <div class="w3-third">
            <div class="w3-card w3-container center1" style="min-height:460px">
                <h3>Data Mahasiswa</h3><br>
                <img height="100px" src="data:image/jpg;base64,<?php echo base64_encode($row['image']); ?>"></br></br>
                <label>NIM : </label> <label name="nim"><?php echo $row['nim']; ?></label></br>
                <label>Nama : </label> <label><?php echo $row['nama']; ?></label></br>
                <label>Alamat : </label> <label><?php echo $row['alamat']; ?></label></br>
                <label>No. HP : </label> <label><?php echo $row['nohp']; ?></label></br>
                <p>
                    <a href="login.php">Logout</a>
                    <a href="index.php"> Main Menu</a>
                </p>
            </div>
        </div>
    </div></br>

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