<?php
session_start();
?>
<?php
include_once 'DBconfig.php';
?>
<?php

//���̵�� ��й�ȣ�� ���� POST������� �޴� ��
$id = $_POST['userId'];
$pw = $_POST['userPw'];

$sql = "SELECT * FROM member WHERE userId = '$id'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);

//���̵� �ִٸ�
if($row['userId']) {
//���̵� �������� �� ���̵� ���� ���� ��й�ȣ�� �����´�
    $getPw = "SELECT userPw FROM member WHERE userId='$id'";
    $getPw = mysql_query($getPw);
    $getPw = mysql_result($getPw, 0);

//�����ͺ��̽����� ������ ��й�ȣ�� �Է¹��� ��й�ȣ�� ���ٸ�,
    if($getPw == $pw) {
//64�ڸ��� ������ ���ڿ��� �����Ѵ�.
//�� 64�ڸ��� ������ ���� �ٷ� ��ū���� �α��� ������ ����� Ű ��.
        $key = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789^/';
        for($i=0;$i<=11;$i++)
            $token .= $key[rand(0,63)];

//��� ���� ��ū�� �����ͺ��̽��� ������Ʈ�Ѵ�.
//�Է¹��� ���̵� �ִ� ��ġ�� ������Ʈ.
        $updateToken = "UPDATE member SET token='$token' WHERE userId='$id'";
        $updateToken = mysql_query($updateToken);

//���ǿ� ��ū���� ����Ѵ�.

        $_SESSION['token'] = $token;
        $_SESSION['userNo'] = $row['userNo'];
        $_SESSION['userName'] = $row['userName'];
        $_SESSION['userId'] = $row['userId'];

        Header("Location:/index.php");
    }
    else {
        echo "<script>alert('���̵� ��й�ȣ�� ��ġ���� �ʽ��ϴ�. �ٽ� �α��� �� �ּ���.'); 
                       location.href='/view/member/login.php';
               </script>";
      /*  $prevPage = $_SERVER["HTTP_REFERER"];
        Header("Location:".$prevPage);*/
    }
}

else {
    echo "ID DOESN'T EXIST";
    return 1;
}

exit;
?>