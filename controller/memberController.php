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

                if($getPw == $userPw) {

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

                print_r('��ȿ���� ���� �����Դϴ�. �ٽ� �Է����ּ���.');
                return false;

            }

            if (preg_match("/^01[0-9]{8,9}$/", $phone)) {

                print_r('������ȣ�� '.$_SESSION['num'].' �Դϴ�.');
                return true;

            } break;

        case "certificationCheck" :

            $resultSet = array('success'=> false, 'msg'=>'������ �����Ͽ����ϴ�. �ٽ� �Է����ּ���.');
            if($_SESSION['num'] == $certificationNumber) {

                $resultSet['success']=true;
                $resultSet['msg']= '������ �����Ͽ����ϴ�.';


            }
            $resultSet['msg'] = iconv("EUC-KR","UTF-8",$resultSet['msg']);
            echo json_encode($resultSet);

            break;


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


        case "pwChk" :

            //��й�ȣ ��ȿ�� �˻�
            $resultPwRule = array('success'=>false, 'msg'=>'��й�ȣ�� ����,���� �������� 10���� �̻� �ۼ��ؾ� �մϴ�.');

            if (!preg_match("/^[a-zA-Z0-9]{10,20}$/", $userPw)) {

                $resultPwRule['success'] = false;
                $resultPwRule['msg'] = iconv("EUC-KR","UTF-8",$resultPwRule['msg']);
                echo json_encode($resultPwRule);
                return false;

            } else {

                $resultPwRule['success']=true;
                $resultPwRule['msg']='��� ������ ��й�ȣ �Դϴ�.';
                $resultPwRule['msg'] = iconv("EUC-KR","UTF-8",$resultPwRule['msg']);
                echo json_encode($resultPwRule);

            }  break;


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

    }



