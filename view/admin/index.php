<?php

    include $_SERVER['DOCUMENT_ROOT'].'/view/common/header.html';
    include $_SERVER['DOCUMENT_ROOT'].'/view/common/adminLeftNav.html';
    include $_SERVER['DOCUMENT_ROOT'].'/model/selectLectureList.php';

    if($fileName) include_once $_SERVER['DOCUMENT_ROOT'].$fileName ;

    switch ($_GET[mode]) {

        case 'list' :
            $fileName = "/view/admin/list.php";
            break;

        case 'write' :
            $fileName = "/view/admin/writeLec.html";
            break;

        case 'update' :
            $fileName = "/view/admin/updateLec.html";
            break;

    }

    ?>


	<div id="content" class="content">
		<div class="tit-box-h3">
			<h3 class="tit-h3">강의 관리</h3>
			<div class="sub-depth">
				<span><i class="icon-home"><span>홈</span></i></span>
				<span>강의 Admin</span>
				<strong>강의 관리</strong>
			</div>
		</div>

		<ul class="tab-list tab5">
            <li class="on"><a href="/view/admin/index.php" id="searchT" name="c.cateNo">전체</a></li>
			<form id="selectCategory">
                <li><a href="?searchType=1" id="searchT" name="1">일반직무</a></li>
                <li><a href="?searchType=2" id="searchT" name="2">산업직무</a></li>
                <li><a href="?searchType=3" id="searchT" name="3">공통역량</a></li>
                <li><a href="?searchType=4" id="searchT" name="4">어학 및 자격증</a></li>
            </form>
        </ul>

		<table border="0" cellpadding="0" cellspacing="0" class="tbl-bbs">
			<caption class="hidden">수강후기</caption>
			<colgroup>
				<col style="width:8%"/>
				<col style="width:8%"/>
				<col style="*"/>
				<col style="width:15%"/>
				<col style="width:12%"/>
			</colgroup>

            <table border="0" cellpadding="0" cellspacing="0" class="tbl-lecture-list">
                <caption class="hidden">강의정보</caption>
                <colgroup>
                    <col style="width:166px"/>
                    <col style="*"/>
                    <col style="width:110px"/>
                </colgroup>
                <form id="deleteLecture" method="post">
                <tbody>
                <? while($row = mysql_fetch_array($result)) { ?>
                    <tr>
                        <td>
                            <a href="#" class="sample-lecture">
                                <img src="<?=$row['thumbnail']?>" alt="" width="144" height="101" />
                                <span class="tc-brand">샘플강의 ▶</span>
                            </a>
                        </td>
                        <td class="lecture-txt">
                            <em class="tit mt10"><?=$row['lecName']?></em>
                            <p class="tc-gray mt20">강사: <?=$row['teacher']?> | 학습난이도 : <?=$row['lecLevel']?> | 교육시간: <?=$row['lecTime']?>시간 (<?=$row['lecNum']?>강)</p>
                        </td>
                        <td class="t-r"><a href="/controller/adminController.php?mode=updateLecture&lecNo=<?=$row['lecNo']?>" class="btn-square-line";>강의<br />수정</a></td>
                    </tr>
                <? } ?>
                </tbody>
                </form>
            </table>
	</div>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/view/common/footer.html';
?>