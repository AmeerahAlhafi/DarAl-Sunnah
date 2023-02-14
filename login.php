<?php
$title = 'Login';
 include 'config.php';
 include 'template/header.php';
  

    if (isset($_SESSION['SESSION_EMAIL'])) {
       // header("Location:login.php");
        die();
    }
    
   
    $msg = "";

    if (isset($_GET['verification'])) {
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE code='{$_GET['verification']}'")) > 0) {
            $query = mysqli_query($conn, "UPDATE users SET code='' WHERE code='{$_GET['verification']}'");
            
            if ($query) {
                $msg = "<div class='alert alert-success'>Account verification has been successfully completed</div>";
            }
        } else {
            header("Location: login.php");
        }
    }

    
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = md5($_POST['password']);
        $login = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' and `password`='$password' limit 1");
        if(mysqli_num_rows($login) ==1){
    
            $user = mysqli_fetch_assoc($login);
            if (empty($user['code'])) {
            $_SESSION['loggedIn'] =true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $email;
       
        header('Location:index.php');
    } else {
        $msg = "<div class='alert alert-info'>First verify your account and try again</div>";
    }
} else {
    $msg = "<div class='alert alert-danger'>Email or password do not match</div>";
}
 }
  
        
?>


    <!-- form section start -->
    <section class="w3l-mockup-form">
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                         <div class="content-wthree">
                        <h2>Login Now</h2>
                        <?php echo $msg; ?>
                        <form method="post">
                            <input type="email" class="email" name="email" placeholder="Enter Your Email"  placeholder="john.doe@email.com" required>
                            <input type="password" class="password" name="password" placeholder="Enter Your Password" style="margin-bottom: 2px;" required>
                            <p><a href="forgot-password.php" style="margin-bottom: 15px; display: block; text-align: right;">Forgot Password?</a></p>
                            <button name="submit" name="submit" class="btn" type="submit">Login</button>
                        </form>
                        <div class="social-icons">
                            <p>Create Account! <a href="register.php">Register</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
    <!-- //form section start -->

    <script src="js/jquery.min.js"></script>
    <script>
        $(document).ready(function (c) {
            $('.alert-close').on('click', function (c) {
                $('.main-mockup').fadeOut('slow', function (c) {
                    $('.main-mockup').remove();
                });
            });
        });
    </script>

<?php 

include 'template/footer.php';?>