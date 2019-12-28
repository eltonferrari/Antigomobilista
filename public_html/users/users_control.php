<?php
include_once '../../connections/connection.php';
/**
 * Description of users_control
 *
 * @author Elton
 */
class users_control {

    //put your code here
    var $id_user;
    var $points;
    var $name;
    var $email;
    var $password;
    var $image;
    var $type;
    var $active;
    var $created_at;
    var $updated_at;
}

function __construct($id_user, 
                     $points, 
                     $name, 
                     $email, 
                     $password, 
                     $image, 
                     $type,
                     $active,
                     $created_at,
                     $updated_at) {
    $this->id_user = $id_user;
    $this->points = $points;
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
    $this->image = $image;
    $this->type = $type;
    $this->active = $active;
    $this->created_at = $created_at;
    $this->updated_at = $updated_at;
}

function getId_user() {
    return $this->id_user;
}

function getPoints() {
    return $this->points;
}

function getName() {
    return $this->name;
}

function getEmail() {
    return $this->email;
}

function getPassword() {
    return $this->password;
}

function getImage() {
    return $this->image;
}

function getType() {
    return $this->type;
}

function getActive() {
    return $this->active;
}

function getCreated_at() {
    return $this->created_at;
}

function getUpdated_at() {
    return $this->updated_at;
}

function setId_user($id_user) {
    $this->id_user = $id_user;
    return $this;
}

function setPoints($points) {
    $this->points = $points;
    return $this;
}

function setName($name) {
    $this->name = $name;
    return $this;
}

function setEmail($email) {
    $this->email = $email;
    return $this;
}

function setPassword($password) {
    $this->password = $password;
    return $this;
}

function setImage($image) {
    $this->image = $image;
    return $this;
}

function setType($type) {
    $this->type = $type;
    return $this;
}

function setActive($active) {
    $this->active = $active;
    return $this;
}

function setCreated_at($created_at) {
    $this->created_at = $created_at;
    return $this;
}

function setUpdated_at($updated_at) {
    $this->updated_at = $updated_at;
    return $this;
}

function getById($id_user) {
    $user = "select * from users where iduser=$id_user";
    return $user;
}

function getLogin($email,$password) {
    $sql = "select * from users where email='$email' and password=md5('$password')";
    $user = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function setRegister($name,$email,$password) {
    $sql = "insert into users(name, email, password) 
            values ('$name', '$email', md5('$password'))";
    $save = mysqli_query($connection, $sql);
    $lines = mysqli_affected_rows($connection);
    return $lines;
}