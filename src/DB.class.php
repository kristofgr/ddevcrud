<?php

trait DB
{
    public function connectToDB()
    {
        $db_host = 'db';
        $db_user = 'db';
        $db_password = 'db';
        $db_db = 'db';
        $db_port = 3306;

        try {
            $db = new PDO('mysql:host=' . $db_host . '; port=' . $db_port . '; dbname=' . $db_db, $db_user, $db_password);
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br />";
            die();
        }
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        return $db;
    }
}
