<?php
$title = 'admin';
include 'config.php';
include 'template\header.php';




if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Admins_email = mysqli_real_escape_string($conn, $_POST['a_email']);
    $password = $_POST['a_password'];
    
    $login = mysqli_query($conn, "SELECT Admins_id FROM admins  WHERE `Admins_email`='$Admins_email' and `password`='$password' LIMIT 1;");
    
    if(mysqli_num_rows($login) ==1){
        
        $_SESSION['admin'] =true;
       
        header('Location:index.php');
    }else{
        echo '<div class="alert alert-warning">Username or password is an error</div>';
  
    }
  
  }
?>
<body>


    <!-- form section start -->
    <section class="w3l-mockup-form">
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-mockup">

                    <div class="content-wthree">
                        <h2>Admin</h2>
                        <form action="" method="post">
                            <input type="email" class="email" name="a_email" placeholder="Enter Your Email" value="" required>
                            <input type="password" class="password" name="a_password" placeholder="Enter Your Password" style="margin-bottom: 2px;" required>
                            <button name="submit" name="send" class="btn" type="submit">Login</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
    <!-- //form section start -->

    <br>
    <?php

    include 'template\footer.php'; ?>