<script src="../js/menu.js"></script>
<img src="../img/logo.png" alt="Logotipo">
<br>
<br>
<ul id="ulMenu">
    <li><a onmouseover="playSong('0')" href="../index.php">HOME</a></li>
    <li><a onmouseover="playSong('1')" href="../sobre-nos.php" >SOBRE NÓS</a></li>
    <li onmouseenter="playSong('2')" class="liHover">
        <button class="dropbtn">AULAS</button>
        <div class="dropdown-content fade">
            <img class="imageMenu1" src="../img/piano.png" alt="piano"><a onmouseover="playSong('6')" href="../aulas_piano.php">PIANO</a>
            <img class="imageMenu2" src="../img/guitar.png" alt="guitar"><a onmouseover="playSong('7')" href="../aulas_guitarra.php">GUITARRA</a>
            <img class="imageMenu3" src="../img/violin.png" alt="violin"><a onmouseover="playSong('8')" href="../aulas_violino.php">VIOLINO</a>
            <img class="imageMenu4" src="../img/saxophone.png" alt="saxophone"><a onmouseover="playSong('9')" href="../aulas_saxofone.php">SAXOFONE</a>
        </div>
    </li>
    <li><a onmouseover="playSong('3')" href="../noticias.php">NOTÍCIAS</a></li>
    <li><a onmouseover="playSong('4')" href="../contactos.php">CONTACTOS</a></li>
    <li><a onmouseover="playSong('5')" href="../loja.php">LOJA</a></li>
    <?php
    session_start();
            if(isset($_SESSION["userid"])){
                //play song 6
                echo('
                      <li onmouseenter="playSong(\'6\')" class="liHover">
                      <img style="margin-top: 7px; margin-left: 10px; width: 12%; height: 12%;" class="imageMenu0" src="../img/user.png">
                      <div class="dropdown-content fade">
                        <img class="imageMenu1" style="margin-top: 4px; width: 11.5%; height: 14%;" src="../img/user_pencil.png" alt="piano"><a href="../perfil.php">PERFIL</a>
                        <img class="imageMenu2" style="margin-top: 6px; width: 12.5%; height: 15.5%;" src="../img/calendar.png" alt="guitar"><a href="../horario.php">HORÁRIO</a>
                        <img class="imageMenu3" style="margin-left: 2px; margin-top: 3px; width: 11.5%; height: 13.5%;" src="../img/logout.png" alt="violin"><a href="../php/logout.php">LOGOUT</a>
                     </div></li>');
            }
            else{echo('<li id="loginBtn" onmouseenter="playSong(\'6\')" class="liHover">
			<button class="dropbtn">LOGIN/REGISTO</button>
			<div class="dropdown-content fade">
            <br>
            <form action="../php/login.php" method="post">
			<div style="text-align: center;">
                <label for="username"><b>Utilizador:</b></label>
                <input type="text" id="username" name="username" required>
                <br>
                <label for="password"><b>Password:</b></label>
                <input type="password" id="password" name="password" required>
				<br>
				<br>
                <a href="../forgotPassword.php">Esqueceu-se da sua password?</a>
				<br>
				<input type="submit" style="margin: auto;
                    display: block;
                    font-size: 14px;
                    text-align: center;
                    border: 1px solid #ccc;
                    background-color: transparent;
                    color: white;" 
	            name="login" value="Login">
				<br>
				<br>
				<input type="submit" style="margin: auto;
                    display: block;
                    font-size: 14px;
                    text-align: center;
                    border: 1px solid #ccc;
                    background-color: transparent;
                    color: white;" 
	            name="register" value="Registar">
				</div>
            </form>
            <br>
        </div>
    </li>');}
    ?>
</ul>
