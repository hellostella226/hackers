<?php
session_start();
include '../common/header.php';
include '../common/review_leftNav.php';
include '../../model/selectLecture.php';


if($_GET['p']) {
    $p = $_GET['p'];
} else {
    $p = 1;
}



if($_GET['cateS'] && $_GET['searchLW'] && $_GET['lacOrUser']) {
    $cate_No = $_GET['cateS'] ;
    $where .= " AND c.cateNo = '".$cate_No."' AND ".$_GET['searchLW']." LIKE '%".$_GET['lacOrUser']."%' ";
}

if($_GET['cateNo'] && !$cate_No) {
    $where .= "AND c.cateNo = '".$_GET['cateNo']."'";
}



$sql= "SELECT r.userName, r.reviewNo, c.cateName, r.title, l.lecName, r.starChk, r.lecCnt
        FROM review r, lecture l, category c
         WHERE l.lecNo = r.lecNo AND l.cateNo = c.cateNo ".$where."
          ORDER BY r.reviewNo DESC";




$result = mysql_query($sql);
$total_cnt = mysql_num_rows($result);

$list_cnt = 5;
$start = ($list_cnt * $p) - $list_cnt;
$page_cnt = ceil($total_cnt/$list_cnt);

$page_num_cnt = 5;
if($page_cnt > $page_num_cnt) {
    $block = (ceil($p / $page_num_cnt) * $page_num_cnt);
    $num_cnt_s = $block - $page_num_cnt + 1;
    if($page_cnt < $block) {
        $num_cnt = $page_cnt;
    } else {
        $num_cnt = $block;
    }

} else {
    $num_cnt = $page_cnt;
    $num_cnt_s = 1;
}


$sql2 = "SELECT r.userName, r.reviewNo, c.cateName, r.title, l.lecName, r.starChk, r.lecCnt
        FROM review r, lecture l, category c
         WHERE l.lecNo = r.lecNo AND l.cateNo = c.cateNo ".$where."
          ORDER BY r.reviewNo DESC limit $start, $list_cnt";

$result2 = mysql_query($sql2);


?>
	<div id="content" class="content">
		<div class="tit-box-h3">
			<h3 class="tit-h3">�����ı�</h3>
			<div class="sub-depth">
				<span><i class="icon-home"><span>Ȩ</span></i></span>
				<span>�������� �ȳ�</span>
				<strong>�����ı�</strong>
			</div>
		</div>

		<ul class="tab-list tab5">
            <form id="searchBox2" method="get">
                <li <? if($_GET['cateNo'] == '') { ?>class="on"<? } ?>><a href="?cateNo=" id="searchT">��ü</a></li>
                <li <? if($_GET['cateNo'] == 1) { ?>class="on"<? } ?>><a href="?cateNo=1" class="searchT" name="1">�Ϲ�����</a></li>
                <li <? if($_GET['cateNo'] == 2) { ?>class="on"<? } ?>><a href="?cateNo=2" class="searchT" name="2">�������</a></li>
                <li <? if($_GET['cateNo'] == 3) { ?>class="on"<? } ?>><a href="?cateNo=3" class="searchT" name="3">���뿪��</a></li>
                <li <? if($_GET['cateNo'] == 4) { ?>class="on"<? } ?>><a href="?cateNo=4" class="searchT" name="4">���� �� �ڰ���</a></li>
            </form>
        </ul>
<!--        <input type="hidden" id="st" name="st" value="">-->


		<div class="search-info">
            <form id="searchBox" method="get">
			<div class="search-form f-r">
				<select class="input-sel" style="width:158px" id="cateS" name="cateS">
                    <? while($cate=mysql_fetch_array($data)) { ?>
                        <option value='<?=$cate['cateNo']?>' <? if($_GET['cateS'] == $cate['cateNo']) { ?>selected<? } ?>><?=$cate['cateName']?></option>
                    <? } ?>
				</select>
				<select class="input-sel" style="width:158px" id="searchLW" name="searchLW">
					<option value="lecName" <? if($_GET['searchLW'] == 'lecName') { ?>selected<? } ?>>���Ǹ�</option>
					<option value="userName" <? if($_GET['searchLW'] == 'userName') { ?>selected<? } ?>>�ۼ���</option>
				</select>
				<input type="text" class="input-text" placeholder="�˻����� �Է��ϼ���." style="width:158px" id="lacOrUser" name="lacOrUser"/>
				<button type="button" class="btn-s-dark" onclick="searchBtn();">�˻�</button>
			</div>
            </form>
		</div>

		<?php

        include_once '../common/listTable.php';

        $addParam = '&cateNo='.$_GET[cateNo].'&cateS='.$_GET[cateS].'&searchLW='.$_GET[searchLW].'&lacOrUser='.$_GET[lacOrUser];
        ?>

        <div class="box-paging">
            <a href="?p=1<?=$addParam?>"><i class="icon-first"><span class="hidden">ù������</span></i></a>
            <a href="?p=<?if(($num_cnt+1) <= $page_cnt) {?><?=$num_cnt-1 ?><? } ?><?=$addParam?>"><i class="icon-prev"><span class="hidden">����������</span></i></a>
            <? for($i=$num_cnt_s;$i<=$num_cnt;$i++) { ?>
            <a href="?p=<?=$i.$addParam?>" <?if($p==$i) { ?>class="active"<? } ?>><?=$i?></a>
            <? } ?>
            <a href="?p=<?if(($num_cnt+1) <= $page_cnt) {?><?=$num_cnt+1 ?><? } ?><?=$addParam?>"><i class="icon-next"><span class="hidden">����������</span></i></a>
            <a href="?p=<?=$page_cnt.$addParam?>"><i class="icon-last"><span class="hidden">������������</span></i></a>
        </div>



		<div class="box-btn t-r">
			<a href="#" class="btn-m" id="writeFrm">�ı� �ۼ�</a>
		</div>
	</div>
</div>
<script>
    $('#writeFrm').on('click', function() {
        <?php
        if(isset($_SESSION['token'])!=null) {
            echo "location.href='./wirteReview.php';";
        }
        else {
            echo "alert('ȸ���� ����� �����ؿ�. �α��� �� �ּ���.');";
        } ?>
    })
</script>
    <script>

        //�з� + ���Ǹ� or �ۼ��� �˻�
        function searchBtn() {

            $('#searchBox').submit();

        }

    </script>

    <script>

        $('.searchT').on('click', function() {

            $('#searchBox2').submit();

        })
    </script>
<?php
include '../common/footer.php';
?>