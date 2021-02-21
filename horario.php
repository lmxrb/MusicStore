<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>MusicStore | Horário</title>
    <link rel="stylesheet" href="css/style.css">
    <script>
        function trash(element) {
            delRow = JSON.parse(document.getElementById("delRows").value);
            delRow.push(parseInt(element.parentNode.parentNode.children.item(3).children.item(0).getAttribute("name")));
            document.getElementById("delRows").value = JSON.stringify(delRow);
            element.parentNode.parentNode.parentNode.removeChild(element.parentNode.parentNode);
            return false;
        }
    </script>
    <style>
        tr, tfoot{
            border: 1px solid #ccc;
        }
        input[type=submit], select{
            margin: auto;
            display: block;
            font-size: 14px;
            text-align: center;
            border: 1px solid #ccc;
            background-color: transparent;
            color: white;
        }
        option{
            background-color: black;
            color: white;
        }
    </style>
    <link rel="icon" href="img/vinyl.png">
    <meta name="viewport" content="width=device-width, initial-scale=0.86">
</head>
<body>
    <?php include './php/commonLayout.php' ?>
    <h1 class="margin">Horário</h1>
    <?php include './php/tabelaHorario.php' ?>
</body>
<footer style="margin-top: 110px;">
    © 2020 Rubén Barbosa e Rui Moreira
</footer>
</html>