<?php

trait DB
{
    function connectToDb($forceReConnect = false): PDO
    {
        static $db; // persistent across function calls

        if ($forceReConnect || !$db) {
            try {
                $db_host = 'db';
                $db_port = 3306;
                $db_user = 'db';
                $db_password = 'db';
                $db_db = 'db';

                $db = new PDO(
                    "mysql:host=$db_host; port=$db_port; dbname=$db_db",
                    $db_user,
                    $db_password
                );
            } catch (PDOException $e) {
                echo "Error!: " . $e->getMessage() . "<br />";
                die();
            }
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        }

        return $db;
    }
}
