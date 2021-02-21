<?php
    require_once('connection.php');
    date_default_timezone_set('Europe/Lisbon');
    if (isset($_SESSION["userid"])) {
        mysqli_set_charset($connection, "utf8");
        $sql = "SELECT * FROM classes WHERE userid='".$_SESSION["userid"]."'";
        $result = mysqli_query($connection, $sql);
        $rows = mysqli_num_rows($result);
        if($rows>=1)
        {
            $rowVals = array();
            $rowsDB = array();
            $count = 0;
            while($row = mysqli_fetch_assoc($result)){
                $rowVals[$count]['name'] = $row['name'];
                $rowVals[$count]['classType'] = $row['classType'];
                $rowVals[$count]['teacher'] = $row['teacher'];
                $rowVals[$count]['classID'] = $row['classID'];
                switch($row['time']){
                    case 0:
                        $rowVals[$count]['time'] = 'Manhã';
                        break;
                    case 1:
                        $rowVals[$count]['time'] = 'Tarde';
                        break;
                    case 2:
                        $rowVals[$count]['time'] = 'Noite';
                        break;
                }
                $rowsDB[$count] = intval($row['classID']);
                $count++;
            }
            $connection -> close();
            echo('
            <form action="../php/horarioChange.php" method="post">
            <table>
                <tr>
                    <th>
                        NOME
                    </th>
                    <th>
                        AULA
                    </th>
                    <th>
                        PROFESSOR
                    </th>
                    <th>
                        HORA
                    </th>
                    <th>
                    
                    </th>
                </tr>');
                    for($i = 0; $i < $rows; $i++) {
                        echo('
                        <tr>
                            <th>
                            ' .
                            $rowVals[$i]['name']
                            . '
                            </th>
                            <th>
                            ' .
                            $rowVals[$i]['classType']
                            . '
                            </th>
                            <th>
                            ' .
                            $rowVals[$i]['teacher']
                            . '
                            </th>
                            <th>
                             <select id="hora" name="'.$rowVals[$i]["classID"].'">
                                <option value="0" '); if($rowVals[$i]["time"] == "Manhã") echo ('selected'); echo('>Manhã</option>
                                <option value="1" '); if($rowVals[$i]["time"] == "Tarde") echo ('selected'); echo('>Tarde</option>
                                <option value="2" '); if($rowVals[$i]["time"] == "Noite") echo ('selected'); echo('>Noite</option>    
                            </select>
                            </th>
                            <th style="width: 100px;">
                                <img style="position: relative; float: right; width: 50%; height: 50%;" onClick="return trash(this)" src="./img/trash.png" alt="">
                            </th>
                        </tr> 
                        ');
                    }
                        echo('
                            </table>
                            <input type="hidden" id="rows" name="rows" value="'.json_encode($rowsDB).'"/>
                            <input type="hidden" id="delRows" name="delRows" value="[]"/>
                            <br>
                            <br>
                            <input type="submit" name="submit" value="Modificar">
                        </form>                    
                        ');
        }
        else{
            echo('
                <p class="margin" style="font-weight: bold; font-size: 19px; margin-top: 50px; margin-bottom: 450px;">Você não está registado em nenhuma aula, por favor, dirija-se às respetivas páginas das disciplinas para proceder à sua inscrição.</p>');
        }
    }
?>

