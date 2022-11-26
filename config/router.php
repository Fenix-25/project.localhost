<?php

switch (getUrl()){
    case '':
        require_once PAGES_DIR . '/home.php';
        break;
    case 'cart':
        require_once PAGES_DIR . '/cart.php';
        break;
    default:
        dd(getUrl());
}