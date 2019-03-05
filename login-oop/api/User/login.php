<?php
include_once "../config/database.php";
include_once "../objects/user.php";

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$user->username = isset($_POST['username']) ? $_POST['username'] : die();
$user->password = isset($_POST['password']) ? $_POST['password'] : die();

$stmt = $user->login();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if(stmt->rowCount() > 0 && password_verify($password,$row['password'])){
    $user_arr = array(
        "status"=>true,
        "message"=>"Successfully Login",
        "id"=>$row['id'],
        "username"=>$row['username']
    );
} else{
    $user_arr=array(
        "status" => false,
        "message" => "Invalid Username or Password!",
    );
}
// make it json format
print_r(json_encode($user_arr));
?>