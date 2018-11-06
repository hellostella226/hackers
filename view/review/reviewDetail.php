<?php
session_start();
include '../common/header.php';
include '../common/review_leftNav.php';
include_once '../../model/selectDetails.php';
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
					<th scope="col" class="user-id">작성자 | <?=$row['userName']?></th>
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
			<a href="./review_list.php" class="btn-m-gray">목록</a>
			<a href="#" class="btn-m ml5" onclick="userFrm();">수정</a>
			<a href="#" class="btn-m-dark" onclick="deleteFrm();">삭제</a>
		</div>

</div>

<script>

    //본인확인
   function userFrm() {

        <?php

       if(($_SESSION['userId'])!= $row['userId']) {

            echo "alert('본인만 수정이 가능해요.');";

       }else {?>

            location.href='./updateReview.php?reviewNo=<?=$row['reviewNo']?>';

       <?} ?>

   }

   //본인확인
    function deleteFrm() {

        <?php

        if(($_SESSION['userId'])!= $row['userId']) {

            echo "alert('본인만 삭제가 가능해요.');";

        }else {?>

            location.href='/model/deleteReview.php?reviewNo=<?=$row['reviewNo']?>';

        <?} ?>

    }

</script>