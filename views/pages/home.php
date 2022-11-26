<?php

try {
    $products = dbSelect(Tables::Products);
    $data = dbSelect(Tables::Content, conditions: 'name IN ("slider", "about_us", "kind-coffee", "company")');
    $fields = convertDataToAssoc($data);


} catch (Exception $e) {
    echo $e->getMessage() . " in file" . $e->getFile() . " at line" . $e->getLine();
}
require_once PARTS_DIR . '/slider.php';
require_once PARTS_DIR . '/about-us.php';
require_once PARTS_DIR . '/menu.php';
require_once PARTS_DIR . '/modals.php';
require_once PARTS_DIR . '/gallery.php';
require_once PARTS_DIR . '/company.php';
require_once PARTS_DIR . '/blog.php';
