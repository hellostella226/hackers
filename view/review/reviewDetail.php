<?php
include '../common/header.html';
include $_SERVER['DOCUMENT_ROOT'].'/common/reviewLeftNav.html';
include_once '../../model/selectDetails.php';


if($_GET['p']) {
    $p = $_GET['p'];
} else {
    $p = 1;
}

if($_GET['cateS'] && $_GET['searchLW'] && $_GET['lacOrUser']) {
    $where .= " AND c.cateNo = '".$_GET['cateS']."' AND ".$_GET['searchLW']." LIKE '%".$_GET['lacOrUser']."%' ";
}

if($_GET['cateNo']) {
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
			<h3 class="tit-h3">수강후기</h3>
			<div class="sub-depth">
				<span><i class="icon-home"><span>홈</span></i></span>
				<span>직무교육 안내</span>
				<strong>수강후기</strong>
			</div>
		</div>

		<table border="0" cellpadding="0" cellspacing="0" class="tbl-bbs-view">
			<caption class="hidden">수강후기</caption>
			<colgroup>
				<col style="*"/>
				<col style="width:20%"/>
			</colgroup>
			<tbody>
				 <tr>
					<th scope="col">제목 : <?=$row['title']?></th>
					<th scope="col" class="user-id">작성자 | <?=$row['userName']?> <span id="count"></span></th>
				 </tr>
				<tr>
					<td colspan="2">
						<div class="box-rating">
							<span class="tit_rating">강의만족도</span>
							<span class="star-rating">
								<span class="star-inner" style="width:<?=$row['starChk']?>%"></span>
							</span>
						</div>
                        <?=$row['content']?>
					</td>
				</tr>
			</tbody>
		</table>
		
		
		<p class="mb15"><strong class="tc-brand fs16"><?=$row['userId']?>님의 수강하신 강의 정보</strong></p>
        <input type="hidden" id="countNo" value="<?=$row['reviewNo']?>">
		<input type="hidden" id="userId" value="<?=$row['userId']?>">
        <input type="hidden" id="sessionUser" value="<?=$_SESSION['userId']?>">
		<table border="0" cellpadding="0" cellspacing="0" class="tbl-lecture-list">
			<caption class="hidden">강의정보</caption>
			<colgroup>
				<col style="width:166px"/>
				<col style="*"/>
				<col style="width:110px"/>
			</colgroup>
			<tbody>
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
					<td class="t-r"><a href="./detailLec.php?lecNo=<?=$row['lecNo']?>" class="btn-square-line">강의<br />상세</a></td>
				</tr>
			</tbody>
		</table>

		<div class="box-btn t-r">
			<a href="/controller/reviewController.php?mode=list" class="btn-m-gray">목록</a>
			<a href="#" class="btn-m ml5" onclick="userFrm();">수정</a>
			<a href="#" class="btn-m-dark" onclick="deleteFrm();">삭제</a>
		</div>
        <br>

        <?php

        include_once '../common/listTable.php';

        ?>

</div>


<script>

    //본인확인
   function userFrm() {

       if($('#sessionUser').val() != $('#userId').val()) {

           alert("본인만 수정이 가능해요");
           return false;

       } else {

           location.href='/controller/reviewController.php?mode=update&&reviewNo='+$("input:hidden[name=reviewNo]").val();

       }


   }

   //본인확인
    function deleteFrm() {

        if($('#sessionUser').val() != $('#userId').val()) {

            alert("본인만 삭제가 가능해요");
            return false;

        } else {

            location.href='/controller/reviewController.php?mode=delete&&reviewNo='+$("input:hidden[name=reviewNo]").val();

        }

    }

</script>
<script>

    $('document').ready(function() {

        var rNo = $("input:hidden[name=countNo]").val();

      $.ajax({

          url:'/model/insertCnt.php',
          method: "GET",
          data: {rNo: rNo},
          success: function(data) {

              $('#count').empty().append(" 조회수 | "+data);

          }
      })

    })
</script>
<?php
include '../common/footer.html';
?>