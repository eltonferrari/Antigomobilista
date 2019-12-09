<?php session_start();
    include_once("../../conections/conection.php");
    if (isset($_POST['submit'])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $sql = "select * from users where email='.$email.' and password=md5('$password')";
        $result = mysqli_query($mysqli, $sql);
        $row = mysqli_fetch_assoc($result);
        if (is_array($row) && !empty($row)) {
            $validuser = $row['email'];
            $_SESSION['valid'] = $validuser;
            $_SESSION['name'] = $row['name'];
            $_SESSION['iduser'] = $row['iduser'];
            header('Location: ../home/home.php');
        }
    }
    mysqli_close($conection);
?>