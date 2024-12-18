<?php
class Database
{
    public static $con;
    public function __construct()
    {
        if (!self::$con) {
            self::$con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, PORT);
            self::$con->set_charset(DB_CHARSET);
        }

    }

    public static function getConnection()
    {
        if (!self::$con) {
            new self();
        }
        return self::$con;
    }

}

