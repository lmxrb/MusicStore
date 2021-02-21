<?php
    require_once('connection.php');
    date_default_timezone_set('Europe/Lisbon');
    mysqli_set_charset($connection, "utf8");
    $sql = "SELECT * FROM store";
    $result = mysqli_query($connection, $sql);
    $rowVals = array();
    $count = 1;
    while($row = mysqli_fetch_assoc($result)){
        //probably not needed ssince its already in $count
        //$rowVals[$count]['albumID'] = $row['albumID'];
        $rowVals[$count]['albumName'] = $row['albumName'];
        $rowVals[$count]['gender'] = $row['gender'];
        $rowVals[$count]['year'] = $row['year'];
        $rowVals[$count]['singer'] = $row['singer'];
        $rowVals[$count]['priceUN'] = $row['priceUN'];
        $rowVals[$count]['albumIMG'] = $row['albumIMG'];
        $count++;
    }
    //numero de linhas (pode haver uma linha com menos de 4 albuns
    $count -= 1;
    $remainder = $count % 4;
    $rowAmount = ($count - $remainder) / 4 + 1;
    $connection -> close();

    echo('
        <table style="alignment:center; margin-top: 100px; width: 100%" >
        <tr>
            <th><input type="text" id="myInput" oninput="return onFilter(this);" placeholder="Search for names..." title="Type in a name"></th>
        </tr>
           </table> 
            <table id="table" class="table">');
                for($i = 1; $i <= $rowAmount; $i++){
                    $colAmount = $i == $rowAmount ? $remainder : 4;
                    for($j = 1; $j <= $colAmount; $j++){
                        if($j == 1 and $i != $rowAmount){
                            echo('<tr>');
                        }
                       $currId = ($i - 1) * 4 + $j;
                        echo('
                        <td>    
                            <img src="'.$rowVals[$currId]["albumIMG"].'" alt="Capa do album">
                            <h2>'.$rowVals[$currId]["albumName"].'</h2>
                            <p>'.$rowVals[$currId]["singer"].'</p>
                            <p>€'.$rowVals[$currId]["priceUN"].'</p>
                            <input type="number" name="quantidade">
                            <br><br>
                            <img class="buttonBuy" id="btn'.$currId.'" onClick="return addToCart(this.id);" src="img/cart.png" alt="Adicionar ao carrinho">
                            <p style="display:none">'.$rowVals[$currId]["year"].'</p>
                            <p style="display:none">'.$rowVals[$currId]["gender"].'</p>
                        </td>
                        ');
                        if($j == $colAmount) echo('</tr>');
                    }
                }
            echo('</table>');
?>