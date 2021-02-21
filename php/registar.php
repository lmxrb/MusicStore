<?php
    session_start();
    require_once('../php/connection.php');
    date_default_timezone_set('Europe/Lisbon');
    if (!isset($_SESSION["userid"])) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                if(isset($_POST["username"]) and isset($_POST["password"]) and isset($_POST["email"]) and !empty($_POST["email"]) and !empty($_POST["username"]) and !empty($_POST["password"])){
                    $username = mysqli_real_escape_string($connection ,$_POST["username"]);
                    $password = mysqli_real_escape_string($connection, $_POST["password"]);
                    $email = mysqli_real_escape_string($connection, $_POST["email"]);
                    $name = mysqli_real_escape_string($connection, $_POST["name"]);
                    $ciphering = "AES-128-CTR";
                    $encryption = md5(openssl_encrypt($password, $ciphering,'#7sRr!nLvZz99ehJi',0, '1234567891011121'));
                    mysqli_set_charset($connection, "utf8");
                    $sql = "SELECT * FROM users WHERE username='".$username."'";
                    $sql1 = "SELECT * FROM users WHERE email='".$email."'";
                    $result = mysqli_query($connection, $sql);
                    $result1 = mysqli_query($connection, $sql1);
                    if(mysqli_num_rows($result)==0 and mysqli_num_rows($result1)==0)
                    {
                        $sql = "INSERT INTO users (username, password, email, name) VALUES('".$username."','".$encryption."','".$email."', '".$name."')";
                        $result = mysqli_query($connection, $sql);
                        //try to make header with custom alert on register successfully
                        header('Location: ../index.php');
                    }
                    else{
                    ?><script type="text/javascript">
                            alert('Utilizador/Email já está registado!');
                            window.location = '../paginaRegisto.php';
                        </script><?php
                    }
                }


        }
    // Se utilizador estiver logado
    }
    else {
        ?><script type="text/javascript">
            alert('Utilizador já está logado!');
            </script>
            <?php
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>