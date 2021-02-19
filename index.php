<?php
session_start();
require_once('./connection.php');
date_default_timezone_set('Europe/Lisbon');
if (!isset($_SESSION["userid"])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(array_key_first($_POST) == 'login'){
		    if(isset($_POST["username"]) and isset($_POST["password"]) and !empty($_POST["username"]) and !empty($_POST["password"])){
                $username = mysqli_real_escape_string($connection ,$_POST["username"]);
				$password = mysqli_real_escape_string($connection, $_POST["password"]);
				$simple_string = $password; 
				$ciphering = "AES-128-CTR"; 
				$iv_length = openssl_cipher_iv_length($ciphering); 
				$options = 0;
				$encryption_iv = '';
				$encryption_key = "";
				$encryption = openssl_encrypt($simple_string, $ciphering, $encryption_key, $options, $encryption_iv); 
				mysqli_set_charset($connection, "utf8");
				$encryption = md5($encryption);
                $sql = "SELECT * FROM users WHERE username='".$username."' and password = '".$encryption."'";
                $result = mysqli_query($connection, $sql);
                if(mysqli_num_rows($result)==1)
                {
					$row = mysqli_fetch_assoc($result);
                    $_SESSION["userid"] = $row["ID"];
					$_SESSION["username"] = $row["username"];
					//$_SESSION['admin'] = $row['admin'];
					echo ("Login bem ");
                }
                else{
                ?><script type="text/javascript">
                        alert('Nome de utilizador ou password incorretos');
                        window.location = './index.html';
                    </script><?php
                }
            }
        }
        elseif(array_key_first($_POST) == 'register'){
            header("Location: ./paginaRegisto.html");
        }
    }
// Se utilizador estiver logado
}
else {
    header('Location: ./index.html');
}
?>