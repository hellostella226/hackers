<?
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
?>

<?php

    if($mode == logIn) {

        echo "<meta http-equiv='refresh' content='0; url=/view/member/logIn.html' >";

    }

    if($mode == logOut) {

        echo "<meta http-equiv='refresh' content='0; url=/model/logOut.php' >";

    }

    if($_POST['mode'] == 'logInChk') {


        //���̵�� ��й�ȣ�� ���� POST������� �޴� ��
        $id = $_POST['userId'];
        $pw = $_POST['userPw'];
        $password_hash = hash("sha256", $pw);
        $userPw = strtoupper($password_hash);

        $sql = "SELECT * FROM member WHERE userId = '$id'";
        $result = mysql_query($sql);
        $row = mysql_fetch_array($result);


        if($row['userId']) {
            //���̵� �������� �� ���̵� ���� ���� ��й�ȣ�� �����´�
            $getPw = "SELECT userPw FROM member WHERE userId='$id'";
            $getPw = mysql_query($getPw);
            $getPw = mysql_result($getPw, 0);

            //�����ͺ��̽����� ������ ��й�ȣ�� �Է¹��� ��й�ȣ�� ���ٸ�,
            if($getPw == $userPw) {
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

                echo "<meta http-equiv='refresh' content='0; url=/index.php' >";

            }

            else {
                echo $userPw;
                echo "<br>";
                echo $getPw;
                exit;
                echo "<script>alert('���̵� ��й�ȣ�� ��ġ���� �ʽ��ϴ�. �ٽ� �α��� �� �ּ���.'); 
                           location.href='/view/member/logIn.html';
                   </script>";

            }
        }

        else {

                echo "<script>alert('���̵� ��й�ȣ�� ��ġ���� �ʽ��ϴ�. �ٽ� �α��� �� �ּ���.'); 
                               location.href='/view/member/logIn.html';
                       </script>";
        }

        exit;

    }

    if($mode == 'step_01') {

        echo "<meta http-equiv='refresh' content='0; url=/view/member/step_01.html' >";

    }

    if($mode == 'step_02') {

        echo "<meta http-equiv='refresh' content=''0; url='/view/member/step_02.html'>";

    }

?>