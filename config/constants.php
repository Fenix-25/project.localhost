<?php

const VIEW_DIR = ROOT_DIR . '/views';
const PAGES_DIR = VIEW_DIR . '/pages';
const PARTS_DIR = VIEW_DIR . '/parts';
const APP_DIR = ROOT_DIR . '/app';

// DataBase constants
const HOST = 'localhost';
const DB_NAME = 'php_lesson';
const USER = 'root';
const PASSWORD = '';
const DSN = 'mysql:host=' . HOST . '; dbname=' . DB_NAME;
const OPT = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

define("DOMAIN", $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST']);

const ASSETS_URI = DOMAIN . '/assets';
const IMAGES_URI = ASSETS_URI . '/images';

enum Tables: string{
    case Blog = 'blog';
    case Content = 'content';
    case Order = 'order';
    case Products = 'products';
    case OrderProducts = 'order_products';
    case Users = 'users';
}

define("CART", $_SESSION['cart']);
