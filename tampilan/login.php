<?php
session_start();

// Redirect to index.php if the user is already logged in
if (isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- Custom Styles -->
    <link rel="stylesheet" href="../css/custom/style.css">

</head>
<body class="az-body">

    <div class="az-signin-wrapper">
        <div class="az-card-signin">
            <h1 class="az-logo">az<span>i</span>a</h1>
            <div class="az-signin-header">
                <h2>Welcome back!</h2>
                <h4>Please sign in to continue</h4>

                <form action="../proses/proses_login.php" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Enter your username" required>
                    </div><!-- form-group -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                    </div><!-- form-group -->
                    <button type="submit" class="btn btn-az-primary btn-block">Sign In</button>
                </form>
            </div><!-- az-signin-header -->

            <div class="az-signin-footer">
                <p><a href="#">Forgot password?</a></p>
            </div><!-- az-signin-footer -->
        </div><!-- az-card-signin -->
    </div><!-- az-signin-wrapper -->

    <!-- Bootstrap JS and dependencies -->
    

</body>
</html>
