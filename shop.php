<?php
    include 'connection.php';
    session_start();
    $user_id = $_SESSION['user_id'];

    if(!isset($user_id)){
        header('location:login.php');
    }

    if(isset($_POST['add_to_cart'])){

        $prod_name = $_POST['prod_name'];
        $prod_price = $_POST['prod_price'];
        $prod_img = $_POST['prod_image'];
        $prod_quantity = $_POST['prod_quantity'];

        $check_cart_numbers = mysqli_query($cnnx, "SELECT * FROM `cart` WHERE name = '$prod_name' AND user_id = '$user_id'") or die('query failed');

        if(mysqli_num_rows($check_cart_numbers) > 0){
            $message[] = 'already added to cart!';
        }
        else{
            mysqli_query($cnnx, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$prod_name', '$prod_price', '$prod_quantity', '$prod_img')") or die('query failed');
            $message[] = 'product added to cart!';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shop</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <link rel="stylesheet" href="css/shop.css">
    </head>
    <body>
        <?php 
            include 'header.php';
        ?>
        <div class="heading">
            <h3>My shop</h3>
            <p> <a href="home.php">Home</a> / Shop </p>
        </div>
        <section class="products">
            <h1 class="title">latest products</h1>
            <div class="box-container">
                <?php  
                    $select_products = mysqli_query($cnnx, "SELECT * FROM `products`") or die('query failed');
                    if(mysqli_num_rows($select_products) > 0){
                        while($fetch_products = mysqli_fetch_assoc($select_products)){
                ?>
                <form action="" method="post" class="box">
                    <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
                    <div class="name"><?php echo $fetch_products['name']; ?></div>
                    <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
                    <input type="number" min="1" name="prod_quantity" value="1" class="qty">
                    <input type="hidden" name="prod_name" value="<?php echo $fetch_products['name']; ?>">
                    <input type="hidden" name="prod_price" value="<?php echo $fetch_products['price']; ?>">
                    <input type="hidden" name="prod_img" value="<?php echo $fetch_products['image']; ?>">
                    <input type="submit" value="add to cart" name="add_to_cart" class="btn">
                </form>
                <?php
                        }
                    }
                    else{
                        echo '<p class="empty">no products added yet!</p>';
                    }
                ?>
            </div>
        </section>
        <?php 
            include 'footer.php';
        ?>
        <script src="js/script.js"></script>
    </body>
</html>