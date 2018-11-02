<?php
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
				<li><a href="#">���̵� ã��</a></li>
				<li class="on"><a href="#">��й�ȣ ã��</a></li>
			</ul>

			<div class="tit-box-h4">
				<h3 class="tit-h4">��й�ȣ �缳��</h3>
			</div>

			<div class="section-content mt30">
				<table border="0" cellpadding="0" cellspacing="0" class="tbl-col-join">
					<caption class="hidden">��й�ȣ �缳��</caption>
					<colgroup>
						<col style="width:17%"/>
						<col style="*"/>
					</colgroup>

					<tbody>
                        <form id="passChange" method="post">
                        <input type="hidden" id="userId" name="userId" value=<?php echo $_POST["userId"];?> />
                            <tr>
                                <th scope="col">�ű� ��й�ȣ �Է�</th>
                                <td><input type="password" class="input-text" id="userPw" name="userPw" style="width:302px" placeholder="8-15���� ������/���� ȥ��" required/><span id="pwd1Result" class="float-right"></span></td>
                            </tr>
                            <tr>
                                <th scope="col">�ű� ��й�ȣ ��Ȯ��</th>
                                <td><input type="password" class="input-text" id="userPw2" name="userPw2" style="width:302px" required/><span id="pwd2Result" class="float-right" ></span></td>
                            </tr>
                        </form>
					</tbody>
				</table>
				<div class="box-btn">
					<a href="#" class="btn-l" id="pwChange">Ȯ��</a>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
var pw2Flag=0;
var pw1Flag=0;
var passwordRules = /^(?=.*[a-zA-Z])(?=.*[0-9]).{8,16}$/;

$("#userPw").keyup(function(){
    if(passwordRules.test($("#userPw").val())){
        $("#pwd1Result").html(" �� ��밡���� ��й�ȣ�Դϴ�").css("color","green");
        pw1Flag=1;
    }else{
        $("#pwd1Result").html(" ��� �Ұ����� ��й�ȣ�Դϴ�. �ٽ� �Է��� �ּ���").css("color","red");
        pw1Flag=0;
    }
});
$("#userPw2").keyup(function(){
    if($("#userPw").val()!=$("#userPw2").val()){
        $("#pwd2Result").html(" ��й�ȣ�� ��ġ���� �ʽ��ϴ�. �ٽ� �Է��� �ּ���").css("color","red");
        pw2Flag=0;
    }else{
        $("#pwd2Result").html(" ��й�ȣ ��ġ"). css("color","green");
        pw2Flag=1;
        $("#mail_1").focus();
    }
});
</script>
<script>
$('#pwChange').on('click', function() {

    alert('��й�ȣ�� ���������� ����Ǿ����ϴ�. �ٽ� �α��� �� �ּ���');

    $('#passChange').attr('action', '/model/passChange.php');
    $('#passChange').submit();
});
</script>
<?php
include '../common//footer.php';
?>