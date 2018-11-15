<?
$_SESSION['num'] = '123456';
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
/*header("Content-Type: text/html; charset=KS_C_5601-1987");
header("Cache-Control:no-cache");
header("Pragma:no-cache");*/
?>

<?php


    switch($mode) {


        /*�α���*/
        case "logIn" :

            echo "<meta http-equiv='refresh' content='0; url=/view/member/logIn.html' >";
            break;

        /*�α׾ƿ�*/
        case "logOut" :

            echo "<meta http-equiv='refresh' content='0; url=/model/logOut.php' >";
            break;

        /*ȸ������ �Ϸ�*/
        case "complete" :

            echo "<meta http-equiv='refresh' content='0; url=/view/member/complete.html'>";
            break;

        /*�α��� Ȯ��*/
        case "logInChk" :

           include_once  $_SERVER['DOCUMENT_ROOT'].'/model/logInCheck.php';
            break;


        /*ȸ������ 1�ܰ�*/
        case "step_01" :

            echo "<meta http-equiv='refresh' content='0; url=/view/member/step_01.html' >";
            break;

        /*ȸ������ 2�ܰ�*/
        case "step_02" :

            echo "<meta http-equiv='refresh' content='0; url=/view/member/step_02.html'>";
            break;

        /*ȸ������ 3�ܰ�*/
        case "step_03" :

            echo "<meta http-equiv='refresh' content='0; url=/view/member/step_03.html'>";
            break;

        /*ȸ������ ��ȿ�� �˻� �� ���*/
        case "regist" :

            echo "<meta http-equiv='refresh' content='0; url=/model/regist.php'>";
            break;


        /*�޴��� ������ üũ �� ���ǹ�ȣ ���*/
        case "phoneValidation" :

            $_SESSION['phone1'] = $phone[0];
            $_SESSION['phone2'] = $phone[1];
            $_SESSION['phone3'] = $phone[2];

            $phone = $phone[0] . '-' . $phone[1] . '-' . $phone[2];
            $phone = preg_replace("/[^0-9]/", "", $phone);

            if (!preg_match("/^01[0-9]{8,9}$/", $phone)) {

                print_r('��ȿ���� ���� �����Դϴ�. �ٽ� �Է����ּ���.');
                return false;

            }

            if (preg_match("/^01[0-9]{8,9}$/", $phone)) {

                print_r('������ȣ�� '.$_SESSION['num'].' �Դϴ�.');
                return true;

            } break;

        /*�޴��� ������ üũ ���� ��ȯ*/
        case "certificationCheck" :

            $resultSet = array('success'=> false, 'msg'=>'������ �����Ͽ����ϴ�. �ٽ� �Է����ּ���.');

            if($_SESSION['num'] == $certificationNumber) {

                $resultSet['success']=true;
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
        case "findPw" :

            echo "<meta http-equiv='refresh' content='0; url=/view/member/findPassword.html'>";
            break;

        /*��й�ȣ ã�� 2*/
        case "findPw2" :

            echo "<meta http-equiv='refresh' content='0; url=/view/member/findPassword2.html' >";
            break;

        /*ȸ������ ����*/
        case "modify" :

            include_once $_SERVER['DOCUMENT_ROOT'].'/view/member/modify.html';
            break;

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



    }


?>
