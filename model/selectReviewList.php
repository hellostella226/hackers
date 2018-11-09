<?php
session_start();
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
/*pagination test*/
include_once  'dbcontroller.php';
include_once("pagination.class.php");
?>
<?php
?>
<?php

$db_handle = new DBController();
/*분류 테이블 가져오기*/

$sql= "SELECT r.userName, r.reviewNo, c.cateName, r.title, l.lecName, r.starChk
        FROM review r, lecture l, category c
         WHERE l.lecNo = r.lecNo AND l.cateNo = c.cateNo
          ORDER BY r.reviewNo DESC;";

$result = mysql_query($sql);

while($row = mysql_fetch_array($result)) {
    print_r("<tr class='bbs-sbj'>
                        <td>".$row['reviewNo']."</td>
                        <td>".$row['cateName']."</td>
                        <td>
						<a href=\"#\">
							<span class=\"tc-gray ellipsis_line\">".$row['lecName']."</span>
							<strong class=\"ellipsis_line\">".$row['title']."</strong>
						</a>
                        </td>
                        <td>
                            <span class=\"star-rating\">
                               <span class=\"star-inner\" style=\"width:".$row['starChk']."%\"></span>
                            </span>
                        </td>
                        <td class=\"last\">".$row['userName']."</td>
                        </tr>");
}

?>