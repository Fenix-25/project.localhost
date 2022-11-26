<?php
function addToCartParams():array
{
    $params = [
        'product_id' => FILTER_VALIDATE_INT,
        'quantity' => FILTER_VALIDATE_INT,
        'additions' => [
            'flags'     => FILTER_REQUIRE_ARRAY,
            'filter' => FILTER_VALIDATE_INT
        ],
        'additions-qty' => [
            'flags'     => FILTER_REQUIRE_ARRAY,
            'filter' => FILTER_VALIDATE_INT
        ]
    ];
    return filter_input_array(INPUT_POST, $params);
}

function removeCartItemParams():array
{
    $params = [
        'product_key' => FILTER_VALIDATE_INT,
        'parent_key' => FILTER_VALIDATE_INT,
    ];
            return filter_input_array(INPUT_POST, $params);
}