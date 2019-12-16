<?php session_start(); 

    $conn = mysqli_connect("localhost", "cj41890_45", "cj41890_45", "cj41890_45");
    $n = $_SESSION['email'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$n'");
    $result1 = mysqli_fetch_array($query);
if(isset($_POST["exitBTN"])) {session_destroy(); $_SESSION["is_reg"] = false; header("Location: ../form/index.php"); }
    if($result1['blocked'] == 1){
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
        <div id="header"><p>Добро пожаловать, <?php echo $result1['name'] ?></p><form class="exit" action="" method="post"><input type="submit" src="images/exit-to-app-button.svg" name="exitBTN" value="" class="exitBtn"></form>  
        </div>
        <div id="center">
            <h1 class="zagol">Отчет</h1>
            <table border="1px" height="150px" bordercolor="#910b05" cellpadding="10" width="84%" cellspacing="0">
                <tr class="tr">
                    <th>Клики</th>
                    <th>Регистрации</th>
                    <th>Количество первых депозитов</th>
                    <th>Количество повторных депозитов</th>
                    <th>Сумма депозитов</th>
                    <th>Доход СРА</th>
                </tr>
                <?php 
                    $cnn = mysqli_connect("localhost", "cj41890_45", "cj41890_45", "cj41890_45");
                    $n = $_SESSION['email'];
                    $query = mysqli_query($cnn, "SELECT * FROM statistic WHERE email = '$n'");
                    $result = mysqli_fetch_array($query);
           $query2 = mysqli_query($cnn, "SELECT * FROM tt WHERE email = '$n'");
                    $result2 = mysqli_fetch_array($query2);
                ?>
                <tr>
                    <td><?php echo $result2["count"];?></td>
                    <td><?php echo $result["regs"];?></td>
                    <td><?php echo $result["first"];?></td>
                    <td><?php echo $result["again"];?></td>
                    <td><?php echo $result["summ"];?></td>
                    <td><?php echo $result["profit"];?></td>
                </tr>
            </table>
        </div>
        <div id="footer"></div>
        </div>
        <div id="sidebar"><div id="logo"><a href=""><img src="images/G.png" alt="logo"></a></div>
        <div id="trekkode">
            <p>Ваш трэккод:</p>
            <p><?php echo $result1['tr_code']; ?></p>
        </div>
        <div id="manager">
            <p>Ваш личный менеджер:</p>
            <span style="color:#fff;"><?php echo $result1['manag_name'];  ?>:</span>
            <p><img src="images/skype.svg" width="16px" height="16px">   <?php echo $result1['manag_teleg'] ?></p>
            <span><img src="images/telegram.svg" width="16px" height="16px">   <?php echo $result1['manag_skype'] ?></span><br>
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