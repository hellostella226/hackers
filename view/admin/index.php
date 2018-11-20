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
			<h3 class="tit-h3">���� ����</h3>
			<div class="sub-depth">
				<span><i class="icon-home"><span>Ȩ</span></i></span>
				<span>���� Admin</span>
				<strong>���� ����</strong>
			</div>
		</div>

		<ul class="tab-list tab5">
            <li class="on"><a href="/view/admin/index.php">��ü</a></li>
            <li><a href="/controller/adminController.php?mode=selectCategory&cateNo=1">�Ϲ�����</a></li>
            <li><a href="/controller/adminController.php?mode=selectCategory&cateNo=2">�������</a></li>
            <li><a href="/controller/adminController.php?mode=selectCategory&cateNo=3">���뿪��</a></li>
            <li><a href="/controller/adminController.php?mode=selectCategory&cateNo=4">���� �� �ڰ���</a></li>
        </ul>
<script>
    $.post('/controller/adminController.php?',$('#selectCategory').serialize(), function(data){

        event.preventDefault();

        alert('hi');

    },"json")

</script>
		<table border="0" cellpadding="0" cellspacing="0" class="tbl-bbs">
			<caption class="hidden">�����ı�</caption>
			<colgroup>
				<col style="width:8%"/>
				<col style="width:8%"/>
				<col style="*"/>
				<col style="width:15%"/>
				<col style="width:12%"/>
			</colgroup>

            <table border="0" cellpadding="0" cellspacing="0" class="tbl-lecture-list">
                <caption class="hidden">��������</caption>
                <colgroup>
                    <col style="width:166px"/>
                    <col style="*"/>
                    <col style="width:110px"/>
                </colgroup>
                <form id="deleteLecture" method="post">
                <tbody id="test1">
                <? while($row = mysql_fetch_array($result)) { ?>
                    <tr>
                        <td>
                            <a href="#" class="sample-lecture">
                                <img src="<?=$row['thumbnail']?>" alt="" width="144" height="101" />
                                <span class="tc-brand">���ð��� ��</span>
                            </a>
                        </td>
                        <td class="lecture-txt">
                            <em class="tit mt10"><?=$row['lecName']?></em>
                            <p class="tc-gray mt20">����: <?=$row['teacher']?> | �н����̵� : <?=$row['lecLevel']?> | �����ð�: <?=$row['lecTime']?>�ð� (<?=$row['lecNum']?>��)</p>
                        </td>
                        <td class="t-r"><a href="/controller/adminController.php?mode=updateLecture&lecNo=<?=$row['lecNo']?>" class="btn-square-line";>����<br />����</a></td>
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