<?php
include '../common//header.php';
?>

<div id="container" class="container-full">
	<div id="content" class="content">
		<div class="inner">
			<div class="tit-box-h3">
				<h3 class="tit-h3">아이디/비밀번호 찾기</h3>
				<div class="sub-depth">
					<span><i class="icon-home"><span>홈</span></i></span>
					<strong>아이디/비밀번호 찾기</strong>
				</div>
			</div>

			<ul class="tab-list">
				<li><a href="#">아이디 찾기</a></li>
				<li class="on"><a href="#">비밀번호 찾기</a></li>
			</ul>

			<div class="tit-box-h4">
				<h3 class="tit-h4">비밀번호 재설정</h3>
			</div>

			<div class="section-content mt30">
				<table border="0" cellpadding="0" cellspacing="0" class="tbl-col-join">
					<caption class="hidden">비밀번호 재설정</caption>
					<colgroup>
						<col style="width:17%"/>
						<col style="*"/>
					</colgroup>

					<tbody>
                        <form id="passChange" method="post">
                        <input type="hidden" id="userId" name="userId" value=<?php echo $_POST["userId"];?> />
                            <tr>
                                <th scope="col">신규 비밀번호 입력</th>
                                <td><input type="password" class="input-text" id="userPw" name="userPw" style="width:302px" placeholder="8-15자의 영문자/숫자 혼합" required/><span id="pwd1Result" class="float-right"></span></td>
                            </tr>
                            <tr>
                                <th scope="col">신규 비밀번호 재확인</th>
                                <td><input type="password" class="input-text" id="userPw2" name="userPw2" style="width:302px" required/><span id="pwd2Result" class="float-right" ></span></td>
                            </tr>
                        </form>
					</tbody>
				</table>
				<div class="box-btn">
					<a href="#" class="btn-l" id="pwChange">확인</a>
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
        $("#pwd1Result").html(" 는 사용가능한 비밀번호입니다").css("color","green");
        pw1Flag=1;
    }else{
        $("#pwd1Result").html(" 사용 불가능한 비밀번호입니다. 다시 입력해 주세요").css("color","red");
        pw1Flag=0;
    }
});
$("#userPw2").keyup(function(){
    if($("#userPw").val()!=$("#userPw2").val()){
        $("#pwd2Result").html(" 비밀번호가 일치하지 않습니다. 다시 입력해 주세요").css("color","red");
        pw2Flag=0;
    }else{
        $("#pwd2Result").html(" 비밀번호 일치"). css("color","green");
        pw2Flag=1;
        $("#mail_1").focus();
    }
});
</script>
<script>
$('#pwChange').on('click', function() {

    alert('비밀번호가 성공적으로 변경되었습니다. 다시 로그인 해 주세요');

    $('#passChange').attr('action', '/model/passChange.php');
    $('#passChange').submit();
});
</script>
<?php
include '../common//footer.php';
?>