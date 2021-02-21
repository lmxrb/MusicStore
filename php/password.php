<?php
    session_start();
    require_once('../php/connection.php');
    date_default_timezone_set('Europe/Lisbon');
    $ok = false;
    $reset = false;
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(array_key_last($_POST) == 'modify'){
            if(isset($_POST["newPassword"]) and isset($_POST["newPassword1"]) ){
                if($_POST["newPassword"] == $_POST["newPassword1"]) {
                    $newPassword = mysqli_real_escape_string($connection, $_POST["newPassword"]);
                    $ciphering = "AES-128-CTR";
                    $encryption = md5(openssl_encrypt($password, $ciphering, '', 0, ''));
                    $newEncryption = md5(openssl_encrypt($newPassword, $ciphering, '', 0, ''));
                    mysqli_set_charset($connection, "utf8");
                    if(!empty($_POST["password"]) and empty($_POST["resetID"]) and isset($_SESSION["userid"]) and !empty($_SESSION["userid"])) {
                        $password = mysqli_real_escape_string($connection, $_POST["password"]);
                        $sql = "SELECT * FROM users WHERE ID='" . $_SESSION["userid"] . "' and password = '" . $encryption . "'";
                        $result = mysqli_query($connection, $sql);
                        if (mysqli_num_rows($result) == 1) {
                            echo(' <script type="text/javascript">
                            alert("Password incorreta.");
                            window.location = "../changePassword.php";
                            </script>');
                        }
                        else{
                            $ok = true;
                            $string = "' WHERE ID = '" . $_SESSION["userid"] . "'";
                        }
                    }
                    else if(empty($_POST["password"]) and !empty($_POST["resetID"])){
                        $resetID = mysqli_real_escape_string($connection, $_POST["resetID"]);
                        $sql = "SELECT * FROM users WHERE resetID = '" . $resetID . "'";
                        $result = mysqli_query($connection, $sql);
                        if (mysqli_num_rows($result) == 1) {
                            $ok = true;
                            $userid =  mysqli_fetch_assoc($result)["ID"];
                            $sql = "UPDATE users SET resetID = NULL WHERE ID = '" . $userid . "'";
                            $string = "' WHERE ID = '" . $userid . "'";
                        }
                    }
                    if($ok) {
                        $sql = "UPDATE users SET password = '" . $newEncryption . $string;
                        mysqli_query($connection, $sql);
                        echo('<script type="text/javascript">
                            var prompt=window.confirm("Password alterada com sucesso!. \r\n"+"Redirecionar a página?");
                            if(prompt)document.location.href="../index.php"; </script>');
                    }
                }
                else{echo('<script type="text/javascript">
                        alert("A nova password é diferente da password de confirmação.");
                        window.location = "../changePassword.php";
                    </script>');
                }
                $connection -> close();
            }
        }
        else{
            header('Location: ../index.php');
        }
    }

?>