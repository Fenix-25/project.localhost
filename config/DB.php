<?php

class DB
{
    protected static PDO $instance;

    public static function connect(): PDO
    {
        if (!isset(self::$instance)){
            try {
                self::$instance = new PDO(
                    DSN,
                    USER,
                    PASSWORD,
                    OPT
                );

            }catch (PDOException $exception){
                var_dump($exception->getMessage());
                die();
            }
        }

    return  self::$instance;
    }
}