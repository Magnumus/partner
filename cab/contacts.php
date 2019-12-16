<?php session_start(); 
    if(!isset($_SESSION['is_reg'])){
        header("Location: ../form/index.php");
    }
if(isset($_POST["exitBTN"])) {session_destroy(); $_SESSION["is_reg"] = false; header("Location: ../form/index.php"); }
    $conn = mysqli_connect("localhost", "cj41890_45", "cj41890_45", "cj41890_45");
    $n = $_SESSION['email'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$n'");
    $result = mysqli_fetch_array($query);
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
            <h1 class="zagol">Контакты</h1>
            <div style="display: flex;">
            <form class="form"action="">
               <p>Категория</p>
                <input type="text">
                <p>Тема</p>
                <input type="text">
                <p>Ваш вопрос</p>
                <textarea name="" id="" cols="30" rows="10"></textarea>
                <input type="submit" style="height: 35px; width: 150px; border-radius: 7px; background: #de413a; color: #fff; margin-top: 3%;"/>      
             </form>
             <div>
                 <h2>SKYPE</h2>
                 <p>lorem ipsum</p>
                 <h2>TELEGRAM</h2>
                 <p>Lorem ipsum.</p>
                 <h2>EMAIL</h2>
                 <p>Lorem ipsum.</p>
             </div>
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
</html><?php } ?>