<?php
session_start();
include '../common//header.php';
?>
<div id="container" class="container-full">
	<div id="content" class="content">
		<div class="inner">
			<div class="tit-box-h3">
				<h3 class="tit-h3">���̵�/��й�ȣ ã��</h3>
				<div class="sub-depth">
					<span><i class="icon-home"><span>Ȩ</span></i></span>
					<strong>���̵�/��й�ȣ ã��</strong>
				</div>
			</div>

			<ul class="tab-list">
				<li class="on"><a href="#">���̵� ã��</a></li>
				<li><a href="#">��й�ȣ ã��</a></li>
			</ul>

			<div class="tit-box-h4">
				<h3 class="tit-h4">���̵� ��ȸ���</h3>
			</div>

			<div class="guide-box">
				<p class="fs16 mb5">ȸ������ ���̵�� �Ʒ��� �����ϴ�.</p>
				<strong class="big-title tc-brand"><?php echo $_POST["userId"];?></strong>
			</div>

			<div class="box-btn mt30">
				<a href="./login.php" class="btn-l">�α����Ϸ� ����</a>
				<a href="./find_pass.php" class="btn-l-line ml5">��й�ȣ ã��</a>
			</div>

		</div>
	</div>
</div>

<?php
include '../common//footer.php';
?>