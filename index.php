<?php

require_once 'vendor/autoload.php';
const ROOT_DIR = __DIR__;

if (!session_id()){
    session_start();
}
require_once ROOT_DIR . '/config/constants.php';
require_once ROOT_DIR . '/config/DB.php';

require_once APP_DIR . '/index.php';
try {

    $mainFields = dbSelect(Tables::Content, conditions: 'name IN ("navigation", "footer")');
    $mainFields = convertDataToAssoc($mainFields);


} catch (Exception $e) {
    echo $e->getMessage() . " in file" . $e->getFile() . " at line" . $e->getLine();
}

if (!empty($_POST)){
    require_once APP_DIR . '/forms/controller.php';
}else {
    require_once PARTS_DIR . '/header.php';
    require_once ROOT_DIR .'/config/router.php';
    require_once PARTS_DIR . '/footer.php';
}
