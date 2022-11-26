<?php
function addToCart(array $fields): array
{
    $_SESSION['cart'][] = $fields;
    notification('Product was added to the cart');
    redirect();

}

function getCartItems(): array
{
    $cartItems = [];
    $ids = mapProductsIds(CART);
    $additions = mapAdditionsIds(CART);
    if (!empty(CART)) {
        $productIds = array_merge($ids, $additions);
        $products = dbSelect(Tables::Products, conditions: 'id IN (' . implode(', ', $productIds) . ')');

        $cartItems = prepareProductsToCart(CART, $products);
    }

    return $cartItems;
}

function prepareProductsToCart($cart, $dbProducts): array
{
    return array_map(function ($item) use ($dbProducts) {
        $product = getProductFromDbArray($dbProducts, $item['product_id']);


        $item  = array_merge($item, [
            'name' => $product['title'],
            'price' => $product['price'],
            'total' => $product['price'] * $item['quantity'],
        ]);

        if (!empty($item['additions']) ){
            $item['additions'] = buildProductAdditions(
                $item['additions'],
                $item['additions-qty'],
                $dbProducts,
                $item['product_id']
            );
            unset($item['additions-qty']);
        }
        return $item;
    }, $cart);
}

function buildProductAdditions(array $additions, array $additionsQty, array $dbProducts, $productId) :array
{
    return array_map(function($id, $quantity) use ($dbProducts, $productId){
    $product = getProductFromDbArray($dbProducts, $id);
    return [
        'product_id' => $id,
        'parent_id' => $productId,
        'name' => $product['title'],
        'price' => $product['price'],
        'additions-qty' => $quantity,
        'total' => $product['price'] * $quantity,
    ];
    }, $additions, $additionsQty);
}

function getProductFromDbArray(array $dbProducts, int $productId)
{
    $result = array_filter($dbProducts, fn($product) => $product['id'] === $productId);

    return array_shift($result);
}

function mapProductsIds(array $productsCart): array
{
    $productsCartIds = array_map(fn($item) => $item['product_id'], $productsCart);
    return array_unique($productsCartIds);
}

function mapAdditionsIds(array $productsCart): array
{
    $ids = [];
    $additionIds = array_map(fn($item) => $item['additions'], $productsCart);
    $additionIds = array_filter($additionIds, fn($item) => is_array($item));
    foreach ($additionIds as $idArray) {
        $ids = array_merge($ids, $idArray);
    }
    return array_unique($ids);
}

function removeCartItem(array $product): void
{
    $parentKey = $_SESSION['cart'][$product['parent_key']];

    if (isset($product['parent_key'])){
        unset($parentKey['additions']['product_key']);
        unset($parentKey['additions-qty']['product_key']);
        dd(  $_SESSION['cart'], $parentKey['additions']['parent_key'], $product);
        if (!empty($parentKey['additions'])){
            $parentKey['additions'] = array_values($parentKey['additions']);
            $parentKey['additions-qty'] = array_values($parentKey['additions-qty']);
        }
    }else{
        unset($_SESSION['cart'][$product['product_key']]);
        if (!empty($_SESSION['cart'])){
            $_SESSION['cart'] = array_values($_SESSION['cart']);
        }
    }
    redirect('/cart');
}