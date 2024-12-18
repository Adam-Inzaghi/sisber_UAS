<?php
    session_start();
    if (isset($_SESSION['username'])) {
        header("Location: ../index.php");
        exit();
    }
?>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="../css/custom/style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.12.2/lottie.min.js"></script>
    </head>
    <body class="az-body">

        <div class="az-signin-wrapper">
            <div class="az-card-signin">

                <div class="az-signin-header">

                    <div id="lottie-container" style="width: 300px; height: 100px;"></div>
                    <script>
                        lottie.loadAnimation({
                            container: document.getElementById('lottie-container'),
                            renderer: 'svg',
                            loop: true,
                            autoplay: true,
                            path: '../assett/playstation.json'
                        });
                    </script>

                    <h4>Login Tatang Playstation</h4>

                    <?php
                        if (isset($_GET['error'])) {
                            $error = $_GET['error'];
                            if ($error == 'password_salah') {
                                echo "<p style='color: red;'>Password salah, coba lagi.</p>";
                            } elseif ($error == 'username_tidak_ditemukan') {
                                echo "<p style='color: red;'>Username tidak ditemukan, coba lagi.</p>";
                            }
                        }
                    ?>

                    <form action="../proses/proses_login.php" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control" placeholder="Enter your username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                        </div>
                        <button type="submit" class="btn btn-purple btn-block">Login</button>
                    </form>

                </div>

            </div>
        </div>

    </body>

</html>
