<?php
    include 'connection.php';
    session_start();
    $user_id = $_SESSION['user_id'];

    if(!isset($user_id)){
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html>
    <meta charset="UTF-8">        
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/about.css">
    <head>
        <title>About</title>
    </head>
    <body>
        <?php 
            include 'header.php';
        ?>
        <div class="heading">
            <h3>About us</h3>
            <p> <a href="home.php">Home</a> / About </p>
        </div>
        <section class="about">
            <div class="flex">
                <div class="image">
                    <img src="images/about-img.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Why choose us?</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet voluptatibus aut hic molestias, reiciendis natus fuga, cumque excepturi veniam ratione iure. Excepturi fugiat placeat iusto facere id officia assumenda temporibus?</p>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit quos enim minima ipsa dicta officia corporis ratione saepe sed adipisci?</p>
                    <a href="contact.php" class="btn">Contact us</a>
                </div>
            </div>
        </section>
        <?php 
            include 'footer.php';
        ?>
        <script src="js/script.js"></script>
    </body>
</html>