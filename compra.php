<!DOCTYPE html> 
<html lang="pt">
    <head> 
        <meta charset="UTF-8"> 
        <title>MusicStore | Finalização de Compra</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" href="img/vinyl.png">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <style>
            tr, tfoot{
                border: 1px solid #ccc;
            }
            input[type=submit] {
                width: auto;
                background-color: rgba(113, 113, 113, 0);
                border: 1px solid #CCC;
                color: white;
                padding: 12px 20px;
                margin-top: 12px;
                border-radius: 4px;
                cursor: pointer;
            }
        </style>
    </head>     
    <body>
    <?php include './php/commonLayout.php' ?>
        <br> 
        <br>
        <h1 class="margin">Finalização da Compra</h1>
        <table id="tabelaProdutos" style="width: 85%; position: sticky; float: left; margin-left: 7.5%; margin-right:7.5%;">
            <tr id="row">
                <th style="position: relative; overflow: auto">
                    <p style="text-align: left; font-size: 15px;"></p>
                </th>
                <th style="position: relative; overflow: auto">
                    <p style=" font-size: 15px;"></p>
                </th>
                <th style=" position: relative; overflow: auto">
                    <img src="" alt="" style="width: 100px; height: 100px;">
                </th>
            </tr>
        </table>
        <br>
        &nbsp;
        <br>
        &nbsp
        <br>
        &nbsp;
        <div class="containerSubmissao" style="margin-left: auto; text-align: center; margin-right: auto; ">
            <form action="php/processarCompra.php" method="post">
                <label style="font-size: 18px;" for="morada">Morada</label>
                <br>
                <input type="text" id="morada" name="morada" placeholder="A morada de entrega..."/>
                <br>
                <input style='visibility: hidden' id='amounts' name='amounts' value='' />
                <input style='visibility: hidden' id='albums' name='albums' value='' />
                <input style='visibility: hidden' id='total' name='total' value='' />
                <br>
                <input type="submit" name="confirm" value="Confirmar compra">
            </form>
        </div>
        <script src="js/compra.js"></script>
        <br> 
        <br> 
    </body>     
    <footer>
        © 2020 Rubén Barbosa e Rui Moreira
</footer>     
</html>