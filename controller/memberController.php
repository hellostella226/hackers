<?
session_start();
$_SESSION['num'] = '123456';
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
/*header("Content-Type: text/html; charset=KS_C_5601-1987");
header("Cache-Control:no-cache");
header("Pragma:no-cache");*/
?>

<?php


    switch($mode) {


        /*�α���*/
       /* case "logIn" :

            echo "<meta http-equiv='refresh' content='0; url=/view/member/logIn.html' >";
            break;*/

        /*ȸ������ �Ϸ�*/
        /*case "complete" :

            echo "<meta http-equiv='refresh' content='0; url=/view/member/complete.html'>";
            break;*/


        /*ȸ������ 1�ܰ�*/
      /*  case "step_01" :

            echo "<meta http-equiv='refresh' content='0; url=/view/member/step_01.html' >";
            break;*/

        /*ȸ������ 2�ܰ�*/
        /*case "step_02" :

            echo "<meta http-equiv='refresh' content='0; url=/view/member/step_02.html'>";
            break;*/

        /*ȸ������ 3�ܰ�*/
       /* case "step_03" :

            echo "<meta http-equiv='refresh' content='0; url=/view/member/step_03.html'>";
            break;*/

        /*ȸ������ ��ȿ�� �˻� �� ���*/
        /*case "regist" :

            echo "<meta http-equiv='refresh' content='0; url=/model/regist.php'>";
            break;*/

        /*�α��� Ȯ��*/
        case "logInChk" :

            include_once  $_SERVER['DOCUMENT_ROOT'].'/model/logInCheck.php';
            break;

        /*�α׾ƿ�*/
        case "logOut" :

            echo "<meta http-equiv='refresh' content='0; url=/model/logOut.php' >";
            break;

        /*�޴��� ������ üũ �� ���ǹ�ȣ ���*/
        case "phoneValidation" :

            $phone = $phone1 . '-' . $phone2 . '-' . $phone3;
            $phone = preg_replace("/[^0-9]/", "", $phone);

            if (!preg_match("/^01[0-9]{8,9}$/", $phone)) {

                $resultSets['success'] = false;
                $resultSets['msg'] = '��ȿ���� ���� �����Դϴ�. �ٽ� �Է����ּ���.';
                $resultSets['msg'] = iconv("EUC-KR","UTF-8",$resultSets['msg']);
                echo json_encode($resultSets);
                return false;

            }

            if (preg_match("/^01[0-9]{8,9}$/", $phone)) {

                $resultSets['success'] = true;
                $resultSets['msg'] = '������ȣ�� '.$_SESSION['num'].'�Դϴ�.';
                $resultSets['phone1'] = $phone1;
                $resultSets['phone2'] = $phone2;
                $resultSets['phone3'] = $phone3;
                $resultSets['msg'] = iconv("EUC-KR","UTF-8",$resultSets['msg']);
                echo json_encode($resultSets);
                return true;

            } break;

        /*�޴��� ������ üũ ���� ��ȯ*/
        case "certificationCheck" :

            $resultSet = array('success'=> false, 'msg'=>'������ �����Ͽ����ϴ�. �ٽ� �Է����ּ���.');

            if($_SESSION['num'] == $certificationNumber) {

                $resultSet['success']=true;
                $resultSet['phone1'] = $phone1;
                $resultSet['phone2'] = $phone2;
                $resultSet['phone3'] = $phone3;
                $resultSet['msg']= '������ �����Ͽ����ϴ�.';

            }

            $resultSet['msg'] = iconv("EUC-KR","UTF-8",$resultSet['msg']);
            echo json_encode($resultSet);

            break;


        /*ȸ������ 3�ܰ� �� idüũ*/
        case "idChk" :

            include_once $_SERVER['DOCUMENT_ROOT'].'/model/idCompare.php';

            $resultId = array('success'=> false, 'msg'=>'�̹� �����ϴ� ���̵��Դϴ�. �ٸ� ���̵� �Է��� �ּ���.');
            $resultIdRule =  array('success'=> false, 'msg' => '��ȿ���� ���� ���̵� �����Դϴ�.');

            if($userId != $data['userId']) {

                if (!preg_match("/^[a-zA-Z0-9]{4,12}$/", $userId)) {

                    $resultRule['success'] = false;
                    $resultIdRule['msg'] = '��ȿ���� ���� �����Դϴ�. �ٽ� �Է����ּ���';
                    $resultIdRule['msg'] = iconv("EUC-KR","UTF-8",$resultIdRule['msg']);
                    echo json_encode($resultIdRule);
                    return false;
                    //break;

                }

                $resultId['success']=true;
                $resultId['msg']='��� ������ ���̵��Դϴ�.';

            }
            $resultId['msg'] = iconv("EUC-KR","UTF-8",$resultId['msg']);
            echo json_encode($resultId);
            break;


        /*ȸ������ 3�ܰ� - ��й�ȣ üũ*/
        case "pwChk" :

            //��й�ȣ ��ȿ�� �˻�
            $resultPwRule = array('success'=>false, 'msg'=>'��й�ȣ�� ����,���� �������� 10���� �̻� �ۼ��ؾ� �մϴ�.');

            if (!preg_match("/^[a-zA-Z0-9]{10,20}$/", $userPw)) {

                $resultPwRule['success'] = false;
                $resultPwRule['msg'] = iconv("EUC-KR","UTF-8",$resultPwRule['msg']);
                echo json_encode($resultPwRule);
                return false;

            } else {

                $resultPwRule['success'] = true;
                $resultPwRule['msg'] = "��� ������ ��й�ȣ�Դϴ�.";
                $resultPwRule['msg'] = iconv("EUC-KR","UTF-8",$resultPwRule['msg']);
                echo json_encode($resultPwRule);
                return true;

            }  break;


        /*ȸ������ 3�ܰ�- ��й�ȣ ����*/
        case "pwValidatiaon" :

            //��й�ȣ ����
            $resultPw = array('success'=>false, 'msg'=> '��й�ȣ�� ��ġ���� �ʽ��ϴ�.');

            if($userPw != $userPw2) {

                $resultPw['success'] = false;
                $resultPw['msg'] = iconv("EUC-KR","UTF-8",$resultPw['msg']);
                echo json_encode($resultPw);
                return false;

            } else {

                $resultPw['success']=true;
                $resultPw['msg']= '��й�ȣ ��ġ.';
                $resultPw['msg'] = iconv("EUC-KR","UTF-8",$resultPw['msg']);
                echo json_encode($resultPw);

            }  break;


        /*ȸ�� ���*/
        case "signUp" :

            $email = $mail[0].'@'.$mail[1];
            $tel = $tel[0].'-'.$tel[1].'-'.$tel[2];
            $phone = $phone[0].'-'.$phone[1].'-'.$phone[2];

            $result = array('success'=> true, 'msg'=>'msg');

            if(empty($userName)) {

                $result['success'] = false;
                $result['msg'] = '�̸��� �Է����ּ���';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if(empty($userId)) {

                $result['success'] = false;
                $result['msg'] = '���̵� �Է����ּ���';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if(empty($idChkFrm)) {

                $result['success'] = false;
                $result['msg'] = '���̵� �ߺ�Ȯ���� �������ּ���';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if(empty($userPw)) {

                $result['success'] = false;
                $result['msg'] = '��й�ȣ�� �Է����ּ���';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if(empty($mail[0])) {

                $result['success'] = false;
                $result['msg'] = '���� ���̵� �Է����ּ���';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if(empty($mail[1])) {

                $result['success'] = false;
                $result['msg'] = '�����ּҸ� �Է����ּ���';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) {

                $result['success'] = false;
                $result['msg'] = '�ùٸ� ���� ������ �ƴմϴ�. �ٽ� �Է� �� �ּ���';
                $result['msg'] = iconv("EUC-KR", "UTF-8", $result['msg']);
                echo json_encode($result);
                return false;

            }


            //php 5.2�̻���� ����. �̷� �Լ��� �ִ� ������ �˾Ƶα�.
            //FILTER_SANITIZE_STRING -> HTML�±׸� �����ϰ�, �ɼǿ� ���� Ư�� ���ڸ� �����ϰų� ���ڵ��ϴ� ����
          /*$email = $mail[0] . '@' . $mail[1];
            $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_STRING);
            ��  ��$mail_validate = var_dump(filter_var($email, FILTER_VALIDATE_EMAIL));

            if($mail_validate == false) {

                $result['success'] = false;
                $result['msg'] = '�ùٸ� ���� ������ �ƴմϴ�. �ٽ� �Է� �� �ּ���';
                $result['msg'] = iconv("EUC-KR", "UTF-8", $result['msg']);
                echo json_encode($result);

                return false;

            }*/

            if(empty($phone)) {

                $result['success'] = false;
                $result['msg'] = '�޴��� ��ȣ�� �Է����ּ���';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if(empty($address1)) {

                $result['success'] = false;
                $result['msg'] = '�����ȣ�� �Է����ּ���';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if(empty($address2)) {

                $result['success'] = false;
                $result['msg'] = '�⺻�ּҸ� �Է����ּ���';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if(empty($address3)) {

                $result['success'] = false;
                $result['msg'] = '���ּҸ� �Է����ּ���';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }

            else {

                include_once $_SERVER['DOCUMENT_ROOT'].'/model/regist.php';

                $resultData['success'] = true;
                $resultData['msg'] = 'ȸ������ �Ǿ����ϴ�. �α��� �� �ּ���';
                $resultData['msg'] = iconv("EUC-KR","UTF-8",$resultData['msg']);
                echo json_encode($resultData);
                return true;

            } break;


        /*���̵� ã��*/
        case "findId" :

            echo "<meta http-equiv='refresh' content='0; url=/view/member/findId.html' >";
            break;

        /*���̵�ã�� - �޴�����ȣ�� ã��*/
        case "phoneCheck" :

            include_once $_SERVER['DOCUMENT_ROOT'].'/model/selectNamePhone.php';

            if(($getPhone['userName']) == "") {

                $resultFindId['success'] = false;
                $resultFindId['msg'] = '�Է��Ͻ� �޴��� ��ȣ�� ��ġ�ϴ� ȸ���� �����ϴ�.';
                $resultFindId['msg']= iconv("EUC-KR","UTF-8",$resultFindId['msg']);
                echo json_encode($resultFindId);
                return false;
            }
            if(($getPhone['userName']) != "") {

                $resultFindId['success'] = true;
                $resultFindId['msg'] = 'ȸ���� �ֽ��ϴ�..';
                $resultFindId['msg']= iconv("EUC-KR","UTF-8",$resultFindId['msg']);
                echo json_encode($resultFindId);
                return true;

            } break;

        /*���̵�ã�� 2*/
        case "findId2" :

            echo "<meta http-equiv='refresh' content='0; url=/view/member/findId2.html' >";
            break;

        /*��й�ȣ ã��*/
     /*   case "findPw" :

            echo "<meta http-equiv='refresh' content='0; url=/view/member/findPassword.html'>";
            break;*/

        /*��й�ȣ ã�� 2*/
       /* case "findPw2" :

            echo "<meta http-equiv='refresh' content='0; url=/view/member/findPassword2.html' >";
            break;*/

        /*ȸ������ ����*/
       /* case "modify" :

            include_once $_SERVER['DOCUMENT_ROOT'].'/view/member/modify.html';
            break;*/

        /*ȸ������ ������Ʈ*/
        case "updateMember" :

            $email = $mail[0].'@'.$mail[1];
            $tel = $tel[0].'-'.$tel[1].'-'.$tel[2];
            $phone = $phone[0].'-'.$phone[1].'-'.$phone[2];

            $result = array('success'=> true, 'msg'=>'msg');

            if(empty($userPw)) {

                $result['success'] = false;
                $result['msg'] = '��й�ȣ�� �Է����ּ���';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if(empty($mail[0])) {

                $result['success'] = false;
                $result['msg'] = '���� ���̵� �Է����ּ���';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if(empty($mail[1])) {

                $result['success'] = false;
                $result['msg'] = '�����ּҸ� �Է����ּ���';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) {

                $result['success'] = false;
                $result['msg'] = '�ùٸ� ���� ������ �ƴմϴ�. �ٽ� �Է� �� �ּ���';
                $result['msg'] = iconv("EUC-KR", "UTF-8", $result['msg']);
                echo json_encode($result);
                return false;

            }
            if(empty($phone)) {

                $result['success'] = false;
                $result['msg'] = '�޴��� ��ȣ�� �Է����ּ���';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            $phone = preg_replace("/[^0-9]/", "", $phone);
            if (!preg_match("/^01[0-9]{8,9}$/", $phone)) {

                $result['success'] = false;
                $result['msg'] = '�ùٸ� �޴��� ��ȣ ������ �ƴմϴ�. �ٽ� �Է� �� �ּ���';
                $result['msg'] = iconv("EUC-KR", "UTF-8", $result['msg']);
                echo json_encode($result);
                return false;

            }
            if(empty($address1)) {

                $result['success'] = false;
                $result['msg'] = '�����ȣ�� �Է����ּ���';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if(empty($address2)) {

                $result['success'] = false;
                $result['msg'] = '�⺻�ּҸ� �Է����ּ���';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if(empty($address3)) {

                $result['success'] = false;
                $result['msg'] = '���ּҸ� �Է����ּ���';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            else {

                include_once $_SERVER['DOCUMENT_ROOT'].'/model/updateMem.php';

                $resultData['success'] = true;
                $resultData['msg'] = 'ȸ�������� ���� �Ǿ����ϴ�. �α��� �� �ּ���';
                $resultData['msg'] = iconv("EUC-KR","UTF-8",$resultData['msg']);
                echo json_encode($resultData);
                return true;

            } break;

        /*�ε���������*/
        case "index" :

            echo "<meta http-equiv='refresh' content='0; url=/index.php'>";
            break;

        /*���̵� ã�� -�޴�������*/
        case "phoneValidations" :

            $phone = $phone1 . '-' . $phone2 . '-' . $phone3;
            $phone = preg_replace("/[^0-9]/", "", $phone);

            if (!preg_match("/^01[0-9]{8,9}$/", $phone)) {

                $resultSets['success'] = false;
                $resultSets['msg'] = '��ȿ���� ���� �����Դϴ�. �ٽ� �Է����ּ���.';
                $resultSets['msg'] = iconv("EUC-KR","UTF-8",$resultSets['msg']);
                echo json_encode($resultSets);
                return false;

            }

            if (preg_match("/^01[0-9]{8,9}$/", $phone)) {

                include_once $_SERVER['DOCUMENT_ROOT'].'/model/selectNamePhone.php';
                if(!empty($resultSets)) {

                    $resultSets['success'] = true;
                    $resultSets['msg'] = '������ȣ�� ' . $_SESSION['num'] . '�Դϴ�.';
                    $resultSets['msg'] = iconv("EUC-KR", "UTF-8", $resultSets['msg']);
                    echo json_encode($resultSets);
                    return true;

                }
                if(empty($resultSets)) {

                    $resultSets['success'] = 'none';
                    $resultSets['msg'] = '�Է��Ͻ� ������ ��ġ�ϴ� ȸ���� �����ϴ�.';
                    $resultSets['msg'] = iconv("EUC-KR", "UTF-8", $resultSets['msg']);
                    echo json_encode($resultSets);
                    return false;
                }

            } break;

        /*���̵� ã�� : ���� ����*/
        case "mailValidation" :

            if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) {

                $result['success'] = false;
                $result['msg'] = '�ùٸ� ���� ������ �ƴմϴ�. �ٽ� �Է� �� �ּ���';
                $result['msg'] = iconv("EUC-KR", "UTF-8", $result['msg']);
                echo json_encode($result);
                return false;

            }
            if(empty($email)) {

                $result['success'] =  false;
                $result['msg'] = '������ �Է°��� �����ϴ�. �ٽ� �Է� �� �ּ���.';
                $result['msg'] = iconv("EUC-KR","UTF-8", $result['msg']);
                echo json_encode($result);
                return false;

            }
            if(!empty($email)) {

                include_once $_SERVER['DOCUMENT_ROOT'].'/model/selectNameEmail.php';
                if(!empty($resultSets)) {

                    $resultSets['success'] = true;
                    $resultSets['msg'] = '������ȣ�� ' . $_SESSION['num'] . '�Դϴ�.';
                    $resultSets['msg'] = iconv("EUC-KR", "UTF-8", $resultSets['msg']);
                    echo json_encode($resultSets);
                    return true;

                }
                if(empty($resultSets)) {

                    $resultSets['success'] = 'none';
                    $resultSets['msg'] = '�Է��Ͻ� ������ ��ġ�ϴ� ȸ���� �����ϴ�.';
                    $resultSets['msg'] = iconv("EUC-KR", "UTF-8", $resultSets['msg']);
                    echo json_encode($resultSets);
                    return false;
                }
            }  break;


        /*���ǹ�ȣ�� ������ Ȯ��*/
        case 'randomFrm'  :

            if($inputNumber != $_SESSION['num']) {

                $result['success'] = false;
                $result['msg'] = '������ȣ�� ��ġ���� �ʽ��ϴ�. �ٽ� �õ� �� �ּ���';
                $result['msg'] = iconv("EUC-KR", "UTF-8", $result['msg']);
                echo json_encode($result);
                return false;

            }
            if($inputNumber == $_SESSION['num']) {

                $result['success'] = true;
                $result['msg'] = '�����Ǿ����ϴ�.';
                $result['msg'] = iconv("EUC-KR", "UTF-8", $result['msg']);
                echo json_encode($result);
                return true;

            } break;


        /*��й�ȣ ã�� : �޴��� ����*/
        case 'phoneValidations2' :

            $phone = $phone1 . '-' . $phone2 . '-' . $phone3;
            $phone = preg_replace("/[^0-9]/", "", $phone);

            if (!preg_match("/^01[0-9]{8,9}$/", $phone)) {

                $resultSets['success'] = false;
                $resultSets['msg'] = '��ȿ���� ���� �����Դϴ�. �ٽ� �Է����ּ���.';
                $resultSets['msg'] = iconv("EUC-KR","UTF-8",$resultSets['msg']);
                echo json_encode($resultSets);
                return false;

            }

            if (preg_match("/^01[0-9]{8,9}$/", $phone)) {

                include_once $_SERVER['DOCUMENT_ROOT'].'/model/selectNamePhonePw.php';
                if(!empty($resultSets)) {

                    $resultSets['success'] = true;
                    $resultSets['msg'] = '������ȣ�� ' . $_SESSION['num'] . '�Դϴ�.';
                    $resultSets['msg'] = iconv("EUC-KR", "UTF-8", $resultSets['msg']);
                    echo json_encode($resultSets);
                    return true;

                }
                if(empty($resultSets)) {

                    $resultSets['success'] = 'none';
                    $resultSets['msg'] = '�Է��Ͻ� ������ ��ġ�ϴ� ȸ���� �����ϴ�.';
                    $resultSets['msg'] = iconv("EUC-KR", "UTF-8", $resultSets['msg']);
                    echo json_encode($resultSets);
                    return false;
                }

            } break;

        case 'changePassword' :

            if(empty($userId) || $userPw != $userPw2) {

                $resultSet['success'] = false;
                $resultSet['msg'] = '��й�ȣ�� ��ġ���� �ʰų� ������ �ùٸ��� �ʽ��ϴ�. �ٽ� �õ��� �ּ���';
                $resultSet['msg'] = iconv("EUC-KR","UTF-8",$resultSet['msg']);
                echo json_encode($resultSet);
                return false;

            }

            if(!empty($userId) && $userPw == $userPw2) {

                include_once $_SERVER['DOCUMENT_ROOT'].'/model/passChange.php';

                if ($resultData == false) {

                    $resultSets['success'] = false;
                    $resultSets['msg'] = '�۾��� ������ �ֽ��ϴ�. �ٽ� �õ��� �ּ���.';
                    $resultSets['msg'] = iconv("EUC-KR", "UTF-8", $resultSets['msg']);
                    echo json_encode($resultSets);

                }
                if ($resultData == true) {

                    $resultSets['success'] = true;
                    $resultSets['msg'] = '��й�ȣ�� ����Ǿ����ϴ�. �α��� �� �ּ���.';
                    $resultSets['msg'] = iconv("EUC-KR", "UTF-8", $resultSets['msg']);
                    echo json_encode($resultSets);

                }

            } break;


    }


?>
