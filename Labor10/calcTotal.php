<?php

function calcTotal($userId) {
    $cartData = file_get_contents("https://fakestoreapi.com/carts/user/$userId");
    $carts = json_decode($cartData, true);

    $productData = file_get_contents("https://fakestoreapi.com/products");
    $products = json_decode($productData, true);

    $prices = [];
    foreach ($products as $p) {
        $prices[$p['id']] = $p['price'];
    }

    $total = 0;
    foreach ($carts as $cart) {
        foreach ($cart['products'] as $item) {
            $id = $item['productId'];
            $qty = $item['quantity'];
            if (isset($prices[$id])) {
                $total += $prices[$id] * $qty;
            }
        }
    }

    return $total;
}

$userId = 1;
echo "total: " . calcTotal($userId);

?>
