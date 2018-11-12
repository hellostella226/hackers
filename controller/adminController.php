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

                include_once $_SERVER['DOCUMENT_ROOT'].'/model/insertLecture.php';
                $result['success'] = true;
                $result['msg'] = '글이 등록되었습니다.';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return true;
            } break;

        case "updateLecture" :

            echo "<meta http-equiv='refresh' content='0; url=/view/admin/updateLec.php?lecNo=".$_GET['lecNo']."'>";


    }