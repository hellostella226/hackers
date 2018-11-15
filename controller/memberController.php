<?
$_SESSION['num'] = '123456';
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
/*header("Content-Type: text/html; charset=KS_C_5601-1987");
header("Cache-Control:no-cache");
header("Pragma:no-cache");*/
?>

<?php


    switch($mode) {


        /*로그인*/
        case "logIn" :

            echo "<meta http-equiv='refresh' content='0; url=/view/member/logIn.html' >";
            break;

        /*로그아웃*/
        case "logOut" :

            echo "<meta http-equiv='refresh' content='0; url=/model/logOut.php' >";
            break;

        /*회원가입 완료*/
        case "complete" :

            echo "<meta http-equiv='refresh' content='0; url=/view/member/complete.html'>";
            break;

        /*로그인 확인*/
        case "logInChk" :

           include_once  $_SERVER['DOCUMENT_ROOT'].'/model/logInCheck.php';
            break;


        /*회원가입 1단계*/
        case "step_01" :

            echo "<meta http-equiv='refresh' content='0; url=/view/member/step_01.html' >";
            break;

        /*회원가입 2단계*/
        case "step_02" :

            echo "<meta http-equiv='refresh' content='0; url=/view/member/step_02.html'>";
            break;

        /*회원가입 3단계*/
        case "step_03" :

            echo "<meta http-equiv='refresh' content='0; url=/view/member/step_03.html'>";
            break;

        /*회원가입 유효성 검사 후 등록*/
        case "regist" :

            echo "<meta http-equiv='refresh' content='0; url=/model/regist.php'>";
            break;


        /*휴대폰 인증값 체크 후 세션번호 출력*/
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

        /*휴대폰 인증값 체크 여부 반환*/
        case "certificationCheck" :

            $resultSet = array('success'=> false, 'msg'=>'인증에 실패하였습니다. 다시 입력해주세요.');

            if($_SESSION['num'] == $certificationNumber) {

                $resultSet['success']=true;
                $resultSet['msg']= '인증에 성공하였습니다.';

            }

            $resultSet['msg'] = iconv("EUC-KR","UTF-8",$resultSet['msg']);
            echo json_encode($resultSet);

            break;


        /*회원가입 3단계 중 id체크*/
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


        /*회원가입 3단계 - 비밀번호 체크*/
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
                $resultPwRule['msg'] = "사용 가능한 비밀번호입니다.";
                $resultPwRule['msg'] = iconv("EUC-KR","UTF-8",$resultPwRule['msg']);
                echo json_encode($resultPwRule);
                return true;

            }  break;


        /*회원가입 3단계- 비밀번호 검증*/
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


        /*회원 등록*/
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
                $result['msg'] = '메일 아이디를 입력해주세요';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if(empty($mail[1])) {

                $result['success'] = false;
                $result['msg'] = '메일주소를 입력해주세요';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) {

                $result['success'] = false;
                $result['msg'] = '올바른 메일 형식이 아닙니다. 다시 입력 해 주세요';
                $result['msg'] = iconv("EUC-KR", "UTF-8", $result['msg']);
                echo json_encode($result);
                return false;

            }


            //php 5.2이상부터 지원. 이런 함수가 있다 정도만 알아두기.
            //FILTER_SANITIZE_STRING -> HTML태그를 제거하고, 옵션에 따라 특수 문자를 제거하거나 인코딩하는 필터
          /*$email = $mail[0] . '@' . $mail[1];
            $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_STRING);
            ㅜ  ㅜ$mail_validate = var_dump(filter_var($email, FILTER_VALIDATE_EMAIL));

            if($mail_validate == false) {

                $result['success'] = false;
                $result['msg'] = '올바른 메일 형식이 아닙니다. 다시 입력 해 주세요';
                $result['msg'] = iconv("EUC-KR", "UTF-8", $result['msg']);
                echo json_encode($result);

                return false;

            }*/

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


        /*아이디 찾기*/
        case "findId" :

            echo "<meta http-equiv='refresh' content='0; url=/view/member/findId.html' >";
            break;

        /*아이디찾기 - 휴대폰번호로 찾기*/
        case "phoneCheck" :

            include_once $_SERVER['DOCUMENT_ROOT'].'/model/selectNamePhone.php';

            if(($getPhone['userName']) == "") {

                $resultFindId['success'] = false;
                $resultFindId['msg'] = '입력하신 휴대폰 번호와 일치하는 회원이 없습니다.';
                $resultFindId['msg']= iconv("EUC-KR","UTF-8",$resultFindId['msg']);
                echo json_encode($resultFindId);
                return false;
            }
            if(($getPhone['userName']) != "") {

                $resultFindId['success'] = true;
                $resultFindId['msg'] = '회원이 있습니다..';
                $resultFindId['msg']= iconv("EUC-KR","UTF-8",$resultFindId['msg']);
                echo json_encode($resultFindId);
                return true;

            } break;

        /*아이디찾기 2*/
        case "findId2" :

            echo "<meta http-equiv='refresh' content='0; url=/view/member/findId2.html' >";
            break;

        /*비밀번호 찾기*/
        case "findPw" :

            echo "<meta http-equiv='refresh' content='0; url=/view/member/findPassword.html'>";
            break;

        /*비밀번호 찾기 2*/
        case "findPw2" :

            echo "<meta http-equiv='refresh' content='0; url=/view/member/findPassword2.html' >";
            break;

        /*회원정보 수정*/
        case "modify" :

            include_once $_SERVER['DOCUMENT_ROOT'].'/view/member/modify.html';
            break;

        /*회원정보 업데이트*/
        case "updateMember" :

            $email = $mail[0].'@'.$mail[1];
            $tel = $tel[0].'-'.$tel[1].'-'.$tel[2];
            $phone = $phone[0].'-'.$phone[1].'-'.$phone[2];

            $result = array('success'=> true, 'msg'=>'msg');

            if(empty($userPw)) {

                $result['success'] = false;
                $result['msg'] = '비밀번호를 입력해주세요';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if(empty($mail[0])) {

                $result['success'] = false;
                $result['msg'] = '메일 아이디를 입력해주세요';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if(empty($mail[1])) {

                $result['success'] = false;
                $result['msg'] = '메일주소를 입력해주세요';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) {

                $result['success'] = false;
                $result['msg'] = '올바른 메일 형식이 아닙니다. 다시 입력 해 주세요';
                $result['msg'] = iconv("EUC-KR", "UTF-8", $result['msg']);
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
            $phone = preg_replace("/[^0-9]/", "", $phone);
            if (!preg_match("/^01[0-9]{8,9}$/", $phone)) {

                $result['success'] = false;
                $result['msg'] = '올바른 휴대폰 번호 형식이 아닙니다. 다시 입력 해 주세요';
                $result['msg'] = iconv("EUC-KR", "UTF-8", $result['msg']);
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

                include_once $_SERVER['DOCUMENT_ROOT'].'/model/updateMem.php';

                $resultData['success'] = true;
                $resultData['msg'] = '회원정보가 수정 되었습니다. 로그인 해 주세요';
                $resultData['msg'] = iconv("EUC-KR","UTF-8",$resultData['msg']);
                echo json_encode($resultData);
                return true;

            } break;

        /*인덱스페이지*/
        case "index" :

            echo "<meta http-equiv='refresh' content='0; url=/index.php'>";
            break;



    }


?>
