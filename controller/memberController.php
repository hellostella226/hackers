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


        //아이디와 비밀번호의 값을 POST방식으로 받는 것
        $id = $_POST['userId'];
        $pw = $_POST['userPw'];
        $password_hash = hash("sha256", $pw);
        $userPw = strtoupper($password_hash);

        $sql = "SELECT * FROM member WHERE userId = '$id'";
        $result = mysql_query($sql);
        $row = mysql_fetch_array($result);


        if($row['userId']) {
            //아이디를 바탕으로 그 아이디가 가진 곳의 비밀번호를 가져온다
            $getPw = "SELECT userPw FROM member WHERE userId='$id'";
            $getPw = mysql_query($getPw);
            $getPw = mysql_result($getPw, 0);

            //데이터베이스에서 가져온 비밀번호가 입력받은 비밀번호와 같다면,
            if($getPw == $userPw) {
                //64자리의 무작위 문자열을 생성한다.
                //이 64자리의 임의의 수가 바로 토큰으로 로그인 대조에 사용할 키 값.

                $key = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789^/';

                for($i=0;$i<=11;$i++)

                    $token .= $key[rand(0,63)];

                //방금 만든 토큰을 데이터베이스에 업데이트한다.
                //입력받은 아이디가 있는 위치에 업데이트.
                $updateToken = "UPDATE member SET token='$token' WHERE userId='$id'";
                $updateToken = mysql_query($updateToken);

                //세션에 토큰값을 등록한다.

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
                echo "<script>alert('아이디나 비밀번호가 일치하지 않습니다. 다시 로그인 해 주세요.'); 
                           location.href='/view/member/logIn.html';
                   </script>";

            }
        }

        else {

                echo "<script>alert('아이디나 비밀번호가 일치하지 않습니다. 다시 로그인 해 주세요.'); 
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