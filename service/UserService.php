<?php

require_once 'lib/Database.php';

class UserService {

    public function insertUser(User $user) {
        echo "Name: ". $user->getName() . "<br/>" . "Age: " . $user->getAge() . "<br/>";
        $insertSql = "insert into user (name, age) VALUES ('" . $user->getName() . "', " . $user->getAge() . ")";
        echo "Insert SQL : " . $insertSql . "\n";
        Database::executeQuery($insertSql, 'INSERT');
    }

    public function updateUser(User $user) {
        $updateSql = "update user set age = " . $user->getAge() . " where name = '" . $user->getName() . "'";
        Database::executeQuery($updateSql, 'UPDATE');
    }

    public function deleteUser(User $user) {
        $deleteSql = "delete from user where name = '" . $user->getName() . "'";
        echo "Delete SQL : " . $deleteSql . "<br/>";
        Database::executeQuery($deleteSql, 'DELETE');
    }

    public function selectUser(User $user) {
        $selectSql = "select name, age from user where name like '%" . $user->getName() . "%'";
        echo "Select SQL : " . $selectSql . "<br/>";
        $result = Database::executeQuery($selectSql, 'SELECT');
        if (count($result) > 0) {
            echo "<br/><table><tr><th>ID</th><th>Name</th></tr><br/>";
            // output data of each row
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr><td>".$row["name"]."</td><td>" .$row["age"] ."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
    }
}