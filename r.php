<?php
    
$ref = $_GET["ref"];
$cn = mysqli_connect("localhost", "cm68506_45", "cm68506_45", "cm68506_45");
$q = mysqli_query($cn,"SELECT * FROM users WHERE tr_code = '$ref'");
if($r = mysqli_fetch_array($q)){
    $mail = $r['email'];
    $q1 = mysqli_query($cn,"SELECT * FROM statistic WHERE email = '$mail'");
    $r1 = mysqli_fetch_array($q1);
    
    $qq = mysqli_query($cn,"SELECT * FROM tt WHERE tr_code = '$ref'");
    $rr = mysqli_fetch_array($qq);
    $count = $rr["count"];
    $count++;
    mysqli_query($cn,"UPDATE tt SET count = '$count' WHERE tr_code = '$ref'");
    
    $refff = $r1['ref2'];
    header("Location: $refff");
    
}
    
?>