<?php
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
header("Content-Type: text/html; charset=KS_C_5601-1987");
header("Cache-Control:no-cache");
header("Pragma:no-cache");
?>
<?php

    switch ($mode) {

        /*���� ��� Ȯ��*/
        case "lectureFrm" :

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
                $results = array('success'=> false, 'msg'=>'msg');

                include_once $_SERVER['DOCUMENT_ROOT'].'/model/insertLecture.php';

                $results['success'] = true;
                $results['msg'] = '���� ��ϵǾ����ϴ�.';
                $results['msg'] = iconv("EUC-KR","UTF-8",$results['msg']);
                echo json_encode($results);
                return true;

            } break;

        /*���� ����*/
        case "updateLecture" :

            echo "<meta http-equiv='refresh' content='0; url=/view/admin/updateLec.html?lecNo=".$_GET['lecNo']."'>";
            break;

        case "deleteLecture" :

            include_once $_SERVER['DOCUMENT_ROOT'].'/model/deleteLecture.php';

            if(!isset($result)) {
                $results['success'] = false;
                $results['msg'] = '������ �����߽��ϴ�.';
                $results['msg'] = iconv("EUC-KR","UTF-8",$results['msg']);
                echo json_encode($results);
                return false;
            }
            if(isset($result)) {
                $results['success'] = true;
                $results['msg'] = '�����Ǿ����ϴ�.';
                $results['msg'] = iconv("EUC-KR","UTF-8",$results['msg']);
                echo json_encode($results);
                return true;
            } break;





    }