<?php  
session_start();
if(!isset($_SESSION["admin_is_here"])){
    header("Location: admin.php");
} else{
    $conn = mysqli_connect("localhost", "cj41890_45", "cj41890_45", "cj41890_45");
    $query = mysqli_query($conn, "SELECT email FROM users");
    $i1 = 1;
    while($result = mysqli_fetch_array($query)){
    
    $regs = $_GET["regs$i1"];
	$first = $_GET["first$i1"];
	$again = $_GET["again$i1"];
	$summ = $_GET["summ$i1"];
	$profit = $_GET["profit$i1"];
	$refef = $_GET["refef$i1"];
    $refef2 = $_GET["refefef$i1"];
    $m_name = $_GET["m_name$i1"];
    $m_skype = $_GET["m_skype$i1"];
    $m_tel = $_GET["m_tel$i1"];
    $pr_name = $_GET["pr_name$i1"];
    $method = $_GET["method$i1"];
    $base = $_GET["base$i1"];
    $req = $_GET["requisit$i1"];
    if($_GET["$i1"]){
        mysqli_query($conn,"UPDATE users SET blocked = 0 WHERE id = $i1 ") or die("dd");
    }
    if($_GET["upd$i1"]){
        mysqli_query($conn,"UPDATE statistic SET regs = '$regs', first = '$first', again = '$again', summ = '$summ', profit = '$profit', ref = '$refef', ref2 = '$refef2' WHERE id = '$i1' ") or die("dd1");
        mysqli_query($conn, "UPDATE users SET manag_skype = '$m_skype', manag_teleg='$m_tel', manag_name = '$m_name', method='$method', requisit='$req' WHERE id = '$i1'") or die("Pizdec");
        mysqli_query($conn, "UPDATE promo SET base = '$base', name = '$pr_name' WHERE id = '$i1'");
    }
    $i1++;}
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        td{
            height: 32px;
        }
        table input {
            height: 100%;
            border: none;
        }
        table{
            width: 100%;
            margin-left: 0px;
        }
        button{height: 100%;}
    </style>
</head>
<body>
    <div class="container">
       <form method='get' action='' id="formochka"></form>
            <?php   
            $i = 1;
            
            /*$query2 = mysqli_query($cn, "SELECT count FROM tt");
            $res2 = mysqli_fetch_array($query2);*/
        $query1 = mysqli_query($conn, "SELECT * FROM users");
                    while ($result = mysqli_fetch_array($query1)) {
                        $ss = $result['email'];
                        $query2 = mysqli_query($conn, "SELECT * FROM statistic WHERE email = '".$result['email']."'");
                        $res1 = mysqli_fetch_array($query2);
                      	$n1 = $result["tr_code"];
              		$query3 = mysqli_query($conn, "SELECT * FROM tt WHERE tr_code = '$n1'");
                    $result2 = mysqli_fetch_array($query3);
                        $qqqqqq = mysqli_query($conn,"SELECT * FROM promo WHERE email = '".$result['email']."'");
                        $rrreee = mysqli_fetch_array($qqqqqq);

                        if($result['blocked'] == 0){
                            $as = "";
                        } else {
                            $as = "<td rowspan='3'><form method='get' action=''><button type='submit' value='w' name='".$i."'>Снять блокировку</button></form></td>";
                        }
                    echo "<table border='1' style='width: 100%;'><tr>
                <th>Пользователь</th>
                <th>Клики</th>
                <th>Регистрация</th>
                <th>Первый депозит</th>
                <th>Повторные депозиты</th>
                <th>Сумма депозитов</th>
                <th>Доходы СРА</th>
                <th style='background-color: #e2e2e2'>Реферальная ссылка</th>

            </tr><tr>
                    <td rowspan='5'>".$ss."</td>
                    
                    <td>".$result2["count"]."</td>
                    <td height='32' ><input type='text' border='none' name='regs".$i."' form='formochka' value='".$res1['regs']."'></input></td>
                    <td><input type='text'  name='first".$i."' form='formochka' value='".$res1['first']."'></td>
                    <td><input type='text' name='again".$i."' form='formochka' value='".$res1['again']."'></td>
                    <td><input type='text' name='summ".$i."' form='formochka' value='".$res1['summ']."'></td>
                    <td><input type='text' name='profit".$i."' form='formochka' value='".$res1['profit']."'></td>
                    <td><input type='text' name='refef".$i."' form='formochka' value='".$res1['ref']."'></td>
                    <td rowspan='5'><button type='submit' name='upd".$i."' form='formochka' value='f'>Обновить информацию</button></td>
                    ".$as."
                    </tr>
                    <tr>
                    <th>Реф ссылка2</th>
                    <th>Треккод</th>
                    <th>Имя менеджера</th>
                    <th>Телеграм менеджера</th>
                    <th>Скайп менеджера</th>
                    <th>Имя пользователя</th>
                    <th>Платежный метод</th>
                    </tr>
                    <tr>
                    <td><input type='text' name='refefef".$i."' form='formochka' value='".$res1['ref2']."'</td>
                    <td>".$result['tr_code']."</td>
                    <td><input type='text' name='m_name".$i."' form='formochka' value='".$result['manag_name']."'</td>
                    <td><input type='text' name='m_tel".$i."' form='formochka' value='".$result['manag_teleg']."'</td>
                    <td><input type='text' name='m_skype".$i."' form='formochka' value='".$result['manag_skype']."'</td>
                    <td>".$result['name']."</td>
                    <td><input type='text' name='method".$i."' form='formochka' value='".$result['method']."'</td>
                    </tr>
                    <tr>
                    <th>Реквизиты</th>
                    <th>Имя программы</th>
                    <th>Базовая ставка</th>
                    </tr>
                    <tr>
                    <td><input type='text' name='requisit".$i."' form='formochka' value='".$result['requisit']."'</td>
                    <td><input type='text' name='pr_name".$i."' form='formochka' value='".$rrreee['name']."'</td>
                    <td><input type='text' name='base".$i."' form='formochka' value='".$rrreee['base']."'</td>
                    </tr>
                    </table>
                    <br><br>";
                    $i++;}
            ?>
            
        
    </div>
</body>
</html>