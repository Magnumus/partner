<?php session_start(); 
    if(!isset($_SESSION['is_reg'])){
        header("Location: ../form/index.php");
    }
    if(isset($_POST["exitBTN"])) {session_destroy(); $_SESSION["is_reg"] = false; header("Location: ../form/index.php"); }
    $conn = mysqli_connect("localhost", "cj41890_45", "cj41890_45", "cj41890_45");
    $n = $_SESSION['email'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$n'") or die("nu ty ponyal");
    $result = mysqli_fetch_array($query);

    if(isset($_POST["save"])){
    $mmail = $_POST["mmail"];
    $rreq = $_POST["rreq"];
    $mmet = $_POST["mmet"];
    $ccomp = $_POST["ccomp"];
    $queryr = mysqli_query($conn,"UPDATE users SET email = '$mmail', company_name = '$ccomp', method = '$mmet', requisit = '$rreq' WHERE email = '$n' ");
    $queryr = mysqli_query($conn,"UPDATE promo SET email = '$mmail' WHERE email = '$n' ");
    $queryr = mysqli_query($conn,"UPDATE tt SET email = '$mmail' WHERE email = '$n' ");
    $queryr = mysqli_query($conn,"UPDATE statistic SET email = '$mmail' WHERE email = '$n' ");
    $_SESSION['email'] = $mmail;
    $_SESSION['requisit'] = $rreq;
    $_SESSION['method'] = $mmet;
    $_SESSION['company_name'] = $ccomp;
    header("Reload:0");
    }

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
        <div id="header"><p>Добро пожаловать, <?php echo $result['name']; ?></p> <form class="exit" action="" method="post"><input type="submit" src="images/exit-to-app-button.svg" name="exitBTN" value="" class="exitBtn"></form>    
        </div>
        <div id="center">
            <h1 class="zagol">Мой аккаунт</h1>
            <?php if(isset($_POST["change"])){?> 
            
                       <form class="change_form" action="" method="post">
                           <p>Email</p>
                           <input type="email" name="mmail" value="<?php echo $_SESSION['email']; ?>">
                           <p>Имя компании</p>
                           <input type="text" name="ccomp" value="<?php echo $result['company_name']; ?>">
                           <p>Платежный метод</p>
                           <input type="text" name="mmet" value="<?php echo $result['method']; ?>">
                           <p>Реквизиты</p>
                           <input type="text" name="rreq" value="<?php echo $result['requisit']; ?>"><br>
                           <input type="submit" name="save" value="Сохранить" style="height: 35px; width: 150px; border-radius: 7px; background: #de413a; color: #fff; margin-top: 3%; cursor:pointer;"/>
                       </form>           
           
            
              <?php 
            
            } else { ?>
            <form action="" method="post"><input type="submit" style="height: 35px; width: 150px; border-radius: 7px; background: #910b05; color: #fff; margin-top: 2%; margin-left: 6%; cursor:pointer;" name="change" value="Редактировать"></form>
            <table border="1px" height="150px" bordercolor="#910b05" cellpadding="10" width="60%" cellspacing="0">
               <tr class="tr">
                    <th>Треккод</th>
                    <td><?php echo $result["tr_code"] ?></td>
                </tr>
                <tr class="tr">
                    <th>Email</th>
                    <td><?php echo $_SESSION["email"] ?></td>
                </tr>
                <tr>
                    <th class="tr">Название компании</th>
                    <td><?php echo $_SESSION["company_name"] ?></td>
                </tr>
                <tr class="tr">
                    <th>Статус</th>
                    <td>Подтвержден</td>
                </tr>
                <tr class="tr">
                    <th>Платежный метод</th>
                    <td><?php echo $_SESSION["method"] ?></td>
                </tr>
                <tr class="tr">
                    <th>Реквизиты</th>
                    <td><?php echo $_SESSION["requisit"] ?></td>
                </tr>
            </table>
            <?php } ?>
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
</html><?php } ?>