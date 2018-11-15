<?php
if($_GET['p']) {
    $p = $_GET['p'];
} else {
    $p = 1;
}



if($_GET['cateS'] && $_GET['searchLW'] && $_GET['lacOrUser']) {
    $cate_No = $_GET['cateS'] ;
    $where .= " AND c.cateNo = '".$cate_No."' AND ".$_GET['searchLW']." LIKE '%".$_GET['lacOrUser']."%' ";
}

if($_GET['cateNo'] && !$cate_No) {
    $where .= "AND c.cateNo = '".$_GET['cateNo']."'";
}



$sql= "SELECT r.userName, r.reviewNo, c.cateName, r.title, l.lecName, r.starChk, r.lecCnt
        FROM review r, lecture l, category c
         WHERE l.lecNo = r.lecNo AND l.cateNo = c.cateNo ".$where."
          ORDER BY r.reviewNo DESC";




$result = mysql_query($sql);
$total_cnt = mysql_num_rows($result);

$list_cnt = 5;
$start = ($list_cnt * $p) - $list_cnt;
$page_cnt = ceil($total_cnt/$list_cnt);

$page_num_cnt = 5;
if($page_cnt >  $page_num_cnt) {
    $block = (ceil($p / $page_num_cnt) * $page_num_cnt);
    $num_cnt_s = $block - $page_num_cnt + 1;
    if($page_cnt < $block) {
        $num_cnt = $page_cnt;
    } else {
        $num_cnt = $block;
    }

} else {
    $num_cnt = $page_cnt;
    $num_cnt_s = 1;
}


$sql2 = "SELECT r.userName, r.reviewNo, c.cateName, r.title, l.lecName, r.starChk, r.lecCnt
        FROM review r, lecture l, category c
         WHERE l.lecNo = r.lecNo AND l.cateNo = c.cateNo ".$where."
          ORDER BY r.reviewNo DESC limit $start, $list_cnt";

$result2 = mysql_query($sql2);
?>