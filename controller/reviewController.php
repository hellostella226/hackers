<?php
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
/*header("Content-Type: text/html; charset=KS_C_5601-1987");
header("Cache-Control:no-cache");
header("Pragma:no-cache");*/

    switch ($mode) {

        /*���� �ı� ����Ʈ*/
        case "list" :

            echo "<meta http-equiv='refresh' content='0; url=/view/review/reviewList.html'>";
            break;

        case "writeReview" :

            echo "<meta http-equiv='refresh' content='0; url=/view/review/wirteReview.html'>";
            break;

        /*���� �ı� ����*/
        case "write" :

            $results = array('success'=> false, 'msg'=>'msg');

            if($lecNo == "") {

                $results['success']=false;
                $results['msg'] = '���� �з��� �������ּ���';
                $results['msg'] = iconv("EUC-KR","UTF-8",$results['msg']);
                echo json_encode($results);
                return false;

            }
            if($title == "") {

                $results['success']=false;
                $results['msg'] = '������ �Է����ּ���';
                $results['msg'] = iconv("EUC-KR","UTF-8",$results['msg']);
                echo json_encode($results);
                return false;

            }
            if($ir1 == "") {

                $results['success']=false;
                $results['msg'] = '������ �Է����ּ���';
                $results['msg'] = iconv("EUC-KR","UTF-8",$results['msg']);
                echo json_encode($results);
                return false;

            } else {

                include_once $_SERVER['DOCUMENT_ROOT'].'/model/insertReview.php';

                $results['success'] = true;
                $results['msg'] = '���� ��ϵǾ����ϴ�.';
                $results['msg'] = iconv("EUC-KR","UTF-8",$results['msg']);
                echo json_encode($results);
                return true;

            } break;


        /*���� ����*/
        case "delete" :

            echo "<meta http-equiv='refresh' content='0; url=/model/deleteReview.php?reviewNo=$reviewNo'>";
            break;

        /*���� ����*/
        case "update" :

            echo "<meta http-equiv='refresh' content='0; url=/view/review/updateReview.html?reviewNo=$reviewNo'>";
            break;

        /*���� ���� Ȯ��*/
        case "updateFrm" :

            $results = array('success'=> false, 'msg'=>'msg');

            if($lecNo == "") {

                $results['success']=false;
                $results['msg'] = '���� �з��� �������ּ���';
                $results['msg'] = iconv("EUC-KR","UTF-8",$results['msg']);
                echo json_encode($results);
                return false;

            }
            if($title == "") {

                $results['success']=false;
                $results['msg'] = '������ �Է����ּ���';
                $results['msg'] = iconv("EUC-KR","UTF-8",$results['msg']);
                echo json_encode($results);
                return false;

            }
            if($ir1 == "") {

                $results['success']=false;
                $results['msg'] = '������ �Է����ּ���';
                $results['msg'] = iconv("EUC-KR","UTF-8",$results['msg']);
                echo json_encode($results);
                return false;

            } else {

                include_once $_SERVER['DOCUMENT_ROOT'].'/model/updateReview.php';

                $results['success'] = true;
                $results['msg'] = '���� �����Ǿ����ϴ�..';
                $results['msg'] = iconv("EUC-KR","UTF-8",$results['msg']);
                echo json_encode($results);
                return true;

            } break;



    }