<?php
include './logInCheck.php';
session_start();
/*print_r($_SESSION);*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">
<!--[if (IE 7)]><html class="no-js ie7" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko"><![endif]-->
<!--[if (IE 8)]><html class="no-js ie8" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko"><![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=EUC-KR" />
    <meta http-equiv="X-UA-Compatible" id="X-UA-Compatible" content="IE=EmulateIE8" />
    <title>��Ŀ�� HRD</title>
    <meta name="description" content="��Ŀ�� HRD" />
    <meta name="keywords" content="��Ŀ��, HRD" />

    <!-- �ĺ��ܼ��� -->
    <link rel="shortcut icon" type="image/x-icon" href="http://img.hackershrd.com/common/favicon.ico" />

    <!-- xhtml property�Ӽ� �������̼� ����/Ȯ���ʿ� -->
    <meta property="og:title" content="��Ŀ�� HRD" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://www.hackershrd.com/" />
    <meta property="og:image" content="http://img.hackershrd.com/common/og_logo.png" />

    <link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/common.css" />
    <link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/bxslider.css" />
    <link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/main.css" /><!-- main���������� ȣ�� -->
    <link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/sub.css" /><!-- sub���������� ȣ�� -->
    <link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/login.css" /><!-- login���������� ȣ�� -->

    <script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/plugins/bxslider/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/plugins/bxslider/bxslider.js"></script>
    <script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/ui.js"></script>
    <!--[if lte IE 9]> <script src="/js/common/place_holder.js"></script> <![endif]-->

</head><body>
<!-- skip nav -->
<div id="skip-nav">
    <a href="#content">���� �ٷΰ���</a>
</div>
<!-- //skip nav -->

<div id="wrap">
    <div id="header" class="header">

        <div class="nav-section">
            <div class="inner p-r">
                <h1><a href="/"><img src="http://img.hackershrd.com/common/logo.png" alt="��Ŀ�� HRD LOGO" width="165" height="37"/></a></h1>
                <div class="nav-box">
                    <h2 class="hidden">�ָ޴� ����</h2>

                    <ul class="nav-main-lst">
                        <li class="mnu">
                            <a href="#">�Ϲ�����</a>
                            <ul class="nav-sub-lst">
                                <li><a href="#">����޴�</a></li>
                                <li><a href="#">����޴�</a></li>
                                <li><a href="#">����޴�</a></li>
                                <li><a href="#">����޴�</a></li>

                            </ul>
                        </li>
                        <li class="mnu2">
                            <a href="#">�������</a>
                            <ul class="nav-sub-lst">
                                <li><a href="#">����޴�</a></li>
                                <li><a href="#">����޴�</a></li>
                                <li><a href="#">����޴�</a></li>
                                <li><a href="#">����޴�</a></li>

                            </ul>
                        </li>
                        <li class="mnu3">
                            <a href="#">���뿪��</a>
                            <ul class="nav-sub-lst">
                                <li><a href="#">����޴�</a></li>
                                <li><a href="#">����޴�</a></li>
                                <li><a href="#">����޴�</a></li>
                                <li><a href="#">����޴�</a></li>
                            </ul>
                        </li>
                        <li class="mnu4">
                            <a href="#">���� �� �ڰ���</a>
                            <ul class="nav-sub-lst">
                                <li><a href="#">����޴�</a></li>
                                <li><a href="#">����޴�</a></li>
                                <li><a href="#">����޴�</a></li>
                                <li><a href="#">����޴�</a></li>

                            </ul>
                        </li>
                        <li class="mnu5">
                            <a href="#">�������� �ȳ�</a>
                            <ul class="nav-sub-lst">
                                <li><a href="#">��Ŀ�� HRD �Ұ�</a></li>
                                <li><a href="#">������Ʒ�</a></li>
                                <li><a href="#">�ٷ���ī��</a></li>
                                <li><a href="#">�н��ȳ�</a></li>
                                <li><a href="/view/review/review_list.php">�����ı�</a></li>
                            </ul>
                        </li>
                        <li class="mnu6">
                            <a href="#">�� ���ǽ�</a>
                            <ul class="nav-sub-lst">
                                <li><a href="#">����޴�</a></li>
                                <li><a href="#">����޴�</a></li>
                                <li><a href="#">����޴�</a></li>
                                <li><a href="#">����޴�</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="nav-sub-box">
                <div class="inner"><!-- <a href="#"><img src="/" alt="����̹���" width="171" height="196"></a> --></div>
            </div>

        </div>

        <div class="top-section">
            <div class="inner">
                    <? if(!isset($_SESSION['token'])!=null) { ?>
                         <div class='link-box'><a href="/view/member/login.php" id="logIn">�α���</a>
                             <a href="/view/member/step_01.php">ȸ������</a>
                             <a href="#">���/��������</a>
                         </div>
                    <? } else { ?>
                        <div class='link-box'><a href='/model/logOut.php'id="logIn">�α׾ƿ�</a>
                            <a href="/model/selectMemInfo.php" ' >������</a>
                            <a href="#">���/��������</a>
                            <? if($_SESSION['userId'] == "admin") { ?>
                                <a href="/view/admin/index.php">����Admin</a></div>
                            <? } ?>
                        </div>
                    <? } ?>
            </div>
        </div>
    </div>
<!--    /model/selectMemInfo.php-->
    <!--view/member/modyfy.php-->