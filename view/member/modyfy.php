<?php
session_start();
include '../common//header.php';
?>
<?php
    include_once './model/selectMem.php';
?>
<div id="container" class="container-full">
	<div id="content" class="content">
		<div class="inner">
			<div class="tit-box-h3">
				<h3 class="tit-h3">내정보수정</h3>
				<div class="sub-depth">
					<span><i class="icon-home"><span>홈</span></i></span>
					<strong>내정보수정</strong>
				</div>
			</div>

			<div class="section-content">
				<table border="0" cellpadding="0" cellspacing="0" class="tbl-col-join">
					<caption class="hidden">강의정보</caption>
					<colgroup>
						<col style="width:15%"/>
						<col style="*"/>
					</colgroup>

					<tbody>
                    <form id="SignUp" method="post">
						<tr>
							<th scope="col"><span class="icons">*</span>이름</th>
							<td id='testtest'><?php echo $_POST["userName"];?></td>
						</tr>
                        <tr>
                            <th scope="col"><span class="icons">*</span>아이디</th>
                            <td><input type="text" class="input-text" id="userId" name= "userId" value="<?php echo $_POST["userId"];?>" style="width:302px" placeholder="영문자로 시작하는 4~15자의 영문소문자, 숫자" required/><a href="#idResult" class="btn-s-tin ml10" id="idEnrollChk">중복확인</a></td>
                        </tr>
                        <tr>
                            <th scope="col"><span class="icons">*</span>비밀번호</th>
                            <td><input type="password" class="input-text" id="userPw" name="userPw" style="width:302px" placeholder="8-15자의 영문자/숫자 혼합" required/><span id="pwd1Result" class="float-right"></span></td>
                        </tr>
                        <tr>
                            <th scope="col"><span class="icons">*</span>비밀번호 확인</th>
                            <td><input type="password" class="input-text" id="userPw2" name="userPw2" style="width:302px" required/><span id="pwd2Result" class="float-right" ></span></td>
                        </tr>
                        <tr>
                            <th scope="col"><span class="icons">*</span>이메일주소</th>
                            <td>
                                <input type="text" class="input-text" id="mail_1" name="mail_1" value="<?php echo $_POST['email1'];?>" style="width:138px" required/> @ <input type="text" id="mail_2" name="mail_2" value="<?php echo $_POST['email2'];?>"class="input-text" style="width:138px" placeholder="직접입력" required/>
                                <select class="input-sel" id="selmail" name="selmail" style="width:160px">
                                    <option id="naver" value="naver.com">naver.com</option>
                                    <option id="gmail" value="gmail.com">gmail.com</option>
                                    <option id="daum" value="daum.net">daum.net</option>
                                    <option id="stella" value="stella.com">stella.com</option>
                                    <option id="hackers" value="hackers.com">hackers.com</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col"><span class="icons">*</span>휴대폰 번호</th>
                            <td>
                                <input type="text" class="input-text" maxlength="3" id="p1" name="p1" style="width:50px" value="<?php echo $_POST['p1'];?>"  required /> -
                                <input type="text" class="input-text" maxlength="4" id="p2" name="p2" style="width:50px" value="<?php echo $_POST['p2'];?>"  required /> -
                                <input type="text" class="input-text" maxlength="4" id="p3" name="p3" style="width:50px" value="<?php echo $_POST['p3'];?>"  required/>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col"><span class="icons"></span>일반전화 번호</th>
                            <td><input type="text" class="input-text" id="t1" name="t1" maxlength="3" value="<?php echo $_POST['t1'];?>" style="width:88px"/> - <input type="text" maxlength="4" class="input-text" id="t2" name="t2" value="<?php echo $_POST['t2'];?>"style="width:88px"/> - <input type="text" maxlength="4" class="input-text" id="t3" name="t3" value="<?php echo $_POST['t3'];?>" style="width:88px"/></td>
                        </tr>
                        <tr>
                            <th scope="col"><span class="icons">*</span>주소</th>
                            <td>
                                <p >
                                    <label>우편번호 <input type="text" class="input-text ml5" id="address1" name="address1" value="<?php echo $_POST['address1'];?>"style="width:242px" required/></label><a href="#" class="btn-s-tin ml10" <!--onclick="address()"-->>주소찾기</a>
                                </p>
                                <p class="mt10">
                                    <label>기본주소 <input type="text" class="input-text ml5" id="address2" name="address2" value="<?php echo $_POST['address2'];?>" style="width:719px" required/></label>
                                </p>
                                <p class="mt10">
                                    <label>상세주소 <input type="text" class="input-text ml5" id="address3" name="address3" value="<?php echo $_POST['address3'];?>" style="width:719px" required/></label>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col"><span class="icons">*</span>SMS수신</th>
                            <td>
                                <div class="box-input">
                                    <label class="input-sp">
                                        <input type="radio" name="sendSms" id="sendSms1" value="y" checked="checked"/>
                                        <span class="input-txt">수신함</span>
                                    </label>
                                    <label class="input-sp">
                                        <input type="radio" name="sendSms" id="sendSms2" value="n" />
                                        <span class="input-txt">미수신</span>
                                    </label>
                                </div>
                                <p>SMS수신 시, 해커스의 혜택 및 이벤트 정보를 받아보실 수 있습니다.</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col"><span class="icons">*</span>메일수신</th>
                            <td>
                                <div class="box-input">
                                    <label class="input-sp">
                                        <input type="radio" name="sendMail" value="y" id="radio1" checked="checked"/>
                                        <span class="input-txt">수신함</span>
                                    </label>
                                    <label class="input-sp">
                                        <input type="radio" name="sendMail" id="radio2" value="n"/>
                                        <span class="input-txt">미수신</span>
                                    </label>
                                </div>
                                <p>메일수신 시, 해커스의 혜택 및 이벤트 정보를 받아보실 수 있습니다.</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <input type="hidden" id="emails" name="emails"/>
                <input type="hidden" id="phones" name="phones"/>
                <input type="hidden" id="tels" name="tels"/>
                </form>
                <div class="box-btn">
                    <a href="#"  class="btn-l">정보수정</a>
                </div>
            </div>
        </div>
    </div>
</div>



<!--엔터키 차단-->
<script>
    $('input[type="text"]').keydown(function() {
        if (event.keyCode === 13) {
            event.preventDefault();
        }
    });
</script>
<!--<script>
    라디오버튼 값 확인
    $("#radio2").on("click",function(){
        alert($(this).val());
    })
</script>-->
<!--유효성검사 시작-->
<script>
    var idFlag=0;
    var nameFlag=0;
    var pw2Flag=0;
    var pw1Flag=0;
    var idRules=/^[a-zA-Z0-9]{4,12}$/;
    var passwordRules = /^(?=.*[a-zA-Z])(?=.*[0-9]).{8,16}$/;
    var regExp = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;

    /*var nameRules= /^[가-?]{2,4}$/;*/

    $(function(){
        $("#idEnrollChk").on('click',function(){
            $.ajax({
                /*?php 방식?*/
                url:"/model/config.php",
                type:"post",
                data:{"userId":$("#userId").val().trim()},
                success:function(data){
                    /*alert(data);*/
                    console.log(data);
                    if(idRules.test($("#userId").val())){
                        if(data==$("#userId").val()){

                            alert($('#userId').val()+ "는 이미 존재하는 ID입니다. 아이디를 변경해주세요");
                            $('#userId').val("");
                            $('#userId').focus();
                        }else{
                            alert($('#userId').val()+"는 사용 가능한 ID입니다");
                            $('#userPw').focus();
                        }
                    }else{
                        alert("ID는 영문대소문자+숫자 4~12글자로 구성하여야 합니다.");
                    }
                }
            });
        });
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

        /*function Encrypt($str, $secret_key='secret key', $secret_iv='secret iv')
        비밀번호 암호화
        {
            $key = hash('sha256', $secret_key);
            $iv = substr(hash('sha256', $secret_iv), 0, 32)    ;

            return str_replace("=", "", base64_encode(
                openssl_encrypt($str, "AES-256-CBC", $key, 0, $iv))
            );
        }


        function Decrypt($str, $secret_key='secret key', $secret_iv='secret iv')
        {
            $key = hash('sha256', $secret_key);
            $iv = substr(hash('sha256', $secret_iv), 0, 32);

            return openssl_decrypt(
                base64_decode($str), "AES-256-CBC", $key, 0, $iv
            );
        }


        $str = $('#userPw');

        $secret_key = "123456789";
        $secret_iv = "#@$%^&*()_+=-";


        $encrypted = Encrypt($str, $secret_key, $secret_iv);
        echo "암호화 문자열 => " .$encrypted. "<br />\n";

        $decrypted = Decrypt($encrypted, $secret_key, $secret_iv);
        echo "복호화 문자열 => " .$decrypted. "\n";*/


    });
    /*주소 select시 value 삽입*/
    $("#selmail").change(function(){
        /*       alert($(this).val());*/
        $("input:text[id=mail_2]").val($(this).val());
        $("#telNum").focus();
    });

    $(".box-btn").on("click",function() {
        // 이메일 검증 스크립트 작성
        var emailVal = $("#mail_1").val()+"@"+$("#mail_2").val();
      /*  alert(emailVal);*/
        if (emailVal.match(regExp) != null) {
            var a = $('input:hidden[name=emails]').val(emailVal);

            var p1 = $('#p1').val();
            var p2 = $('#p2').val();
            var p3 = $('#p3').val();
            var pAll = p1+"-"+p2+"-"+p3;
            var b = $('input:hidden[name=phones]').val(pAll);


            var t1 = $('#t1').val();
            var t2 = $('#t2').val();
            var t3 = $('#t3').val();
            var tAll = t1+"-"+t2+"-"+t3;
            var c = $('input:hidden[name=tels]').val(tAll);
            /* alert("send mail address is "+$('input:hidden[name=email]').val());
             alert("send phone is "+$('input:hidden[name=phone]').val());
             alert("send tel is "+$('input:hidden[name=tel]').val());*/
        }
        else {
            alert('올바르지 않은 형식의 이메일입니다. 다시 입력해 주세요');
            return false;
        }

        $("#SignUp").attr("action","/model/updateMem.php");
        $("#SignUp").submit();
    });
</script>
<!--주소 api 가능하다는 전제-->
<!--<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<script>
function address() {
    new daum.Postcode({
        oncomplete: function(data) {
            var fullAddr = ''; // 주소 변수
            var extraAddr = '';
            if (data.userSelectedType === 'R') { // 도로명
                fullAddr = data.roadAddress;
            } else { // 지번
                fullAddr = data.jibunAddress;
            }
            if(data.userSelectedType === 'R'){
                //법정동명
                if(data.bname !== ''){
                    extraAddr += data.bname;
                }
                // 건물명
                if(data.buildingName !== ''){
                    extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                }
                fullAddr += (extraAddr !== '' ? ' ('+ extraAddr +')' : '');
            }
            document.getElementById('address1').value = data.zonecode; //5자리 새우편번호 사용
            document.getElementById('address2').value = fullAddr;
            document.getElementById('address3').focus();

        }
    }).open();
}
</script>-->
<?php
include '../common//footer.php';
?>?>