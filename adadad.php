<?php 
session_start();
    if(isset($_POST['log'])){
        $mail = $_POST['email'];
        $pass = $_POST['pass'];
        $cn = mysqli_connect("localhost", "root", "", "partners");
        $q = mysqli_query($cn, "SELECT email, pass FROM users WHERE email = '$mail'") or die("Z");
        $res = mysqli_fetch_array($q);
        if(mysqli_num_rows($q)>0){
            if(password_verify($pass, $res['pass'])){
                $_SESSION['is_reg'] = true;
                header("Location: cab/index.php");
            } else $a = "Пароль введен неверно!";
        } else $a = "Такого пользоателя не существует!";
    }
if(isset($_REQUEST['clickid'])){
    $c = $_REQUEST['clickid'];
    $q1 = mysqli_query($cn, "SELECT count FROM tt WHERE clickid = '$c'") or die("Z");
    $r1 = mysqli_fetch_array($q1);
    $r2 = ++$r1[0];
    $q2 = mysqli_query($cn, "UPDATE tt SET count = '$r2' WHERE email = '$mail'") or die("Z");
};
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
<div class="first">
	<header class="conteiner">
		<nav>
			<ul>
				<li><a href="">главная</a></li>
				<li><a href="#com">комисии</a></li>
				<li><a href="#bb">бренды</a></li>
				<li><a href="#niz">faq</a></li>
			</ul>
			<img src="images/logo.png" alt="logo">
			<form class="hui" method="POST">
				<a href="form/index.php" class="enter">вход</a>
				<a href="form/index.php" class="reg">регистрация</a>
			</form>
		</nav>
	</header>
	<div class="conteiner in_first">
		<div class="left">
			<h1>Партнерская программа<br>
Gambler club</h1>
			<p>Одна из самых крупных и продвинутых<br>
гемблинг партнерок, с большим опытом<br>
заработка на казино и других азартных играх</p>
			<form>
				<a href="form/index.php">ЗАРЕГИСТРИРОВАТЬСЯ</a>
			</form>
			</div>
			<div class="right">
				<form method="post" action="">
					<input name="email" required type="email" placeholder="email*">
					<input name="pass" required type="password" placeholder="пароль*">
					<p style="color: red;"><?php echo $a; ?></p>
					<a href="#">забыли пароль?</a>
					<button type="submit" name="log">ВОЙТИ</button>
                </form>
			</div>
	</div>
	<div class="next">
			<p>УЗНАТЬ БОЛЬШЕ</p>
			<center><img src="images/st.png"></center>
		</div>
</div>

	<div class="slide" id="com">
		<ul>
			<li class="hiu one">КОМИССИЯ</li>
			<li class="two">КОНВЕРСИЯ</li>
			<li class="th">ВЫПЛАТЫ</li>
		</ul>
	</div>
	<div class="slider conteiner">
		<div class="wrap">
			<div class="static">
				<h4><span style="font-weight: bold;">ГЕМБЛИНГ ПАРТНЕРКА,</span><br>
КОТОРАЯ ОПРАВДЫВАЕТ<br>
ОЖИДАНИЯ</h4>
				<p>Достаточно только раз привести в систему<br>
игрока и вы будете получать постоянные<br>
отчисления со всех его расходов в казино</p>
			</div>
			<div class="sld">
				<img class="active img1" src="images/sl1.png">
				<img class="img2" src="images/sl2.png">
				<img class="img3" src="images/sl3.png">
			</div>
		</div>
	</div>

	<div class="get">
		<div class="conteiner">
			<h1><span style="font-weight: bold;">ПОЛУЧИ МАКСИМУМ</span><br>
ВОЗМОЖНОСТЕЙ ДЛЯ УВЕЛИЧЕНИЯ ДОХОДА<br>
</h1>
		<div class="get_in">
			<div class="menu">
				<ul>
					<li class="on">
						<img class="hz1" src="images/menu1w.png"><p class="onp">Высококонверсионные<br> промо-материалы</p>
					</li>
					<li class="ac tw">
						<img class="hz2" src="images/menu2r.png"><p class="ac twp">Эффективные <br>лендинги</p>
					</li>
					<li class="t">
						<img class="hz3" src="images/menu3w.png"><p class="tp">Статистика в реальном<br> режиме</p>
					</li>
				</ul>
			</div>
			<div class="get_con">
			<div class="con_1">
					<p><span style="color:#e81111;font-weight: bold;">Высококонверсионные промо-материалы</span><br>
<br>
Вам не нужно заботиться о рекламных материалах для привлечения пользователей. Баннеры, лендинги вы можете найти в личном кабинете или запросите разработку индивидуальных материалов у наших специалистов. А для того чтобы обеспечить максимальный конверт, мы проводим тщательное A/B тестирование, каждого материала.</p>
				<center><img src="images/JmfBz3mkZGo.jpg"></center>
				</div>
			<div class="con_2 lox">
					<p><span style="color:#e81111;font-weight: bold;">Эффективные лендинги</span><br>
<br>
Мы проводим A/B тестирование, каждого лендинга, чтобы обеспечить максимальный конверт каждой посадочной страницы.</p>
				<center><img src="images/vulk.png"></center>
				</div>
				<div class="con_3 ">
					<p><span style="color:#e81111;font-weight: bold;">Статистика в реальном режиме</span><br>
<br>
Сбор статистики создается с учетом пожеланий веб специалистов. Она интуитивно понятна, комфортна и легка в использовании. Вы тратите время только на раскрутку своего сайта и на привлечение игроков.</p>
				<center><img src="images/Z6gXzeRIj4I.jpg"></center>
				</div>
			</div>
		</div>
		
	
		
		</div>
	</div>
	
	
	<div class="part">
		<div class="conteiner">
			<h1>КАК СТАТЬ НАШИМ ПАРТНЕРОМ?</h1>
			<div class="blocks">
				<div class="a">
					<p><span style="font-weight:bold;color: #dc3436;">Регистрация</span><br>
Заполните регистрационную форму.<br>
Укажите ваши персональные данные и<br>
реальные источники трафика. В течении<br>
одного рабочего дня с вами свяжется наш<br>
менеджер<br><br><br></p>
				</div>
				<div class="b">
					<p><span style="font-weight:bold;color: #dc3436;">ВЫБОР ПРОГРАММЫ</span><br>
Выберите программу, создайте ссылку и<br>
выберите необходимые промо материалы<br>
для запуска кампании</p>
				</div>
				<div class="c">
					<p><span style="font-weight:bold;color: #dc3436;">Размещение промо</span><br>
Разместите промо на своем ресурсе и<br>
запустите целевой трафик. Мы подскажем<br>
как оптимально настроить воронку под ваш<br>
тип трафика</p>
				</div>
				<div class="d">
					<p><span style="font-weight:bold;color: #dc3436;">Получение прибыли</span><br>
Выплаты проходят еженедельно на любые<br>
платежные методы либо банковские реквизиты</p>
				</div>
			</div>
			<a href="#">ЗАРЕГИСТРИРОВАТЬСЯ</a>
		</div>
	</div>

	
	<div class="most" id="bb">
		<div class="conteiner">
			<h1><span style="font-weight: bold">САМЫЕ УЗНАВАЕМЫЕ БРЕНДЫ</span><br>
РОССИЙСКОГО ГЕМБЛИНГА</h1>
		<div class="mm">
			<img src="images/sl5.png">
			<img src="images/sl4.png">
		</div>
		</div>
	</div>

	<div class="krug">
		<div class="conteiner">
			<div class="krugi">
				<img src="images/kr1.png">
				<img src="images/kr2.png">
				<img src="images/kr3.png">
				<img src="images/kr4.png">
			</div>
		</div>
	</div>
	

	<div class="w">
		<div class="conteiner">
			<p class="tite_w">ПРОДУКТ ПОДОЙДЕТ<br>
ИДЕАЛЬНО ДЛЯ ИГРОКОВ С<br>
РОССИИ И 9 СТРАН СНГ</p>
			<p>Бренд «Вулкан» — это знак качества и<br>
доверия, и для многих игроков именно<br>
бренд становится решающим элементом<br>
при выборе клуба.<br>
<br>
Топовые игры, щедрые бонусы ,регулярные<br>
турниры и лотереи — именно это игроки<br>
ищут в игровых клубах. И именно это они<br>
и находят в наших продуктах!<br>
<br>
С нами остаются надолго, а для вас это<br>
значит только одно. Регулярная прибыль<br>
и впечатляющий еженедельный доход!</p>
		</div>
	</div>


	<div class="pay"><img src="images/pay.png"></div>



	<div class="text">
	<div class="conteiner">
		
			<div class="text_in">
				<div class="t1">
					<p><span style="font-weight:bold;">Казино Вулкан - возможность заработка на партнерской программе!</span><br>
Партнерская программа казино Вулкан - это лучшее предложение для заработка сфере азарта и развлекательных игр. Мы предлагаем стабильный и законный вариант бизнеса в интернете, который предусматривает участие вашего развлекательного портала или сайта в нашей сети. Несколько сотен вебмастеров уже сейчас зарабатывают на этом. Вам достаточно только раз привести в систему игрока, и вы будете получать постоянные отчисления со всех его расходов в казино. Заработок в казино - это реально. Подключайтесь прямо сейчас и начните зарабатывать уже завтра!<br>
<br>
<span style="font-weight:bold;">Стабильно растущий доход</span><br>
Гемблинг привлекает сегодня многих, ведь первоклассные игровые сайты очень популярны среди увлеченных игрой людей. Суть сотрудничества с нами прозрачна и понятна - вы получаете процент от прибыли фирмы, приведя к нам азартных игроков.</p>
				</div>
				<div class="t2">
					<p>Все, что необходимо, это поместить на своем портале рекламу одного из партнерских игровых клубов с ссылкой реферала. Чем большее количество пользователей будет переходить на нашу партнерку, тем выше будет ваш процент дохода.<br>
<br>
<span style="font-weight:bold;">Удобство и комфорт GAMBLER CLUB</span><br>
Партнерская программа казино Вулкан предлагает вам усовершенствованную модель сбора статистики, которая создана с учетом пожеланий веб специалистов. Теперь вы тратите время только на раскрутку своего сайта и на привлечение игроков.<br>
<br>
GAMBLER CLUB - лучший выбор. Наша партнерская программа казино одна из самых крупных и продвинутых, с большим опытом заработка на казино и других азартных играх. Откройте для себя заработок в казино, который откроет для вас новые горизонты и возможности.</p>
				</div>
			</div>
		
	</div>
	</div>

	
		<div class="connect" id="niz">
			<div class="conteiner">
				<div class="con_in">
					<div class="cont">
						<h1>СВЯЖИТЕСЬ С НАМИ</h1>
						<p>У вас есть предложение или вопрос?<br>
Свяжитесь с нами, мы не заставим Вас ждать<br>
<br>
<br>
support@vlk.partners<br>
live:vlk.partners<br>
vlkpartners</p>
					</div>
					<div class="conti">
						<form>
							<input type="text" placeholder="Имя*">
							<input type="email" placeholder="Email*">
							<input class="q" type="text" placeholder="Ваш вопрос*">
							<input type="text" placeholder="Проверочный код*">
							<button>ОТПРАВИТЬ</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<footer >
			<p>© 2019 gambler club. Все права защищены<p>
		</footer>
	
<script src="js.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>
<script>
	$("header nav ul li a").on("click", function(e) {
		e.preventDefault();
		selector =  $(this).attr("href");
		h = $(selector);
		$("html, body").animate({
			scrollTop: h.offset().top
		},800);
	});
</script>
</body>
</html>






