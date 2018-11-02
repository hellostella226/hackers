<?php
session_start();
$_SESSION['num'] = '123456';
?>
<?php
include '../common/header.php';
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
                    <li class="on"><a href="#" id="findId">아이디 찾기</a></li>
                    <li><a href="#" id="findPw">비밀번호 찾기</a></li>
                </ul>

                <div class="tit-box-h4">
                    <h3 class="tit-h4">아이디 찾기 방법 선택</h3>
                </div>


                <dl class="find-box">
                    <dt>휴대폰 인증</dt>
                    <dd>
                        고객님이 회원 가입 시 등록한 휴대폰 번호와 입력하신 휴대폰 번호가 동일해야 합니다.
                        <label class="input-sp big">
                            <input type="radio" id="searchPhone" name="radio" checked="checked" />
                            <span class="input-txt"></span>
                        </label>
                    </dd>
                </dl>
                <dl class="find-box">
                    <dt>이메일 인증</dt>
                    <dd>
                        고객님이 회원 가입 시 등록한 이메일 주소와 입력하신 이메일 주소가 동일해야 합니다.
                        <label class="input-sp big">
                            <input type="radio" id="searchEmail" name="radio" />
                            <span class="input-txt"></span>
                        </label>
                    </dd>
                </dl>

                <div class="section-content mt30">
                    <table border="0" cellpadding="0" cellspacing="0" class="tbl-col-join">
                        <caption class="hidden">아이디 찾기 개인정보 입력</caption>
                        <colgroup>
                            <col style="width:15%"/>
                            <col style="*"/>
                        </colgroup>
                     <tbody>
                    <form id="sendFrm" method="post">
                        <tr>
                            <th scope="col">성명</th>
                            <td><input type="text" class="input-text" id="userName" name="userName" style="width:302px" /></td>
                            <input type="hidden" id="userId" name="userId" />
                        </tr>
                        <tr>
                            <th scope="col">생년월일</th>
                            <td>
                                <select class="input-sel" style="width:148px">
                                    <option value="">선택</option>
                                    <option value="">선택입력</option>
                                    <option value="">선택입력</option>
                                    <option value="">선택입력</option>
                                    <option value="">선택입력</option>
                                </select>
                                년
                                <select class="input-sel" style="width:147px">
                                    <option value="">선택</option>
                                    <option value="">선택입력</option>
                                    <option value="">선택입력</option>
                                    <option value="">선택입력</option>
                                    <option value="">선택입력</option>
                                </select>
                                월
                                <select class="input-sel" style="width:147px">
                                    <option value="">선택</option>
                                    <option value="">선택입력</option>
                                    <option value="">선택입력</option>
                                    <option value="">선택입력</option>
                                    <option value="">선택입력</option>
                                </select>
                                일
                            </td>
                        </tr>
                        <tr>
                            <th scope="col" id="fMailTh">이메일주소</th>
                            <td id="fMail">
                                <input type="text" class="input-text" id="mail_1" name="mail_1" style="width:138px" required/> @ <input type="text" id="mail_2" name="mail_2" class="input-text" style="width:138px" placeholder="직접입력" required/>
                                <input type="hidden" id="email" name="email"/>
                                <select class="input-sel" id="selmail" name="selmail" style="width:160px">
                                    <option id="naver" value="naver.com">naver.com</option>
                                    <option id="gmail" value="gmail.com">gmail.com</option>
                                    <option id="daum" value="daum.net">daum.net</option>
                                    <option id="stella" value="stella.com">stella.com</option>
                                    <option id="hackers" value="hackers.com">hackers.com</option>
                                </select>
                                <a href="#" class="btn-s-tin ml10" id="mChk">인증번호 받기</a>
                            </td>
                            <label>
                               <th scope="col" id="fPhoneTh">휴대폰번호</th>
                               <td id="fPhone" name="fPhone">
                                    <input type="text" maxlength = "3" class="input-text" style="width:50px" id="p1" name="p1"/> -
                                    <input type="text" maxlength = "4" class="input-text" style="width:50px" id="p2" name="p2"/> -
                                    <input type="text" maxlength = "4" class="input-text" style="width:50px" id="p3" name="p3"/>
                                   <a href="#" class="btn-s-tin ml10" id="pChk">인증번호 받기</a>
                               </td>
                            </label>
                        </tr>
                    </form>
                        <tr>
                            <th scope="col">인증번호</th>
                            <td><input type="text" class="input-text" id="pChk_Cp" style="width:478px" /><a href="#" class="btn-s-tin ml10" id="pChkVal">인증번호 확인</a></td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

<script>
$('#findId').on('click',function(){
    location.href='./find_id.php';
});
$('#findPw').on('click',function(){
    location.href='./find_pass.php';
});
</script>

<script>
$(document).ready(function() {
    //default값이 휴대폰 인증이므로 메일 입력박스 숨김
    $('#fMailTh').hide();
    $('#fMail').hide();

    $('input:radio').click(function () {
        //휴대폰 인증 클릭 시
        if($('#searchPhone').is(':checked')) {

            $('#fPhoneTh').show();
            $('#fPhone').show();
            $('#fMailTh').hide();
            $('#fMail').hide();
        //메일 인증 클릭 시
        } else {

            $('#fMailTh').show();
            $('#fMail').show();
            $('#fPhoneTh').hide();
            $('#fPhone').hide();
        }
    });
});
</script>
<script>
/*메일주소 select시 선택된 값 텍스트박스에 삽입*/
    $("#selmail").change(function() {
        /*       alert($(this).val());*/
        $("input:text[id=mail_2]").val($(this).val());
    });
</script>
<script>
//휴대폰번호 유효성체크 정규식
var phoneNumberRegex = /^[0-9]{3}-[0-9]{4}-[0-9]{4}$/;

$("#pChk").click(function(event) {
    var a = $("input:text[name='p1']").val();
    var b = $("input:text[name='p2']").val();
    var c = $("input:text[name='p3']").val();
    var phoneVal = a+"-"+b+"-"+c;
    /*alert(pEnroll);*/
    //유효한 형식의 휴대폰번호일 경우
        if(phoneVal.match(phoneNumberRegex) != null) {
            //성명과 휴대폰번호를 DB에 있는 데이터와 비교하기 위해 Ajax 통신
            $.ajax ({
                url: "/model/selectNamePhone.php",
                type: "post",
                //userName 인코딩
                data: {userName: encodeURIComponent($('#userName').val()), phone: phoneVal},

                success: function (data) {
                    console.log(data);
                    //전송받은 data와 입력한 userName이 같을 경우
                    if (data.trim() != "") {

                        alert("인증번호는 <?=$_SESSION['num']?> 입니다.");
                        var a = $('input:hidden[name=userId]').val(data);

                    } else {

                        alert("입력하신 성명 & 이메일과 일치하는 회원이 없습니다. 성명과 이메일을 정확히 입력해 주세요");
                        $('#userName').focus();

                    }
                }
            });

        } else {
            alert("휴대폰번호의 형식이 올바르지 않습니다. 정확한 번호를 입력해주세요.");
            $('#p1').focus();
        }
});
</script>
<script>
//메일 유효성체크 정규식
var regExp = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;

    $("#mChk").click(function(event) {

            var emailVal = $("#mail_1").val()+"@"+$("#mail_2").val();
            //유효한 형식의 이메일일 경우
            if (emailVal.match(regExp) != null) {
                //성명과 이메일주소를 DB에 있는 데이터와 비교하기위해 Ajax 통신
                $.ajax ({
                    url: "/model/selectNameEmail.php",
                    type: "post",
                    //userName 인코딩
                    data: {userName: encodeURIComponent($('#userName').val()), email: emailVal},

                    success: function (data) {
                        console.log(data);
                        //전송받은 data와 입력한 userName이 같을 경우
                        if (data.trim() != "") {

                            alert("인증번호는 <?=$_SESSION['num']?> 입니다.");
                            var a = $('input:hidden[name=userId]').val(data);

                        } else {

                            alert("입력하신 성명 & 이메일과 일치하는 회원이 없습니다. 성명과 이메일을 정확히 입력해 주세요");
                            $('#userName').focus();

                        }
                    }
                });
                
            } else {
                //이메일 형식이 유효하지 않을 경우
                alert("메일의 형식이 올바르지 않습니다. 정확한 이메일을 입력해주세요.");
                $('#mail_1').focus();
            }
    });
</script>
<script>
    //인증번호 확인
    $("#pChkVal").on("click", function(){
        //세션값과 텍스트박스의 값이 같을 경우
        if($("input:text[id='pChk_Cp']").val() === '<?=$_SESSION['num']?>'){
            alert("인증되었습니다.");

            $('#sendFrm').attr("action","./fine_id_2.php");
            $('#sendFrm').submit();

        }else{
            alert("인증번호가 일치하지 않습니다. 다시 시도해 주세요.");
        }
    });
</script>

<?php
include '../common/footer.php';
?>