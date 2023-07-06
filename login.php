<html>

<head>
    <title>Login</title>
    <style>
        body {
            background: #eee;
        }

        #frm {
            border: solid gray 1px;
            width: 20%;
            border-radius: 2px;
            margin: 120px auto;
            background: white;
            padding: 50px;
        }

        #btn {
            color: #fff;
            background: #337ab7;
            padding: 7px;
        }

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
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "gagal") {
            echo "<h3 class='center2'>Login gagal! username dan password salah!</h3>";
        } else if ($_GET['pesan'] == "logout") {
            echo "Anda telah berhasil logout";
        } else if ($_GET['pesan'] == "belum_login") {
            echo "Anda harus login untuk mengakses halaman admin";
        }
    }
    ?>
    <div id="frm">
        <h1 class="center2">Login</h1>
        <form action="cekLogin.php" method="post" id="nameform">
            <div class="center2">
                <p>
                    <input type="text" name="nim" placeholder="NIM"></br>
                </p>
                <p>
                    <input type="password" name="password" placeholder="Password"></br>
                </p>

                <button id="btn" type="submit" form="nameform" value="submit">Login</button>
            </div>
        </form>
    </div>

    <script>
        function validation() {
            var id = document.f1.user.value;
            var ps = document.f1.pass.value;
            if (id.length == "" && ps.length == "") {
                alert("User Name and Password fields are empty");
                return false;
            } else {
                if (id.length == "") {
                    alert("User Name is empty");
                    return false;
                }
                if (ps.length == "") {
                    alert("Password field is empty");
                    return false;
                }
            }
        }
    </script>
</body>

</html>