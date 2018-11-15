<?php
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
/*header("Content-Type: text/html; charset=KS_C_5601-1987");
header("Cache-Control:no-cache");
header("Pragma:no-cache");*/

    switch ($mode) {

        /*강의 후기 리스트*/
        case "list" :

            echo "<meta http-equiv='refresh' content='0; url=/view/review/reviewList.html'>";
            break;

        case "writeReview" :

            echo "<meta http-equiv='refresh' content='0; url=/view/review/wirteReview.html'>";
            break;

        /*강의 후기 쓰기*/
        case "write" :

            $results = array('success'=> false, 'msg'=>'msg');

            if($lecNo == "") {

                $results['success']=false;
                $results['msg'] = '강의 분류를 선택해주세요';
                $results['msg'] = iconv("EUC-KR","UTF-8",$results['msg']);
                echo json_encode($results);
                return false;

            }
            if($title == "") {

                $results['success']=false;
                $results['msg'] = '제목을 입력해주세요';
                $results['msg'] = iconv("EUC-KR","UTF-8",$results['msg']);
                echo json_encode($results);
                return false;

            }
            if($ir1 == "") {

                $results['success']=false;
                $results['msg'] = '내용을 입력해주세요';
                $results['msg'] = iconv("EUC-KR","UTF-8",$results['msg']);
                echo json_encode($results);
                return false;

            } else {

                include_once $_SERVER['DOCUMENT_ROOT'].'/model/insertReview.php';

                $results['success'] = true;
                $results['msg'] = '글이 등록되었습니다.';
                $results['msg'] = iconv("EUC-KR","UTF-8",$results['msg']);
                echo json_encode($results);
                return true;

            } break;


        /*강의 삭제*/
        case "delete" :

            echo "<meta http-equiv='refresh' content='0; url=/model/deleteReview.php?reviewNo=$reviewNo'>";
            break;

        /*강의 수정*/
        case "update" :

            echo "<meta http-equiv='refresh' content='0; url=/view/review/updateReview.html?reviewNo=$reviewNo'>";
            break;

        /*강의 수정 확인*/
        case "updateFrm" :

            $results = array('success'=> false, 'msg'=>'msg');

            if($lecNo == "") {

                $results['success']=false;
                $results['msg'] = '강의 분류를 선택해주세요';
                $results['msg'] = iconv("EUC-KR","UTF-8",$results['msg']);
                echo json_encode($results);
                return false;

            }
            if($title == "") {

                $results['success']=false;
                $results['msg'] = '제목을 입력해주세요';
                $results['msg'] = iconv("EUC-KR","UTF-8",$results['msg']);
                echo json_encode($results);
                return false;

            }
            if($ir1 == "") {

                $results['success']=false;
                $results['msg'] = '내용을 입력해주세요';
                $results['msg'] = iconv("EUC-KR","UTF-8",$results['msg']);
                echo json_encode($results);
                return false;

            } else {

                include_once $_SERVER['DOCUMENT_ROOT'].'/model/updateReview.php';

                $results['success'] = true;
                $results['msg'] = '글이 수정되었습니다..';
                $results['msg'] = iconv("EUC-KR","UTF-8",$results['msg']);
                echo json_encode($results);
                return true;

            } break;



    }