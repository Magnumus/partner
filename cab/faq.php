<?php session_start(); 

    $conn = mysqli_connect("localhost", "cj41890_45", "cj41890_45", "cj41890_45");
    $n = $_SESSION['email'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$n'");
if(isset($_POST["exitBTN"])) {session_destroy(); $_SESSION["is_reg"] = false; header("Location: ../form/index.php"); }
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
    <link rel="stylesheet" href="Accordion.JS-master/accordion.css">
    <link rel="stylesheet" href="styles/norm.css">

   <link href="./FAQ_files/app.v1.css" rel="stylesheet">
    <?php if($bl) {echo "<link rel='stylesheet' href='styles/overlay.css'>";} ?>
</head>
<body><div id="overlay">
   <div id="content">
        <div id="main">
        <div id="header"><p>Добро пожаловать, <?php echo $result['name'] ?></p><form class="exit" action="" method="post"><input type="submit" src="images/exit-to-app-button.svg" name="exitBTN" value="" class="exitBtn"></form>  
        </div>
        <div id="center">
            <h1 class="zagol">FAQ</h1>
            <ul id="my-accordion" class="accordionjs" style="width:90%; margin: 0 auto; margin-top: <4></4>%;">
                                    <li>
                                        <div>Что такое VLK Partners?</div>
                                        <div>
VLK partners  – это партнерская программа казино Vulkan , в которой вебмастера размещают рекламу и получают прибыль за определенные действия юзеров: регистрация, первый депозит либо процент от прибыли казино.                                        </div>
                                    </li>
                                    <li>
                                        <div>Как начать работать с VLK Partners?</div>
                                        <div>
Чтобы начать сотрудничать с партнерской программой, нужно зарегистрироваться, связаться с менеджером и подтвердить аккаунт. После этого можно получить ссылки и начать привлекать игроков.                                        </div>
                                    </li>
                                    <li>
                                        <div>Какие бывают способы продвижения онлайн казино?</div>
                                        <div>
Казино можно продвигать такими способами: seo трафик, контекстная реклама, продвижение в соцсетях (VK, OK, Youtube, etc), баннерная и тизерная реклама, e-mail рассылки и др.                                        </div>
                                    </li>
                                    <li>
                                        <div>Какие преимущества работы с VLK?</div>
                                        <div>
Партнерская программа VLK Partners — это прозрачная и удобная статистика, высокие отчисления, своевременные выплаты, множество тарифов, широкие технические возможности и другие преимущества.                                      </div>
                                    </li>
                                    <li>
                                        <div>Могу я быть уверен(а) в нашем партнерстве?</div>
                                        <div>
Сотни вебмастеров уже зарабатывают с нами. Мы представлены на самых популярных нишевых форумах и зарекомендовали себя как надежная и преуспевающая партнерская сеть.                                       </div>
                                    </li>
                                    <li>
                                        <div>В каких странах я могу продвигать ваши продукты?</div>
                                        <div>
Наши продукты можно продвигать в таких странах: Россия, Азербайджан, Армения, Белоруссия, Казахстан, Киргизстан, Молдавия, Таджикистан, Туркменистан, Узбекистан.                                    </div>
                                    </li>
            </ul>
<!--

                            
                        </div>
                    </div>
                </div>
                <div class="content-item tab-pane tabs-up fade panel panel-default" id="finance">
                    <div class="panel-body">
                        <div class="panel-group" id="accordionFinance">

                            
								<div class="question-item panel panel-default">
                                    <a class="panel-heading question-title" data-toggle="collapse" data-parent="#accordionFinance" href="#collapse6">
                                        <p class="panel-title">Что такое доход партнера?</p>
                                    </a>
                                    <div id="collapse6" class="question-text panel-collapse collapse">
                                        <div class="panel-body">Доход партнера — это часть прибыли казино, которую партнер получает за трафик, привлеченный на сайты.</div>
                                    </div>
                                </div>

                            
								<div class="question-item panel panel-default">
                                    <a class="panel-heading question-title" data-toggle="collapse" data-parent="#accordionFinance" href="#collapse7">
                                        <p class="panel-title">Какие варианты сотрудничества с вами возможны?</p>
                                    </a>
                                    <div id="collapse7" class="question-text panel-collapse collapse">
                                        <div class="panel-body">Вы можете работать с партнерской программой VLK Partners по Revenue share и СРА тарифам.</div>
                                    </div>
                                </div>

                            
								<div class="question-item panel panel-default">
                                    <a class="panel-heading question-title" data-toggle="collapse" data-parent="#accordionFinance" href="#collapse8">
                                        <p class="panel-title">Что такое Revenue share?</p>
                                    </a>
                                    <div id="collapse8" class="question-text panel-collapse collapse">
                                        <div class="panel-body">Revenue share — это модель работы с партнерской программой, при которой партнер получает часть прибыли казино, принесенной его игроками.</div>
                                    </div>
                                </div>

                            
								<div class="question-item panel panel-default">
                                    <a class="panel-heading question-title" data-toggle="collapse" data-parent="#accordionFinance" href="#collapse9">
                                        <p class="panel-title">Как рассчитывается доход партнера по Revenue share?</p>
                                    </a>
                                    <div id="collapse9" class="question-text panel-collapse collapse">
                                        <div class="panel-body">Доход партнера по модели работы Revenue share рассчитывается следующим образом:<br>
			 Partner Revenue = (netgaming — bonus — k * sum deposit)* R<br>
             Где:<br>
             Netgaming (бэт-вин) — разница между ставками «bet-win» игроков;<br>
             Bonus — сумма бонусов, выданная игрокам;<br>
             Sum deposit — сумма депозитов;<br>
             K — % комиссии платежной системе;<br>
             R — % Revenue share партнера.
             </div>
                                    </div>
                                </div>

                            
								<div class="question-item panel panel-default">
                                    <a class="panel-heading question-title" data-toggle="collapse" data-parent="#accordionFinance" href="#collapse10">
                                        <p class="panel-title">Что такое СРА тариф?</p>
                                    </a>
                                    <div id="collapse10" class="question-text panel-collapse collapse">
                                        <div class="panel-body">СРА — это модель работы с партнерской программой, когда партнер получает фиксированную сумму за определенное действие (напр.: регистрация, первый депозит (FD), активный игрок и др.)</div>
                                    </div>
                                </div>

                            
								<div class="question-item panel panel-default">
                                    <a class="panel-heading question-title" data-toggle="collapse" data-parent="#accordionFinance" href="#collapse11">
                                        <p class="panel-title">Как происходят выплаты?</p>
                                    </a>
                                    <div id="collapse11" class="question-text panel-collapse collapse">
                                        <div class="panel-body">Выплаты проводятся один раз в неделю за предыдущий отчетный период. Отчетным считается период с понедельника до воскресенья (GMT +00).</div>
                                    </div>
                                </div>

                            
								<div class="question-item panel panel-default">
                                    <a class="panel-heading question-title" data-toggle="collapse" data-parent="#accordionFinance" href="#collapse12">
                                        <p class="panel-title">Какая минимальная сумма доступна для выплат?</p>
                                    </a>
                                    <div id="collapse12" class="question-text panel-collapse collapse">
                                        <div class="panel-body">Минимальная сумма для выплат составляет 50$</div>
                                    </div>
                                </div>

                            
								<div class="question-item panel panel-default">
                                    <a class="panel-heading question-title" data-toggle="collapse" data-parent="#accordionFinance" href="#collapse13">
                                        <p class="panel-title">Какие платежные системы доступны для выплат?</p>
                                    </a>
                                    <div id="collapse13" class="question-text panel-collapse collapse">
                                        <div class="panel-body">Выплаты производятся на следующие платежные системы: Webmoney , Bank/Wire transfer , ePayments, Capitalist. Если Вы хотите воспользоваться другой платежной системой, обратитесь в службу поддержки, чтобы решить этот вопрос.</div>
                                    </div>
                                </div>

                            
								<div class="question-item panel panel-default">
                                    <a class="panel-heading question-title" data-toggle="collapse" data-parent="#accordionFinance" href="#collapse14">
                                        <p class="panel-title">Сколько я смогу зарабатывать?</p>
                                    </a>
                                    <div id="collapse14" class="question-text panel-collapse collapse">
                                        <div class="panel-body">На этот вопрос однозначного ответа нет. Чем больше объем качественного трафика, тем выше доход. С нами работают партнеры, чей доход достигает нескольких тысяч долларов за один отчетный период.</div>
                                    </div>
                                </div>

                            
								<div class="question-item panel panel-default">
                                    <a class="panel-heading question-title" data-toggle="collapse" data-parent="#accordionFinance" href="#collapse15">
                                        <p class="panel-title">Мои игроки больше выиграли, чем проиграли. Что делать?</p>
                                    </a>
                                    <div id="collapse15" class="question-text panel-collapse collapse">
                                        <div class="panel-body">В этом случае Ваш баланс может быть отрицательным. Мы обнуляем отрицательный баланс партнерам с качественным трафиком.</div>
                                    </div>
                                </div>

                            
                        </div>
                    </div>
                </div>
                <div class="content-item tab-pane tabs-up fade panel panel-default" id="tech">
                    <div class="panel-body">
                        <div class="panel-group" id="accordionTech">

                            
								<div class="question-item panel panel-default">
                                    <a class="panel-heading question-title" data-toggle="collapse" data-parent="#accordionTech" href="https://vlk.partners/site/faq#collapse16">
                                        <p class="panel-title">Что значат описания полей в таблице статистики?</p>
                                    </a>
                                    <div id="collapse16" class="question-text panel-collapse collapse">
                                        <div class="panel-body">Проект — проект казино;<br>
			 Программа — программа выплат;<br>
             Просмотры - количество переходов по вашей персональной ссылке. <br>
             Клики - количество переходов по вашей персональной ссылке с лендинга на продукт. <br>
             Логины -  количество логинов зарегистрированных игроков; <br>
             Количество регистраций - количество регистраций игроков по вашей персональной ссылке; <br>
             Количество FD — количество игроков, сделавших первый депозит;<br>
             Сумма FD — сумма всех первых депозитов;<br>
             Количество FD (меньше установленного) — количество FD (меньше установленной минимальной суммы депозита);<br>
             FD бейслайн (подтвержденные) - количество подтвержденных FD по программе Baseline; <br>
             Количество RD — количество повторных депозитов;<br>
             Сумма RD — сумма повторных депозитов;<br>
             Бэт-Вин (Bet-Win) — разница между проигрышами и выигрышами игроков (Netgaming); <br>
             Бонус - cумма бонусного счета игрока; <br>
             Выведено — сумма выводов игроков;<br>
             Доход — доход партнера;<br>
             Revenue per paid  - средняя сумма депозита игрока, которая высчитывается  по формуле : (сумма FD+ сумма RD)/кол-во FD;<br>
             Repeat rate -  соотношение повторных депозитов к первым, высчитывается по формуле : (кол-во RD/кол-во FD)* 100%.<br>  </div>
                                    </div>
                                </div>

                            
								<div class="question-item panel panel-default">
                                    <a class="panel-heading question-title" data-toggle="collapse" data-parent="#accordionTech" href="https://vlk.partners/site/faq#collapse17">
                                        <p class="panel-title">Как изменить пароль?</p>
                                    </a>
                                    <div id="collapse17" class="question-text panel-collapse collapse">
                                        <div class="panel-body">Зайдите на страницу “Логин”, нажмите на «Логин», далее на «Сбросить» и создайте новый пароль согласно инструкции.</div>
                                    </div>
                                </div>

                            
								<div class="question-item panel panel-default">
                                    <a class="panel-heading question-title" data-toggle="collapse" data-parent="#accordionTech" href="https://vlk.partners/site/faq#collapse18">
                                        <p class="panel-title">Как изменить платежные реквизиты?</p>
                                    </a>
                                    <div id="collapse18" class="question-text panel-collapse collapse">
                                        <div class="panel-body">Перейдите в личном кабинете на вкладку «Мой аккаунт» и нажмите кнопку «Редактировать».</div>
                                    </div>
                                </div>

                            
								<div class="question-item panel panel-default">
                                    <a class="panel-heading question-title" data-toggle="collapse" data-parent="#accordionTech" href="https://vlk.partners/site/faq#collapse19">
                                        <p class="panel-title">Как часто обновляется статистика?</p>
                                    </a>
                                    <div id="collapse19" class="question-text panel-collapse collapse">
                                        <div class="panel-body">Статистика обновляется в режиме реального времени. Максимальная задержка может составлять 5 минут.</div>
                                    </div>
                                </div>

                            
								<div class="question-item panel panel-default">
                                    <a class="panel-heading question-title" data-toggle="collapse" data-parent="#accordionTech" href="https://vlk.partners/site/faq#collapse20">
                                        <p class="panel-title">Что такое постбек?</p>
                                    </a>
                                    <div id="collapse20" class="question-text panel-collapse collapse">
                                        <div class="panel-body">Постбек (post back) — ссылка, которая автоматически запрашивается с сервера партнерской программы, когда происходят ключевые события в конверсии. Постбек используется для отслеживания данных о конверсиях и ведения статистики на своём сервере или в трекинговой системе.</div>
                                    </div>
                                </div>

                            
								<div class="question-item panel panel-default">
                                    <a class="panel-heading question-title" data-toggle="collapse" data-parent="#accordionTech" href="https://vlk.partners/site/faq#collapse21">
                                        <p class="panel-title">Как работать с post back?</p>
                                    </a>
                                    <div id="collapse21" class="question-text panel-collapse collapse">
                                        <div class="panel-body">Мы предлагаем следующие постбэки:<br>
             Registration — постбэк о регистрации;<br>
             First Deposit — постбэк о первом депозите;<br>
             Deposit — постбэк о любом депозите;<br>
             Any — постбэк о регистрации и любом депозите.<br>
             Чтобы настроить постбэки, Вам нужно:<br>
             1. Настроить передачу динамических параметров cid, pid, tid в партнерскую ссылку VLK partners.<br>
             2. В своей трекинговой системе подготовить ссылки, по которым будет создаваться постбэк под каждое из событий (для регистрации — отдельная ссылка, для первого депозита — отдельная ссылка и т.д.).<br>
             3. Ссылка постбэка может быть любой. Важно, чтобы она содержала в себе параметр(ы), в которых мы будем возвращать полученные от вас значения cid, pid, tid, и значения, которые мы передаем дополнительно: payment id, payment sum, user id, affiliate id, sub-affiliate id (если есть такая необходимость).<br>
             4. Создайте постбэки в личном кабинете и отправьте запрос в службу поддержки для модерирования.</div>
                                    </div>
                                </div>

                            
								<div class="question-item panel panel-default">
                                    <a class="panel-heading question-title" data-toggle="collapse" data-parent="#accordionTech" href="https://vlk.partners/site/faq#collapse22">
                                        <p class="panel-title">Как сгенерировать ссылку?</p>
                                    </a>
                                    <div id="collapse22" class="question-text panel-collapse collapse">
                                        <div class="panel-body">Промо --&gt; Программы --&gt; выберите нужную программу --&gt; выберите лендинг и источник трафика.</div>
                                    </div>
                                </div>

                            
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
        </div>
        <div id="footer"></div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="./Accordion.JS-master/accordion.js"></script>
   <script>
    jQuery(document).ready(function($){
        $("#my-accordion").accordionjs({
            closeAble : true,
            activeIndex: false  
        });
    });
</script>

</body>
</html><?php } ?>