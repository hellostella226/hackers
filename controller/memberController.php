<?
$_SESSION['num'] = '123456';
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
header("Content-Type: text/html; charset=KS_C_5601-1987");
header("Cache-Control:no-cache");
header("Pragma:no-cache");
?>

<?php


    switch($mode) {


        case "logIn" :

            echo "<meta http-equiv='refresh' content='0; url=/view/member/logIn.html' >";
            break;

        case "logOut" :

            echo "<meta http-equiv='refresh' content='0; url=/model/logOut.php' >";
            break;

        case "logInChk" :

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

                if($getPw == $userPw) {

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
            break;

        case "step_01" :

            echo "<meta http-equiv='refresh' content='0; url=/view/member/step_01.html' >";
            break;

        case "step_02" :

            echo "<meta http-equiv='refresh' content='0; url=/view/member/step_02.html'>";
            break;

        case "step_03" :

            echo "<meta http-equiv='refresh' content='0; url=/view/member/step_03.html'>";
            break;

        case "regist" :

            echo "<meta http-equiv='refresh' content='0; url=/model/regist.php'>";
            break;

        case "phoneValidation" :

            $_SESSION['phone1'] = $phone[0];
            $_SESSION['phone2'] = $phone[1];
            $_SESSION['phone3'] = $phone[2];

            $phone = $phone[0] . '-' . $phone[1] . '-' . $phone[2];
            $phone = preg_replace("/[^0-9]/", "", $phone);

            if (!preg_match("/^01[0-9]{8,9}$/", $phone)) {

                print_r('유효하지 않은 형식입니다. 다시 입력해주세요.');
                return false;

            }

            if (preg_match("/^01[0-9]{8,9}$/", $phone)) {

                print_r('인증번호는 '.$_SESSION['num'].' 입니다.');
                return true;

            } break;

        case "certificationCheck" :

            $resultSet = array('success'=> false, 'msg'=>'인증에 실패하였습니다. 다시 입력해주세요.');
            if($_SESSION['num'] == $certificationNumber) {

                $resultSet['success']=true;
                $resultSet['msg']= '인증에 성공하였습니다.';


            }
            $resultSet['msg'] = iconv("EUC-KR","UTF-8",$resultSet['msg']);
            echo json_encode($resultSet);

            break;


        case "signUp" :
            $idFlag=0;
            $nameFlag=0;
            $pw2Flag=0;
            $pw1Flag=0;

            $resultSet = array('success'=> false, 'msg'=>'이미 존재하는 아이디입니다.');

            if($userId == )



            break;


    }



