<?php
class Database{

    private const $HOST = "localhost";
    private const $DB_NAME = "loginoop";
    private const $USERNAME = "root";
    private CONST $PASSWORD = "123a456";

    public $conn;

    // get the database connection
    public function getConnection(){
        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=".$this->HOST
                                  .";dbname=".$this->DB_NAME
                                  .$this->USERNAME
                                  .$this->PASSWORD);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception){
            echo "Connection error".$exception->getMessage();
        }

        return $this->conn;
    }
}