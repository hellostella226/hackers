<?php
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
header("Content-Type: text/html; charset=KS_C_5601-1987");
header("Cache-Control:no-cache");
header("Pragma:no-cache");
?>
<?php

    switch ($mode) {

        /*강의 등록 확인*/
        case "lectureFrm" :

            $result = array('success'=> false, 'msg'=>'msg');

            if($cateName == '분류' || $cateName == "") {

                $result['success']=false;
                $result['msg'] = '강의 분류를 선택해주세요';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if($teacher == "") {

                $result['success']=false;
                $result['msg'] = '선생님을 입력해주세요';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if($lecLevel == "") {

                $result['success']=false;
                $result['msg'] = '강의 레벨을 선택해주세요';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if($lecNum == "") {

                $result['success']=false;
                $result['msg'] = '강좌 수를 입력해주세요';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if($lecName == "") {

                $result['success']=false;
                $result['msg'] = '강좌 이름을 입력해주세요';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if($ir1 == "") {

                $result['success']=false;
                $result['msg'] = '강의 소개를 입력해주세요';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            } else {
                $results = array('success'=> false, 'msg'=>'msg');

                include_once $_SERVER['DOCUMENT_ROOT'].'/model/insertLecture.php';

                $results['success'] = true;
                $results['msg'] = '글이 등록되었습니다.';
                $results['msg'] = iconv("EUC-KR","UTF-8",$results['msg']);
                echo json_encode($results);
                return true;

            } break;

        /*강의 수정*/
        case "updateLecture" :

            echo "<meta http-equiv='refresh' content='0; url=/view/admin/updateLec.html?lecNo=".$_GET['lecNo']."'>";
            break;

        case "deleteLecture" :

            include_once $_SERVER['DOCUMENT_ROOT'].'/model/deleteLecture.php';

            if(!isset($result)) {
                $results['success'] = false;
                $results['msg'] = '삭제에 실패했습니다.';
                $results['msg'] = iconv("EUC-KR","UTF-8",$results['msg']);
                echo json_encode($results);
                return false;
            }
            if(isset($result)) {
                $results['success'] = true;
                $results['msg'] = '삭제되었습니다.';
                $results['msg'] = iconv("EUC-KR","UTF-8",$results['msg']);
                echo json_encode($results);
                return true;
            } break;





    }