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


        case "idChk" :

            include_once $_SERVER['DOCUMENT_ROOT'].'/model/idCompare.php';

            $resultId = array('success'=> false, 'msg'=>'이미 존재하는 아이디입니다. 다른 아이디를 입력해 주세요.');
            $resultIdRule =  array('success'=> false, 'msg' => '유효하지 않은 아이디 형식입니다.');

            if($userId != $data['userId']) {

                if (!preg_match("/^[a-zA-Z0-9]{4,12}$/", $userId)) {

                    $resultRule['success'] = false;
                    $resultIdRule['msg'] = '유효하지 않은 형식입니다. 다시 입력해주세요';
                    $resultIdRule['msg'] = iconv("EUC-KR","UTF-8",$resultIdRule['msg']);
                    echo json_encode($resultIdRule);
                    return false;
                    //break;

                }

                $resultId['success']=true;
                $resultId['msg']='사용 가능한 아이디입니다.';

            }
            $resultId['msg'] = iconv("EUC-KR","UTF-8",$resultId['msg']);
            echo json_encode($resultId);
            break;


        case "pwChk" :

            //비밀번호 유효성 검사
            $resultPwRule = array('success'=>false, 'msg'=>'비밀번호는 영문,숫자 조합으로 10글자 이상 작성해야 합니다.');

            if (!preg_match("/^[a-zA-Z0-9]{10,20}$/", $userPw)) {

                $resultPwRule['success'] = false;
                $resultPwRule['msg'] = iconv("EUC-KR","UTF-8",$resultPwRule['msg']);
                echo json_encode($resultPwRule);
                return false;

            } else {

                $resultPwRule['success'] = true;
                $resultPwRule['msg'] = "비밀번호가 일치합니다.";
                $resultPwRule['msg'] = iconv("EUC-KR","UTF-8",$resultPwRule['msg']);
                echo json_encode($resultPwRule);
                return true;

            }  break;


        case "pwValidatiaon" :

            //비밀번호 검증
            $resultPw = array('success'=>false, 'msg'=> '비밀번호가 일치하지 않습니다.');

            if($userPw != $userPw2) {

                $resultPw['success'] = false;
                $resultPw['msg'] = iconv("EUC-KR","UTF-8",$resultPw['msg']);
                echo json_encode($resultPw);
                return false;

            } else {

                $resultPw['success']=true;
                $resultPw['msg']= '비밀번호 일치.';
                $resultPw['msg'] = iconv("EUC-KR","UTF-8",$resultPw['msg']);
                echo json_encode($resultPw);

            }  break;


        case "signUp" :

            $email = $mail[0].'@'.$mail[1];
            $tel = $tel[0].'-'.$tel[1].'-'.$tel[2];
            $phone = $phone[0].'-'.$phone[1].'-'.$phone[2];

            $result = array('success'=> true, 'msg'=>'msg');

            if(empty($userName)) {

                $result['success'] = false;
                $result['msg'] = '이름을 입력해주세요';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if(empty($userId)) {

                $result['success'] = false;
                $result['msg'] = '아이디를 입력해주세요';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if(empty($idChkFrm)) {

                $result['success'] = false;
                $result['msg'] = '아이디 중복확인을 진행해주세요';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if(empty($userPw)) {

                $result['success'] = false;
                $result['msg'] = '비밀번호를 입력해주세요';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if(empty($mail[0])) {

                $result['success'] = false;
                $result['msg'] = '메일 아이디를 정확히 입력해주세요';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if(empty($mail[1])) {

                $result['success'] = false;
                $result['msg'] = '메일주소를 정확히 입력해주세요';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }

            if(empty($phone)) {

                $result['success'] = false;
                $result['msg'] = '휴대폰 번호를 입력해주세요';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if(empty($address1)) {

                $result['success'] = false;
                $result['msg'] = '우편번호를 입력해주세요';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if(empty($address2)) {

                $result['success'] = false;
                $result['msg'] = '기본주소를 입력해주세요';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if(empty($address3)) {

                $result['success'] = false;
                $result['msg'] = '상세주소를 입력해주세요';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }

            else {

                include_once $_SERVER['DOCUMENT_ROOT'].'/model/regist.php';

                $resultData['success'] = true;
                $resultData['msg'] = '회원가입 되었습니다. 로그인 해 주세요';
                $resultData['msg'] = iconv("EUC-KR","UTF-8",$resultData['msg']);
                echo json_encode($resultData);
                return true;

            } break;




    }



