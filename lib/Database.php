<?php

class Database {

    public static $conn = null;

    public static function openDBConnection() {
        $servername = "localhost";
        $username = "root";
        $password = "secret";

        try {
            self::$conn = new PDO("mysql:host=$servername;dbname=userDB", $username, $password);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function closeDBConnection () {
        if(self::$conn!=null) {
            self::$conn->close();
        }
    }

    public static function executeQuery($sql, $operation) {
        try {
            if (self::$conn == null) {
                self::openDBConnection();
            }

            if('SELECT' == $operation) {
                return self::$conn->query($sql);
            } else {
                return self::$conn->exec($sql);
            }

        } catch (PDOException $e) {
            echo $sql . "<br/>" . $e->getMessage();
        }
    }
}