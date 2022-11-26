<?php



match(getRequestType()){
    'add_to_cart' => addToCart(addToCartParams()),
    'remove_cart_item' => removeCartItem(removeCartItemParams())
};