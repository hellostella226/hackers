<?php
session_start();
include '../model/logInCheck.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">
    <!--[if (IE 7)]><html class="no-js ie7" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko"><![endif]-->
    <!--[if (IE 8)]><html class="no-js ie8" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko"><![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
    <div class="login-section">
        <div class="bg"></div>
        <div class="login-inner">
            <h1><a href="/"><img src="http://img.hackershrd.com/common/logo.png" alt="��Ŀ�� HRD LOGO" width="142" height="31"/></a></h1>
            <div class="box-login">

                <div class="login-input">
                    <form id="signIn" method="post">
                        <div class="input-text-box">
                            <input type="text" class="input-text mb5" id="userId" name="userId" placeholder="���̵�" style="width:190px"/>
                            <input type="password" class="input-text" id="userPw" name="userPw" placeholder="��й�ȣ" style="width:190px"/>
                        </div>
                        <button type="submit" class="btn-login">�α���</button>
                    </form>
                </div>

                <div class="login-chk">
                    <label class="input-sp">
                        <input type="checkbox"/>
                        <span class="input-txt">���̵� ����</span>
                    </label>
                    <label class="input-privacy on">�������� ON <input type="checkbox" title="IP ������ ���� �ֽ��ϴ�. IP������ ������� �����÷��� ������ �������ּ���." /></label>
                    <!-- <label class="input-privacy">�������� OFF <input type="checkbox" title="������ ���� �ֽ��ϴ�. ������ ����Ϸ��� �������ּ���." /></label> -->
                </div>

                <div class="box-btn">
                    <a href="./step_01.php" class="btn-m-gray">ȸ������</a>
                    <a href="./find_id.php" class="btn-m-gray">ID/PW ã��</a>
                </div>
            </div>
            <div class="login-guide">
                <strong><i class="icon-guide"></i>�α��ο� ������ �����Ű���?</strong>
                <ol>
                    <li>�� ���ͳ� â ��� [����] - [���ͳ� �ɼ�] - [����] - [����� ���� ����] - [����] ���� �������ּ���.</li>
                    <li>�� ���ͳ� â�� ���� �ٽ� ���ּ���. �׷��� �α��ο� ������ �����ôٸ� <a href="#"><strong class="tc-brand">[��������]</strong></a>�� ���� �������ּ���.</li>
                </ol>
            </div>

            <div class="link-box">
                <a href="#">ȯ�ް����ȳ�</a>
                <a href="#">�����������</a>
                <a href="#">���/��������</a>
            </div>

            <div class="login-banner">
                <div class="bxslider-default" data-mode="fade" data-auto="true" data-controls="true" data-pager="true" style="height:182px">
                    <ul class="bxslider">
                        <li><img src="http://www.champstudy.com/files/banner/imglib_files/banner/imglib/300freepass_620x400.jpg" alt="" width="262" height="182"/></li>
                        <li><img src="http://www.champstudy.com/files/banner/imglib_files/banner/imglib/champstudy_first_toeic_class_620x400.jpg" alt="" width="262" height="182"/></li>
                        <li><img src="http://www.champstudy.com/files/banner/imglib_files/banner/imglib/teps0freepass_620x400.jpg" alt="" width="262" height="182"/></li>
                        <li><img src="http://www.champstudy.com/files/banner/imglib_files/banner/imglib/2nd_foreign_620x400.jpg" alt="" width="262" height="182"/></li>
                    </ul>
                </div>
            </div>
        </div>
        <span class="login-close"><button type="button" class="icon-layer-close"><span class="hidden">�ݱ�</span></button></span>
    </div>
    </body>
    </html>

    <script>
        $('.btn-login').on('click',function() {
            /*alert($('#userId').val()+$('#userPw').val());*/
            $('#signIn').attr('action','/model/logInCheck.php');
            $('#signIn').submit();

        });
    </script>