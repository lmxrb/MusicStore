<?php
    session_start();
    require_once('../php/connection.php');
    date_default_timezone_set('Europe/Lisbon');
    if (!isset($_SESSION["userid"])) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(array_key_last($_POST) == 'login'){
                if(isset($_POST["username"]) and isset($_POST["password"]) and !empty($_POST["username"]) and !empty($_POST["password"])){
                    $username = mysqli_real_escape_string($connection ,$_POST["username"]);
                    $password = mysqli_real_escape_string($connection, $_POST["password"]);
                    $ciphering = "AES-128-CTR";
                    $encryption = md5(openssl_encrypt($password, $ciphering, '', 0, ''));
                    mysqli_set_charset($connection, "utf8");
                    $sql = "SELECT * FROM users WHERE username='".$username."' and password = '".$encryption."'";
                    $result = mysqli_query($connection, $sql);
                    if(mysqli_num_rows($result)==1)
                    {
                        $row = mysqli_fetch_assoc($result);
                        $_SESSION["userid"] = $row["ID"];
                        $_SESSION["username"] = $row["username"];
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                    }
                    else{
                    ?><script type="text/javascript">
                            alert('Nome de utilizador ou password incorretos');
                            window.location = '../index.php';
                        </script><?php
                    }
                }
            }
            elseif(array_key_last($_POST) == 'register'){
            $_SESSION['post_data'] = $_POST;
            header("Location: ../paginaRegisto.php");
            }
        }
    // Se utilizador estiver logado
    }
    else {
        header('Location: ../index.php');
    }
?>