<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>MusicStore | Loja</title>
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/styleLoja.css">
    <link rel="icon" href="img/vinyl.png">
    <meta name="viewport" content="width=device-width, initial-scale=0.86">
</head>
<body>
    <?php include './php/commonLayout.php' ?>
    <script>
        document.getElementById("ulMenu").children.item(5).firstElementChild.classList.add("activo");
    </script>
	<table style="margin-left: 2%;" class="table" id="drop">
        <tr>
            <th><h1 style="font-size:42px">LOJA</h1></th>
            <th colspan="3"><img class="cart" id="cart" onclick="onCartClick();" src="img/cart1.png" alt="Cart"></th>
        </tr>
        <tr style="margin-top: -80px;">
            <th></th>
            <th>
                <div class="dropdown-cart fade" id="dropdown">
                    <div style="display: none; min-height: 40px; max-height:10px; max-width: 360px; position: relative; overflow: auto" id="Lista 1">
                        <h1 style="text-align: left; min-width: 150px; float:left; margin-top: 24px; font-size: 16px; margin-left: 18px;"></h1>
                        <h1 style="float: left; margin-left: 7px; margin-top: 24px; font-size: 14px;"></h1>
                        <img style="position: relative; float: right; margin-top:16px; margin-right: 18px; width: 12.5%; height: 12.5%; " src="" alt="">
                        <img style="position: relative; float: right; width: 10.5%; height: 10.5%; margin-top:16px;" onClick="return trash(this)" src="" alt="">
                    </div>
                    <div style="max-width: 480px; max-height: 120px; position: relative; overflow: auto" id="total">
                        <h1 id="soma" style="float:right; font-size: 17px; margin-right: 48px;">Total: 0 €</h1>
                    </div>
                    <button class="button" onClick="finishOrder();" style="font-size: 15px; margin: auto; width: 240px;">Continuar com a compra</button>
                    <br>
                    <br>
                </div>
            </th>
        </tr>
	</table>

    <?php include './php/tabelaLoja.php'?>
    <script src="js/loja.js"></script>
    <br>
    <br>
</body>
<footer>
    © 2020 Rubén Barbosa e Rui Moreira
</footer>
</html>