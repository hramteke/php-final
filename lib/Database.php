<?php

namespace lib\Database;

use PDO;
use PDOException;

class Database
{

    public static $conn = null;

    public static function openDBConnection()
    {
        $serverName = "localhost";
        $username = "root";
        $password = "secret";

        try {
            self::$conn = new PDO("mysql:host=$serverName;dbname=userDB", $username, $password);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function executeQuery($sql, $operation)
    {
        try {
            if (self::$conn == null) {
                self::openDBConnection();
            }

            if ('SELECT' == $operation) {
                /** @noinspection PhpUndefinedMethodInspection */
                return self::$conn->query($sql);
            } else {
                /** @noinspection PhpUndefinedMethodInspection */
                return self::$conn->exec($sql);
            }
        } catch (PDOException $e) {
            echo $sql . "<br/>" . $e->getMessage();
        }

        return null;
    }
}
