<?php
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
header("Content-Type: text/html; charset=KS_C_5601-1987");
header("Cache-Control:no-cache");
header("Pragma:no-cache");
?>
<?php

    switch ($mode) {

        case "list" :

            echo "<meta http-equiv='refresh' content='0; url=/view/admin/index.php' >";
            break;

        case "write" :

            echo"<meta http-equiv='refresh' content='0; url=/view/admin/writeLec.php'>";
            break;

        case "lectureFrm" :

/*            print_r ($_POST);
            print_r($_FILES['myfile']);
            exit;*/

            $result = array('success'=> false, 'msg'=>'msg');

            if($cateName == '�з�' || $cateName == "") {

                $result['success']=false;
                $result['msg'] = '���� �з��� �������ּ���';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if($teacher == "") {

                $result['success']=false;
                $result['msg'] = '�������� �Է����ּ���';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if($lecLevel == "") {

                $result['success']=false;
                $result['msg'] = '���� ������ �������ּ���';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if($lecNum == "") {

                $result['success']=false;
                $result['msg'] = '���� ���� �Է����ּ���';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if($lecName == "") {

                $result['success']=false;
                $result['msg'] = '���� �̸��� �Է����ּ���';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if($ir1 == "") {

                $result['success']=false;
                $result['msg'] = '���� �Ұ��� �Է����ּ���';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            } else {

                include_once $_SERVER['DOCUMENT_ROOT'].'/model/insertLecture.php';
                $result['success'] = true;
                $result['msg'] = '���� ��ϵǾ����ϴ�.';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return true;
            } break;

        case "updateLecture" :

            echo "<meta http-equiv='refresh' content='0; url=/view/admin/updateLec.php?lecNo=".$_GET['lecNo']."'>";


    }