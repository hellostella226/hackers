<?php
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';



//reviewNo�� �ش��ϴ� �Խñ��� Ŭ���Ҷ����� ī��Ʈ�� 1ȸ�� �����Ѵ�.

$reviewNo = $_GET['rNo'];

$sql =" UPDATE review SET lecCnt = lecCnt + 1 WHERE
        reviewNo = '".$reviewNo."' ";

$resultCnt = mysql_query($sql);



// �ش� ��ȣ�� �Խù��� �ҷ��´�.

$sql2 = "SELECT * FROM review WHERE
          reviewNo = '".$reviewNo."' ";

$resultRv = mysql_query($sql2);

$resultRv = mysql_fetch_array($resultRv);

print_r($resultRv['lecCnt']);


?>