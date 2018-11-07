<?php
session_start();
include '../common/header.php';
include '../common/admin_leftNav.php';
include '../../model/selectLectureList.php';
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
            <li class="on"><a href="/" id="searchT" name="c.cateNo">��ü</a></li>
			<li><a href="?searchType=1" id="searchT" name="1">�Ϲ�����</a></li>
			<li><a href="?searchType=2" id="searchT" name="2">�������</a></li>
			<li><a href="?searchType=3" id="searchT" name="3">���뿪��</a></li>
			<li><a href="?searchType=4" id="searchT" name="4">���� �� �ڰ���</a></li>
		</ul>

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
                <tbody>
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
                        <td class="t-r"><a href="/view/admin/updateLec.php?lecNo=<?=$row['lecNo']?>" class="btn-square-line";>����<br />����</a></td>
                    </tr>
                <? } ?>
                </tbody>
                </form>
            </table>
	</div>
</div>

<?php
include '../common/footer.php';
?>