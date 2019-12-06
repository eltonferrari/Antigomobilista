<?php
                                include("../../conections/DbConnection.php");
                                if (isset($_POST['submit'])) {
                                    $name = $_POST['name'];
                                    $email = $_POST['email'];
                                    $pass = $_POST['password'];
                                    $repass = $_POST['password_confirmation'];
                                    


mysqli_query($mysqli, "INSERT INTO users(name, email, password) "
                                                                    . "VALUES('$name', '$email', md5('$pass'))")
                                                    ;
                                                echo "Registro efetuado com sucesso.";
                                                header('Location: ../entities/home/home.php');
                                            ?>
                     