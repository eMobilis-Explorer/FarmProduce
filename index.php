<?php

// Start session
session_start();

include './php/connect.php';
require_once('./php/components.php');


if (isset($_POST['add'])) {
    // print_r($_POST['product_id']);

    if (isset($_SESSION['cart'])) {
        $item_array_id = array_column($_SESSION['cart'], "product_id");


        if (in_array($_POST['product_id'], $item_array_id)) {
            echo "<script>alert('Product is in cart...!')</script>";
            echo "<script>window.location = index.php</script>";
        } else {
            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
            // print_r($_SESSION['cart']);
        }
    } else {
        $item_array = array(
            'product_id' => $_POST['product_id']
        );

        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}

// Include header file

include './php/header.php';
?>


<title>Farm Produce</title>
</head>

<body>

    <header>
        <div class="container nav-row header">
            <!-- Hamburger for responsiveness -->
            <button class="nav-toggle" aria-label="open navigation">
                <span class="hamburger"></span>
            </button>
            <!-- Logo -->
            <a href="/" class="logo">
                <img src="./images/logo4.png" alt="Logo">
            </a>
            <!-- Navigation -->
            <nav class="nav">
                <ul class="nav_list">
                    <!-- <li class="nav_item"><a href="" class="nav_link">Home</a></li> -->
                    <li class="nav_item"><a href="" class="nav_link">Coming Soon</a></li>
                    <!-- <li class="nav_item"><a href="" class="nav_link"></a></li> -->
                    <li class="nav_item"><a href="" class="nav_link">About</a></li>
                    <li class="nav_item"><a href="" class="nav_link">Contact Us</a></li>
                </ul>
            </nav>
            <!-- Add the shopping cart count -->
            <?php
            require_once './php/shoppingcount.php';
            ?>
        </div>
    </header>

    <main>
        <!-- Shopping cart part -->
        <div class="container">
            <div class="cart-grid">
                <!-- Use php function created to insert the cart components -->
                <?php
                // Create query to get the data stored in products

                $sql = "SELECT * FROM `products` ORDER BY RAND()";
                // Run the query on the database
                $result = mysqli_query($conn, $sql);
                // show the results on every instance using the addCartItem function we created
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        addCartItems($row['product_name'], $row['product_price'], $row['product_image'], $row['product_seller'], $row['id']);
                    }
                }

                // addCartItems("Green Bannanas", 50, "greenbanana.jpg", "Verdant Foods");
                // addCartItems("Tomatoes", 70, "tomatoes.jpg", "KibiTheGreat Groceries");
                // addCartItems("Onions", 80, "onions.jpg", "Chici Farm Produce");
                // addCartItems("Water Melon", 60, "watermelon.jpg", "Leskim goods");
                // addCartItems("Sweet Bannanas", 80, "sweetbanana.jpg", "Riverside Groceries");
                // addCartItems("Mangoes", 60, "mangoes.jpg", "Kiambaa Farm");
                // addCartItems("Pawpaw", 80, "pawpaw.jpg", "Gift Groceries");
                // addCartItems("Oranges", 50, "oranges.jpg", "Delamare");
                // addCartItems("Avocados", 100, "avacado.jpg", "Zimmerman Groceries");
                // addCartItems("Carrots", 60, "carrots.jpg", "Chchi Farm produce");
                // addCartItems("Blueberries", 60, "blueberries.jpg", "YourHealth Groceries");


                ?>


                <!-- <div class="shopping-cart">
                    <form action="index.php" method="post">
                        <div class="cart">
                            <div class="cart-img">
                                <img src="./images/greenbanana.jpg" alt="Green Bannanas">
                            </div>
                            <div class="cart-body">
                                <h4 class="cart-title">Product1</h4>
                                <div class="seller">
                                    <h6>Seller : <span>Verdant Homes</span></h6>
                                </div>
                                <p class="cart-text">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime deleniti voluptatum a. Ad, eos voluptatum!
                                </p>
                                <!-- Price -->
                <!-- <p class="price">KSh 90 <span>per kilogram</span></p>
                                <button class="add_product" type="submit" name="add">Add to Cart <i class="fa-solid fa-cart-plus"></i></button>
                            </div>
                        </div>
                    </form>
                <!-- </div> -->

            </div>
        </div>
    </main>

    <?php

    include './php/footer.php';

    ?>