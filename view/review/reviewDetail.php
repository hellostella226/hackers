<?php
session_start();
include '../common/header.php';
include '../common/review_leftNav.php';
include_once '../../model/selectDetails.php';
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

		<table border="0" cellpadding="0" cellspacing="0" class="tbl-bbs-view">
			<caption class="hidden">�����ı�</caption>
			<colgroup>
				<col style="*"/>
				<col style="width:20%"/>
			</colgroup>
			<tbody>
				 <tr>
					<th scope="col">���� : <?=$row['title']?></th>
					<th scope="col" class="user-id">�ۼ��� | <?=$row['userName']?></th>
				 </tr>
				<tr>
					<td colspan="2">
						<div class="box-rating">
							<span class="tit_rating">���Ǹ�����</span>
							<span class="star-rating">
								<span class="star-inner" style="width:<?=$row['starChk']?>%"></span>
							</span>
						</div>
                        <?=$row['content']?>
					</td>
				</tr>
			</tbody>
		</table>
		
		
		<p class="mb15"><strong class="tc-brand fs16"><?=$row['userId']?>���� �����Ͻ� ���� ����</strong></p>
		
		<table border="0" cellpadding="0" cellspacing="0" class="tbl-lecture-list">
			<caption class="hidden">��������</caption>
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
							<span class="tc-brand">���ð��� ��</span>
						</a>
					</td>
					<td class="lecture-txt">
						<em class="tit mt10"><?=$row['lecName']?></em>
						<p class="tc-gray mt20">����: <?=$row['teacher']?> | �н����̵� : <?=$row['lecLevel']?> | �����ð�: <?=$row['lecTime']?>�ð� (<?=$row['lecNum']?>��)</p>
					</td>
					<td class="t-r"><a href="./detailLec.php?lecNo=<?=$row['lecNo']?>" class="btn-square-line">����<br />��</a></td>
				</tr>
			</tbody>
		</table>

		<div class="box-btn t-r">
			<a href="./review_list.php" class="btn-m-gray">���</a>
			<a href="#" class="btn-m ml5" onclick="userFrm();">����</a>
			<a href="#" class="btn-m-dark" onclick="deleteFrm();">����</a>
		</div>

</div>

<script>

    //����Ȯ��
   function userFrm() {

        <?php

       if(($_SESSION['userId'])!= $row['userId']) {

            echo "alert('���θ� ������ �����ؿ�.');";

       }else {?>

            location.href='./updateReview.php?reviewNo=<?=$row['reviewNo']?>';

       <?} ?>

   }

   //����Ȯ��
    function deleteFrm() {

        <?php

        if(($_SESSION['userId'])!= $row['userId']) {

            echo "alert('���θ� ������ �����ؿ�.');";

        }else {?>

            location.href='/model/deleteReview.php?reviewNo=<?=$row['reviewNo']?>';

        <?} ?>

    }

</script>