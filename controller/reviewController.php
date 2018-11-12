<?php
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
header("Content-Type: text/html; charset=KS_C_5601-1987");
header("Cache-Control:no-cache");
header("Pragma:no-cache");

    switch ($mode) {

        case "list" :

            echo "<meta http-equiv='refresh' content='0; url=/view/review/reviewList.html'>";
            break;


        case "write" :

            $result = array('success'=> false, 'msg'=>'msg');

            if($lecNo == "") {

                $result['success']=false;
                $result['msg'] = '강의 분류를 선택해주세요';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if($title == "") {

                $result['success']=false;
                $result['msg'] = '제목을 입력해주세요';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            }
            if($ir1 == "") {

                $result['success']=false;
                $result['msg'] = '내용을 입력해주세요';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return false;

            } else {

                include_once $_SERVER['DOCUMENT_ROOT'].'/model/insertReview.php';

                $result['success'] = true;
                $result['msg'] = '글이 등록되었습니다.';
                $result['msg'] = iconv("EUC-KR","UTF-8",$result['msg']);
                echo json_encode($result);
                return true;
            } break;


        case "delete" :

            print_r($reviewNo);
            echo "<meta http-equiv='refresh' content='0; url=/model/deleteReview.php?reviewNo=$reviewNo'>";
            break;

    }