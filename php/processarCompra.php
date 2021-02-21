<?php
    session_start();
    require_once('../php/connection.php');
    date_default_timezone_set('Europe/Lisbon');
    if (isset($_SESSION["userid"])) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(isset($_POST["morada"])){
                    $morada = mysqli_real_escape_string($connection, $_POST["morada"]);
                    $albums = mysqli_real_escape_string($connection, $_POST["albums"]);
                    $amounts = mysqli_real_escape_string($connection, $_POST["amounts"]);
                    $total = mysqli_real_escape_string($connection, $_POST["total"]);
                    mysqli_set_charset($connection, "utf8");
                    $sql = "INSERT INTO purchases 
                    (userID, albumIDs, quantities, address, total, purchaseTime) 
                    VALUES('".intval($_SESSION["userid"])."','".$albums."','".$amounts."', '".$morada."','".$total."','".date('Y-m-d H:i:s')."')";
                    $result = mysqli_query($connection, $sql);
                    ?>
                        <script type="text/javascript">
                        window.alert('Compra efectuada com sucesso');
                        window.location = '../index.php';
                        </script><?php
            }
        }
    }
    else {
        ?><script type="text/javascript">
            alert('Utilizador não está logado!');
            window.location = '../index.php';
            </script>
            <?php
    }
?>