<?php
    require_once('../php/connection.php');
    date_default_timezone_set('Europe/Lisbon');
    if(array_key_last($_POST) == "submit"){
        $rows = json_decode($_POST["rows"]);
        $delRows = json_decode($_POST["delRows"]);
        $rows = \array_diff($rows, $delRows);
        mysqli_set_charset($connection, "utf8");
        foreach($rows as $item => $i) {
            $time = mysqli_real_escape_string($connection, $_POST[$item]);
            $sql = "UPDATE classes SET time = '" . $time . "' WHERE classID = '" . $i . "'";
            mysqli_query($connection, $sql);
        }
        foreach($delRows as $item => $i){
            $sql = "DELETE FROM classes WHERE classID = '" . $i . "'";
            mysqli_query($connection, $sql);
        }
        $connection -> close();
        header('Location: ../horario.php');
    }
?>