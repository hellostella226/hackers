<?php
session_start();
include_once './DBconfig.php';
header("Content-Type: text/html; charset=KS_C_5601-1987");
header("Cache-Control:no-cache");
header("Pragma:no-cache");
?>

<?php

$cateName = iconv("UTF-8", "EUC-KR", rawurldecode(($_POST['cateS'])));
$searchLW = iconv("UTF-8", "EUC-KR", rawurldecode(($_POST['searchLW'])));
$lacOrUser = iconv("UTF-8", "EUC-KR", rawurldecode(($_POST['lacOrUser'])));

$sql = "SELECT r.reviewNo, c.cateName, l.lecName, r.title, r.userName, r.starChk
        FROM lecture l, category c, review r
        WHERE c.`cateNo` = l.`cateNo` AND l.lecNo = r.lecNo AND c.`cateName` = '".$cateName."' AND $searchLW LIKE '".'%'.$lacOrUser.'%'."' ";

$result = mysql_query($sql);

while($rowDy = mysql_fetch_array($result)) {
   echo("<tr class='bbs-sbj'>
                        <td>".$rowDy['reviewNo']."</td>
                        <td>".$rowDy['cateName']."</td>
                        <td>
						<a href=\"#\">
							<span class=\"tc-gray ellipsis_line\">".$rowDy['lecName']."</span>
							<strong class=\"ellipsis_line\">".$rowDy['title']."</strong>
						</a>
                        </td>
                        <td>
                            <span class=\"star-rating\">
                               <span class=\"star-inner\" style=\"width:".$rowDy['starChk']."%\"></span>
                            </span>
                        </td>
                        <td class=\"last\">".$rowDy['userName']."</td>
                        </tr>");
}
/*
while($lec = mysql_fetch_array($data)) {
    print_r("<option id='lecNos' name='lecNos' value='".$lec['lecNo']."'>".$lec['lecName']."</option>");
}*/
?>
