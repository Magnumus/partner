<?php session_start(); 

    $conn = mysqli_connect("localhost", "cj41890_45", "cj41890_45", "cj41890_45");
    $n = $_SESSION['email'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$n'");
    $query1 = mysqli_query($conn, "SELECT * FROM statistic WHERE email = '$n'");
    $query2 = mysqli_query($conn, "SELECT * FROM promo WHERE email = '$n'");
$rr = mysqli_fetch_array($query2);
    $result = mysqli_fetch_array($query);
if(isset($_POST["exitBTN"])) {session_destroy(); $_SESSION["is_reg"] = false; header("Location: ../form/index.php"); }
    $result1 = mysqli_fetch_array($query1);
    if($result['blocked'] == 1){
        $bl = true;
        echo "<h1>Ваш аккаунт временно заблокирован! Ожидайте связи с администратором</h1>";
    } else{ $bl = false;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/norm.css">
    <?php if($bl) {echo "<link rel='stylesheet' href='styles/overlay.css'>";} ?>
</head>
<body><div id="overlay">
   <div id="content">
        <div id="main">
        <div id="header"><p>Добро пожаловать, <?php echo $result['name'] ?></p><form class="exit" action="" method="post"><input type="submit" src="images/exit-to-app-button.svg" name="exitBTN" value="" class="exitBtn"></form>  
        </div>
        <div id="center">
            <h1 class="zagol">Промо</h1>
            <div style="display: flex;">
            <table border="1px" height="150px" bordercolor="#910b05" cellpadding="10" width="60%" cellspacing="0">
               <tr class="tr">
                    <th>Имя</th>
                    <td><?php echo $rr["name"] ?></td>
                </tr>
                <tr class="tr">
                    <th>Вид</th>
                    <td>Бейслайн</td>
                </tr>
                <tr>
                    <th class="tr">Статус</th>
                    <td>Включено</td>
                </tr>
                <tr class="tr">
                    <th>Платформа</th>
                    <td>Веб,Моб</td>
                </tr>
                <tr class="tr">
                    <th>Страна</th>
                    <td>AZ,AM,BY,KZ,KG,MD,RU,TJ,TM,UZ</td>
                </tr>
                <tr class="tr">
                    <th>Проект</th>
                    <td>GC</td>
                </tr>
                <tr class="tr">
                    <th>URL проекта</th>
                    <td>https://gambler.gq</td>
                </tr>
                <tr class="tr">
                    <th>Базовая ставка</th>
                    <td><?php echo $rr["base"] ?></td>
                </tr>
                <tr class="tr">
                    <th>Сумма депозитов</th>
                    <td><?php echo $result1["summ"] ?></td>
                </tr>
                <tr class="tr">
                    <th>Время по бейслайну</th>
                    <td>7 дней</td>
                </tr>
                <tr class="tr">
                    <th>Требуется RD</th>
                    <td>Нет</td>
                </tr>
            </table>
            <table border="1px" height="150px" bordercolor="#910b05" cellpadding="10" width="20%" cellspacing="0">
                <tr class="tr"><th>Ваша реферальная ссылка</th></tr>
                <tr><td><?php echo $result1["ref"];?></td></tr>
            </table>
            </div>
        </div>
        </div>
        <div id="sidebar"><div id="logo"><a href=""><img src="images/G.png" alt="logo"></a></div>
        <div id="trekkode">
            <p>Ваш трэккод:</p>
            <p><?php echo $result['tr_code']; ?></p>
        </div>
        <div id="manager">
            <p>Ваш личный менеджер:</p>
            <span style="color:#fff;"><?php echo $result['manag_name'];  ?>:</span>
            <p><img src="images/skype.svg" width="16px" height="16px">   <?php echo $result['manag_teleg'] ?></p>
            <span><img src="images/telegram.svg" width="16px" height="16px">   <?php echo $result['manag_skype'] ?></span><br>
        </div>
        <div id="menu">
            <ul>
                <li><a href="index.php">
                    Личный кабинет
                </a></li>
                <li><a href="promo.php">
                    Промо
                </a></li>
                <li><a href="stat.php">
                    Отчет
                </a></li>
                <li><a href="faq.php">
                    FAQ
                </a></li>
                <li><a href="contacts.php">
                    Контакты
                </a></li>
            </ul>
        </div>
        
        </div>
    </div>
    </div>
</body>
</html>
<?php } ?>