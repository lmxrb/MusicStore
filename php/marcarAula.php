<?php
session_start();
require_once('../php/connection.php');
date_default_timezone_set('Europe/Lisbon');
if (isset($_SESSION["userid"])){
    if(isset($_POST["name"]) and isset($_POST["horario"]) and isset($_POST["nif"]) and isset($_POST["nascimento"]) and isset($_POST["contacto"]) and isset($_POST["tipo_aula"]) and isset($_POST["professor"])){
        $nome = mysqli_real_escape_string($connection ,$_POST["name"]);
        $horario = intval(mysqli_real_escape_string($connection, $_POST["horario"]));
        $nif = intval(mysqli_real_escape_string($connection, $_POST["nif"]));
        $nascimento = mysqli_real_escape_string($connection, $_POST["nascimento"]);
        $contacto = mysqli_real_escape_string($connection, $_POST["contacto"]);
        $tipo_aula = mysqli_real_escape_string($connection, $_POST["tipo_aula"]);
        $professor = mysqli_real_escape_string($connection, $_POST["professor"]);
        mysqli_set_charset($connection, "utf8");
        $sql = "INSERT INTO classes (classType, teacher, userID, name, nif, birthDate, contact, time) VALUES('".$tipo_aula."','".$professor."','".$_SESSION["userid"]."', '".$nome."','".$nif."','".date('Y-m-d',strtotime($nascimento))."','".$contacto."','".$horario."')";
        $result = mysqli_query($connection, $sql);
        header('Location: ../index.php');}
}
else {
    ?><script type="text/javascript">
        alert('Utilizador não está logado!');</script>
    <?php header('Location: ' . $_SERVER['HTTP_REFERER']);
}?>