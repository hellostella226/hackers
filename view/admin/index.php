<?php

    include $_SERVER['DOCUMENT_ROOT'].'/view/common/header.html';
    include $_SERVER['DOCUMENT_ROOT'].'/view/common/adminLeftNav.html';
    include $_SERVER['DOCUMENT_ROOT'].'/model/selectLectureList.php';

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

    if($fileName) include_once $_SERVER['DOCUMENT_ROOT'].$fileName ;

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
            <form id="searchBox" method="get">
                <li <? if($_GET['cateNo'] == '') { ?>class="on"<? } ?>><a href="?cateNo=" id="searchT">��ü</a></li>
                <li <? if($_GET['cateNo'] == 1) { ?>class="on"<? } ?>><a href="?cateNo=1" class="searchT" name="1">�Ϲ�����</a></li>
                <li <? if($_GET['cateNo'] == 2) { ?>class="on"<? } ?>><a href="?cateNo=2" class="searchT" name="2">�������</a></li>
                <li <? if($_GET['cateNo'] == 3) { ?>class="on"<? } ?>><a href="?cateNo=3" class="searchT" name="3">���뿪��</a></li>
                <li <? if($_GET['cateNo'] == 4) { ?>class="on"<? } ?>><a href="?cateNo=4" class="searchT" name="4">���� �� �ڰ���</a></li>
            </form>
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
<p>�����ð� ǥ�� �׽�Ʈ</p>
<div id="server_time"><?php echo date("Y-m-d H:i:s", time()); ?></div>
<script>
     var srv_time = "<?php print date("F d, Y H:i:s", time()); ?>";
     var now = new Date(srv_time);

     setInterval("server_time()", 1000);

     function server_time() {
         now.setSeconds(now.getSeconds()+1);

         var year = now.getFullYear();
         var month = now.getMonth() +1;
         var date = now.getDate();
         var hours = now.getHours();
         var minutes = now.getMinutes();
         var seconds = now.getSeconds(0;

         if(month < 10) {
             month = "0" + month;
         }
         if(date < 10) {
             date = "0" + date;
         }
         if(hours < 10) {
             hours = "0" + hours;
         }
         if(minutes < 10) {
             minutes = "0" +minutes;
         }
         if(seconds < 10) {
             seconds = "0" + seconds;
         }

         document.getElementById("server_time").innerHTML = year + "-" + month +
                 "-" + date + "-" + hours + ":" + minutes + ":" + seconds;
     }
</script>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/view/common/footer.html';
?>