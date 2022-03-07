<?php

function addCartItems($productname, $productprice, $productimage, $seller, $productid)
{
    $cart = "

    <div class=\"shopping-cart\">
                    <form action=\"index.php\" method=\"post\">
                        <div class=\"cart\">
                            <div class=\"cart-img\">
                                <img src=\"./images/$productimage\" alt=\"$productname\">
                            </div>
                            <div class=\"cart-body\">
                                <h4 class=\"cart-title\">$productname</h4>
                                <div class=\"seller\">
                                <h6>Seller : <span>$seller</span></h6>
                                </div>
                                <p class=\"cart-text\">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime deleniti voluptatum a. Ad, eos voluptatum!
                                </p>
                                <!-- Price -->
                                <p class=\"price\">KSh $productprice <span>per kilogram</span></p>
                                <button class=\"add_product\" type=\"submit\" name=\"add\">Add to Cart <i class=\"fa-solid fa-cart-plus\"></i></button>
                                <input type =\"hidden\" name=\"product_id\" value=\"$productid\">
                            </div>
                        </div>
                    </form>
                </div>
        
    ";

    echo $cart;
}


function cartElement($productimage, $productname, $seller, $productprice, $productid)
{
    $element = "
    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items row\">
    <div class=\"cart-img\">
        <img src=\"./images/$productimage\" alt=\"$productname\">
    </div>
    <div class=\"details\">
        <h5>$productname</h5>
        <div class=\"seller\">
            <h6>Seller : <span>$seller</span></h6>
        </div>
        <h5 class=\"price\">KSh $productprice per kgs</h5>
        <button type=\"submit\" class=\"addtowish\">Add to Wishlist</button>
        <button type=\"submit\" class=\"remove\" name=\"remove\">Remove</button>
    </div>
    <div class=\"addremove\">
        <div class=\"no_product\">
            <button type=\"button\" class=\"minus\" id=\"minus\">
                <span class=\"material-icons-outlined\">remove</span>
            </button>
            <input type=\"text\" class=\"product_no\" value=\"1\">
            <button type=\"button\" class=\"add\" id=\"add\">
                <span class=\"material-icons-outlined\">add</span>
            </button>
        </div>
    </div>
</form>
    ";
    echo $element;
}
