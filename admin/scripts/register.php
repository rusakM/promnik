<?php
    session_start();
    require_once('connect.php');
    $chk = mysqli_connect("127.0.0.1", "root", "", "promnik");
    $email = $_POST['email'];
    $check = mysqli_query($chk, "SELECT * FROM users WHERE email = '$email'");
    if(mysqli_num_rows($check) === 0) {
        $login = $_POST['login'];
        $pass = md5($_POST['pass']);
        $name = $_POST['name'];
        $sql = "INSERT INTO `users` (`id_user`, `login`, `password`, `name`, `email`) VALUES (NULL, '$login', '$pass', '$name', '$email')";
        mysqli_query($chk, $sql);
        
        if(mysqli_num_rows(mysqli_query($chk, "SELECT * FROM users WHERE email = '$email'")) === 1) {
            $_SESSION['reg_stat'] = "Konto zostało utworzone";
            mysqli_close($chk);
            header('Location: /promnik/admin/index.php');
        }
        else {
            $_SESSION['reg_stat'] = "Nie udało się zarejestrować";
            mysqli_close($chk);
            header('Location: /promnik/admin/index.php');
        }
        
    }
    else {
        $_SESSION['reg_stat'] = "Konto z podanym adresem email już istnieje";
        mysqli_close($chk);
        header('Location: /promnik/admin/index.php');
    }
?>