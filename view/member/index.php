<?php

if(empty($_GET[mode])) {

    echo"<script>alert('잘못된 접근입니다.'); location.href='/'; </script>";
    exit;

}

switch ($_GET[mode]) {

    case 'step_01' :
        $fileName = "/view/member/step_01.html";
        break;

    case 'step_02' :
        $fileName = "/view/member/step_02.html";
        break;

    case 'step_03' :
        $fileName = "/view/member/step_03.html";
        break;

    case 'regist' :
        $fileName = "/model/regist.php";
        break;

    case 'complete' :
        $fileName = "/view/member/complete.html";
        break;

    case 'logIn' :
        $fileName = "/view/member/logIn.html";
        break;

    case 'find_id' :
        $fileName = "/view/member/findId.html";
        break;

    case 'find_pass' :
        $fileName = "/view/member/findPassword.html";
        break;

    case 'modify' :
        $fileName = "/view/member/modify.html";
        break;

}


if($fileName) include_once $_SERVER['DOCUMENT_ROOT'].$fileName ;

