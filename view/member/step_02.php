<?php
session_start();
$_SESSION['num'] = '123456';
?>
<?php
    include '../common//header.php';
?>

		<div class="top-section">
			<div class="inner">
				<div class="link-box">
					<!-- �α����� -->
					<a href="#">�α���</a>
					<a href="#">ȸ������</a>
					<a href="#">���/��������</a>
					<!-- �α����� -->
					<!-- <a href="#">�α׾ƿ�</a>
					<a href="#">������</a>
					<a href="#">���/��������</a> -->
				</div>
			</div>
		</div>
	</div>
<div id="container" class="container-full">
	<div id="content" class="content">
		<div class="inner">
			<div class="tit-box-h3">
				<h3 class="tit-h3">ȸ������</h3>
				<div class="sub-depth">
					<span><i class="icon-home"><span>Ȩ</span></i></span>
					<strong>ȸ������ �Ϸ�</strong>
				</div>
			</div>

			<div class="join-step-bar">
				<ul>
					<li><i class="icon-join-agree"></i> �������</li>
					<li class="on"><i class="icon-join-chk"></i> ����Ȯ��</li>
					<li class="last"><i class="icon-join-inp"></i> �����Է�</li>
				</ul>
			</div>

			<div class="tit-box-h4">
				<h3 class="tit-h4">��������</h3>
			</div>

			<div class="section-content after">
				<div class="identify-box" style="width:100%;height:190px;">
					<div class="identify-inner">
						<strong>�޴��� ����</strong>
						<p>�ֹι�ȣ ���� �޽��� ���Ű����� �޴������� 1�� ���̵� ȸ�������� �����մϴ�. </p>

						<br />

                        <form id="pNumber" method="POST">
						<input type="text" maxlength = "3" class="input-text" style="width:50px" id="p1" name="p1"/> -
						<input type="text" maxlength = "4" class="input-text" style="width:50px" id="p2" name="p2"/> -
						<input type="text" maxlength = "4" class="input-text" style="width:50px" id="p3" name="p3"/>
						<a href="#" class="btn-s-line" id="pChk">������ȣ �ޱ�</a>
                        </form>

						<br /><br />
						<input type="text" class="input-text" style="width:200px" id="pChk_Cp"/>
						<a href="#" class="btn-s-line" id="pChkVal">������ȣ Ȯ��</a>
					</div>
					<i class="graphic-phon"><span>�޴��� ����</span></i>
				</div>
			</div>

		</div>
	</div>
</div>


<script>
    $("#pChk").click(function(event) {
    var a = $("input:text[name='p1']").val();
    var b = $("input:text[name='p2']").val();
    var c = $("input:text[name='p3']").val();
    var pEnroll = a+"-"+b+"-"+c;
    /*alert(pEnroll);*/

var phoneNumberRegex = /^[0-9]{3}-[0-9]{4}-[0-9]{4}$/;
if(!phoneNumberRegex.test(pEnroll)) {
    alert("��ȿ���� ���� �����Դϴ�. �ٽ� �ۼ��� �ּ���.");
    return false;
} else {
    alert("������ȣ�� <?=$_SESSION['num']?> �Դϴ�.");
    return true;
}
});
</script>
<script>
$("#pChkVal").on("click", function(){
    if($("input:text[id='pChk_Cp']").val() === '<?=$_SESSION['num']?>'){
        alert("�����Ǿ����ϴ�.");
       /* step_03.php�� phon number value ������ �̵�*/
       $("#pNumber").attr("action","../member/step_03.php");
       $("#pNumber").submit();
    }else{
        alert("������ȣ�� ��ġ���� �ʽ��ϴ�. �ٽ� �õ��� �ּ���.");
    }
});
</script>

<?php
include '../common/footer.php';
?>