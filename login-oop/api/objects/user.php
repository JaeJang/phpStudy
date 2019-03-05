<?php
class User{

    private $conn;
    private const $TABLE_NAME = "users";

    public $id;
    public $username;
    public $password;
    public $created;

    public function __contruct($db){
        $this->conn = $db;
    }

    function signup() {
        
        if($this->isAlreadyExist()){
            return false;
        }

        $sql = "INSERT INTO"
                .$this->TABLE_NAME
                ."SET username:username,password=:password,created=:created";

        $stmt = $this->conn->prepare($sql);
        $hashedpwd = password_hash($password, PASSWORD_DEFAULT);

        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->created = htmlspecialchars(strip_tags($this->created));

        $stmt->bindParam(":username",$this->username);
        $stmt->bindParam(":password",$hashedpwd);
        $stmt->bindParam(":created",$this->created);

        if($stmt->execute()){
            $this->id = $this->conn->lastInsertId();
            return true;
        }
        return false;
    }

    function login() {

        $sql = "SELECT id, uasername, password, created
                FROM".$this->TABLE_NAME
                ."WHERE username=".$this->username;
        $stmt = $this->conn->prepare($sql);
        $stmt = $this->conn->execute();
        
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $stmt;
        
    }

    function isAlreadyExist(){

        $sql = "SELECT *
                FROM"
                .$this->TABLE_NAME
                ."WHERE username=".$this->username."";
        $stmt = $this->conn->prepare($sql);

        if($stmt->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }
}