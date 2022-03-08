<span class="material-icons-outlined">shopping_cart</span>
<?php

if (isset($_SESSION['cart'])) {
    $count = count($_SESSION['cart']);
    echo "<span class='cart_count' id='cart_count'>$count</span>";
} else {
    echo "<span class='cart_count' id='cart_count'>0</span>";
}
?>
Cart
</a>
</div>