<?php

function convertDataToAssoc( array $data =[]) :array
{
    $assoc = [];
    if (!empty($data)){
        foreach ($data as $row){
            $assoc[$row['name']] = json_decode($row['content'], true);
        }
    }

    return $assoc;
}

function getRequestType():string
{
    $type = filter_input(INPUT_POST, 'type');
    unset($_POST['type']);

    return htmlspecialchars($type);
}

function redirect($path = '/'): void
{
    $url = DOMAIN . $path;
    header("Location: {$url}");
    exit();
}

function notification(string $text, string $class = 'success' ): void
{
    $_SESSION['notification'] = compact('text','class');
}

function getUrl():string
{
    $url = trim($_SERVER['REQUEST_URI'], '/');
    return explode('?', $url)[0];
}