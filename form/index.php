<?php   session_start();
        if(isset($_POST["reg"])){
            $name = htmlspecialchars($_POST["name"]);
            $_SESSION["name"] = $name;
            $mess = htmlspecialchars($_POST["mess"]);
            $comp_name = htmlspecialchars($_POST["comp_name"]);
            $_SESSION["company_name"] = $comp_name;
            $email = htmlspecialchars($_POST["mail"]);
            $_SESSION["email"] = $email;
            if($_POST["pass"] < 6){$error = "Слишком маленький пароль!";}{
            $pass = password_hash(htmlspecialchars($_POST["pass"]), PASSWORD_DEFAULT);
            $tr_src = htmlspecialchars($_POST["tr_src"]);
            $name_mess = htmlspecialchars($_POST["mess_name"]);
            $tr_klv = htmlspecialchars($_POST["tr_klv"]);
                
            $trek = "";
            $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
            $numChars = strlen($chars);    
            
            for($g = 0; $g < 8; $g++){
                $trek .= substr($chars, rand(1, $numChars) - 1, 1);
            }
                
            $rrrrrr = $_SERVER['HTTP_HOST']."/r.php?ref=".$trek;
            $know = htmlspecialchars($_POST["know"]);
            $cn = mysqli_connect("localhost", "cj41890_45", "cj41890_45", "cj41890_45") or die("Baza dannyh pizdec nacalnika");
            $user_check = mysqli_query($cn,"SELECT * FROM users WHERE email = '$email'");
            $uc = mysqli_fetch_array($user_check);
            if($uc > 0) {$error = "Пользователь с такой почтой уже существует";}else{
            $q = mysqli_query($cn, "INSERT INTO users VALUES(null, '$name', '$comp_name', '$email', '$pass',' $mess', '$name_mess', '$tr_src', '$tr_klv', '$know', 1, '$trek', '', '', '', '', '')") or die("Zapros pizdec nacalnka");
            $q = mysqli_query($cn, "INSERT INTO statistic VALUES(null, '$email', 0, 0, 0, 0,0,'$rrrrrr','none')") or die("Zapros pizdec ");
            mysqli_query($cn,"INSERT INTO tt VALUES(null, '$trek', 0, '$email')");
            mysqli_query($cn,"INSERT INTO promo VALUES(null, '$email', '', 0)") or die("promo pizdec");
            $_SESSION["is_reg"] = true;
            header("Location: ../cab/index.php");
        }}}else{
            $_SESSION["is_reg"] = false;
        }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="fonts/stylesheet.css">
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="style/respons.css">
  <title>Vulkan</title>
</head>
<body>
	<header class="conteiner">
		<nav>
			<ul>
				<li><a href="../index.php">главная</a></li>
				<li><a href="../index.php#com">комисии</a></li>
				<li><a href="../index.php#bb">бренды</a></li>
				<li><a href="../index.php#niz">faq</a></li>
			</ul>
			<img src="images/logo.png" alt="logo">
			<form class="hui" method="POST">
				<a href="../index.php" class="enter">вход</a>
				<a href="index.php" class="reg">регистрация</a>
			</form>
		</nav>
	</header>
	<h1 class="title">Регистрация в партнерской программе<br>
казино Вулкан Россия и Вулкан Платинум - Gambler club</h1>
	
	
		<form class="r conteiner" action="" method="post" id="ff" autocomplete="off">
            <input required class="h" name="comp_name" type="text" placeholder="Название компании"> <select form="ff" name="mess" class="h" placeholder="Мессенджер" required><option value="Telegram">Telegram</option>
            <option value="Skype">Skype</option></select>
			<input required class="h" type="text" name="name" placeholder="Имя"> <input required class="h" name="mess_name" type="text" placeholder="Имя в мессенджере">
			<input required class="h" type="email" name="mail" placeholder="Email"> <input required class="h" name="tr_src" type="text" placeholder="Основной источник трафика">
			<input required class="h" type="password" name="pass" placeholder="Пароль"> <input required class="h" type="text" name="tr_klv" placeholder="Примерный объем трафика">
			
			<input class="last" type="text" name="know" placeholder="Как вы узнали о нас?">
				<p style="color: red;"><?php echo "$error"; ?></p>
				<input id="her" style="opacity: 0;" type="checkbox">
				<label for="her" class="agr">
					 Я согласен с <a href="reg.php">условиями регистрации</a>
				</label>
			<button class="registr" type="submit" name="reg">ЗАРЕГИСТРИРОВАТЬСЯ</button>
		</form>
	<footer><p>© 2019 gambler club. Все права защищены</p></footer>
</body>
</html>
