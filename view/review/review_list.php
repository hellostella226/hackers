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
    $where = " AND c.cateNo = '".$_GET['cateS']."' AND ".$_GET['searchLW']." LIKE '%".$_GET['lacOrUser']."%' ";
}

if($_GET['c.cateNo']) {
    $where2 = "AND c.cateNo = '".$_GET['c.cateNo']."' ";
}

$sql= "SELECT r.userName, r.reviewNo, c.cateName, r.title, l.lecName, r.starChk
        FROM review r, lecture l, category c
         WHERE l.lecNo = r.lecNo AND l.cateNo = c.cateNo ".$where." ".$where2."
          ORDER BY r.reviewNo DESC";


echo $sql;


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


$sql2 = "SELECT r.userName, r.reviewNo, c.cateName, r.title, l.lecName, r.starChk
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
                <li class="on"><a href="#" id="searchT">��ü</a></li>
                <li><a href="?c.cateNo=1" class="searchT" name="1">�Ϲ�����</a></li>
                <li><a href="?c.cateNo=2" class="searchT" name="2">�������</a></li>
                <li><a href="?c.cateNo=3" class="searchT" name="3">���뿪��</a></li>
                <li><a href="?c.cateNo=4" class="searchT" name="4">���� �� �ڰ���</a></li>
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

		<table border="0" cellpadding="0" cellspacing="0" class="tbl-bbs">
			<caption class="hidden">�����ı�</caption>
			<colgroup>
				<col style="width:8%"/>
				<col style="width:8%"/>
				<col style="*"/>
				<col style="width:15%"/>
				<col style="width:12%"/>
			</colgroup>

			<thead>
				<tr>
					<th scope="col">��ȣ</th>
					<th scope="col">�з�</th>
					<th scope="col">����</th>
					<th scope="col">���¸�����</th>
					<th scope="col">�ۼ���</th>
				</tr>
			</thead>

			<tbody id="reviewList">
                <? while($row = mysql_fetch_array($result2)) { ?>
                <tr class='bbs-sbj'>
                    <td><?=$row['reviewNo']?></td>
                    <td><?=$row['cateName']?></td>
                    <td>
                        <a href="./reviewDetail.php?reviewNo=<?=$row['reviewNo']?>">
                            <span class="tc-gray ellipsis_line"><?=$row['lecName']?></span>
                            <strong class="ellipsis_line"><?=$row['title']?></strong>
                        </a>
                    </td>
                    <td>
                            <span class="star-rating">
                               <span class="star-inner" style="width:<?=$row['starChk']?>%"></span>
                            </span>
                    </td>
                    <td class="last"><?=$row['userName']?></td>
                </tr>
                <? } ?>
            </tbody>

		</table>

        <div class="box-paging">
            <a href="?p=1"><i class="icon-first"><span class="hidden">ù������</span></i></a>
            <a href="#"><i class="icon-prev"><span class="hidden">����������</span></i></a>
            <? for($i=$num_cnt_s;$i<=$num_cnt;$i++) { ?>
            <a href="?p=<?=$i?>" <?if($p==$i) { ?>class="active"<? } ?>><?=$i?></a>
            <? } ?>
            <a href="?p=<?if(($num_cnt+1) <= $page_cnt) {?><?=$num_cnt+1 ?><? } ?>"><i class="icon-next"><span class="hidden">����������</span></i></a>
            <a href="?p=<?=$page_cnt?>"><i class="icon-last"><span class="hidden">������������</span></i></a>
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