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
					<!-- 로그인전 -->
					<a href="#">로그인</a>
					<a href="#">회원가입</a>
					<a href="#">상담/고객센터</a>
					<!-- 로그인후 -->
					<!-- <a href="#">로그아웃</a>
					<a href="#">내정보</a>
					<a href="#">상담/고객센터</a> -->
				</div>
			</div>
		</div>
	</div>
<div id="container" class="container-full">
	<div id="content" class="content">
		<div class="inner">
			<div class="tit-box-h3">
				<h3 class="tit-h3">회원가입</h3>
				<div class="sub-depth">
					<span><i class="icon-home"><span>홈</span></i></span>
					<strong>회원가입 완료</strong>
				</div>
			</div>

			<div class="join-step-bar">
				<ul>
					<li><i class="icon-join-agree"></i> 약관동의</li>
					<li class="on"><i class="icon-join-chk"></i> 본인확인</li>
					<li class="last"><i class="icon-join-inp"></i> 정보입력</li>
				</ul>
			</div>

			<div class="tit-box-h4">
				<h3 class="tit-h4">본인인증</h3>
			</div>

			<div class="section-content after">
				<div class="identify-box" style="width:100%;height:190px;">
					<div class="identify-inner">
						<strong>휴대폰 인증</strong>
						<p>주민번호 없이 메시지 수신가능한 휴대폰으로 1개 아이디만 회원가입이 가능합니다. </p>

						<br />

                        <form id="pNumber" method="POST">
						<input type="text" maxlength = "3" class="input-text" style="width:50px" id="p1" name="p1"/> -
						<input type="text" maxlength = "4" class="input-text" style="width:50px" id="p2" name="p2"/> -
						<input type="text" maxlength = "4" class="input-text" style="width:50px" id="p3" name="p3"/>
						<a href="#" class="btn-s-line" id="pChk">인증번호 받기</a>
                        </form>

						<br /><br />
						<input type="text" class="input-text" style="width:200px" id="pChk_Cp"/>
						<a href="#" class="btn-s-line" id="pChkVal">인증번호 확인</a>
					</div>
					<i class="graphic-phon"><span>휴대폰 인증</span></i>
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
    alert("유효하지 않은 형식입니다. 다시 작성해 주세요.");
    return false;
} else {
    alert("인증번호는 <?=$_SESSION['num']?> 입니다.");
    return true;
}
});
</script>
<script>
$("#pChkVal").on("click", function(){
    if($("input:text[id='pChk_Cp']").val() === '<?=$_SESSION['num']?>'){
        alert("인증되었습니다.");
       /* step_03.php에 phon number value 가지고 이동*/
       $("#pNumber").attr("action","../member/step_03.php");
       $("#pNumber").submit();
    }else{
        alert("인증번호가 일치하지 않습니다. 다시 시도해 주세요.");
    }
});
</script>

<?php
include '../common/footer.php';
?>