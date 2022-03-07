<?php

session_start();

include './php/connect.php';
require_once('./php/components.php');
include './php/header.php';

if (isset($_POST['remove'])) {
    // print_r($_GET['id']);
    if ($_GET['action'] == 'remove') {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['product_id'] == $_GET['id']) {
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Product has been removed...!')</script>";
                echo "<script>window.location = cart.php</script>";
            }
        }
    }
}

?>


<title>Cart</title>

</head>

<body>

    <div class="header_cart">
        <div class="header container">
            <h2>Your Cart</h2>
            <!-- Add the shopping cart count -->
            <?php
            require_once './php/shoppingcount.php';
            ?>
        </div>
    </div>

    <div class="mycart_grid container">
        <div class="my_cart">
            <!-- Form taken to components.php -->

            <?php

            $total = 0;

            if (isset($_SESSION['cart'])) {
                $product_id = array_column($_SESSION['cart'], 'product_id');

                $sql = "SELECT * FROM `products` ";

                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    foreach ($product_id as $id) {
                        if ($row['id'] == $id) {
                            cartElement($row['product_image'], $row['product_name'], $row['product_seller'], $row['product_price'], $row['id']);
                            $total = $total + (int)$row['product_price'];
                        }
                    }
                }
            } else {
                echo "<h5>Cart is empty</h5>";
            }




            ?>
            <!-- <form action="cart.php" method="get" class="cart-items row">
                    <div class="cart-img">
                        <img src="./images/avacado.jpg" alt="Avocado">
                    </div>
                    <div class="details">
                        <h5>Product 1</h5>
                        <div class="seller">
                            <h6>Seller : <span>Verdant Homes</span></h6>
                        </div>
                        <h5 class="price">$2444</h5>
                        <button type="submit" class="addtowish">Add to Wishlist</button>
                        <button type="submit" class="remove" name="remove">Remove</button>
                    </div>
                    <div class="addremove">
                        <div class="no_product">
                            <button type="button" class="minus" id="minus">
                                <span class="material-icons-outlined">remove</span>
                            </button>
                            <input type="text" class="product_no" value="1">
                            <button type="button" class="add" id="add">
                                <span class="material-icons-outlined">add</span>
                            </button>
                        </div>
                    </div>
                </form> -->

        </div>
        <div class="checkout">
            <div class="price-det">
                <h6>Price details</h6>
                <hr>
            </div>

            <div class="price-details">
                <div class="cont1">
                    <?php

                    if (isset($_SESSION['cart'])) {
                        $count = count($_SESSION['cart']);
                        echo "<h5>Price ($count items)</h5>";
                    } else {
                        echo "<h5>Price (0 items)</h5>";
                    }
                    ?>
                    <h5>Amount Payable</h5>
                </div>
                <div class="cont2">
                    <h5>KSh <?php echo $total; ?></h5>
                </div>
            </div>


        </div>
    </div>














    <?php

    include './php/footer.php';

    ?>