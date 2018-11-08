<?php
include 'DBconfig.php';
?>
<?php


//reviewNo에 해당하는 게시글을 클릭할때마다 카운트가 1회씩 증가한다.

$reviewNo = $_GET['reviewNo'];

$sql1 =" UPDATE review SET lecCnt = lecCnt + 1 WHERE
          reviewNo = '".$reviewNo."' ";



$sql = "SELECT r.reviewNo, r.userNo, r.userName, r.wDate, r.title, r.content, r.lecNo, r.lecCnt, r.starChk,
                l.lecName, l.`thumbnail`, l.`teacher`, l.`lecLevel`, l.`lecTime`, l.`lecNum`, l.`detail`, m.`userId`, c.cateName, c.cateNo
        FROM review r, lecture l, memberController.php m, category c
        WHERE
             l.lecNo = r.`lecNo` AND 
             r.`userNo` = m.`userNo` AND 
             l.`cateNo` = c.`cateNo` AND 
             r.`reviewNo` = '".$reviewNo."' ";

$result = mysql_query($sql);

$row = mysql_fetch_array($result);

$sql2= "SELECT * FROM lecture";

$result2 = mysql_query($sql);


?>