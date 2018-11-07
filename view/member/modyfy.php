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
				<h3 class="tit-h3">����������</h3>
				<div class="sub-depth">
					<span><i class="icon-home"><span>Ȩ</span></i></span>
					<strong>����������</strong>
				</div>
			</div>

			<div class="section-content">
				<table border="0" cellpadding="0" cellspacing="0" class="tbl-col-join">
					<caption class="hidden">��������</caption>
					<colgroup>
						<col style="width:15%"/>
						<col style="*"/>
					</colgroup>

					<tbody>
                    <form id="SignUp" method="post">
						<tr>
							<th scope="col"><span class="icons">*</span>�̸�</th>
							<td id='testtest'><?php echo $_POST["userName"];?></td>
						</tr>
                        <tr>
                            <th scope="col"><span class="icons">*</span>���̵�</th>
                            <td><input type="text" class="input-text" id="userId" name= "userId" value="<?php echo $_POST["userId"];?>" style="width:302px" placeholder="�����ڷ� �����ϴ� 4~15���� �����ҹ���, ����" required/><a href="#idResult" class="btn-s-tin ml10" id="idEnrollChk">�ߺ�Ȯ��</a></td>
                        </tr>
                        <tr>
                            <th scope="col"><span class="icons">*</span>��й�ȣ</th>
                            <td><input type="password" class="input-text" id="userPw" name="userPw" style="width:302px" placeholder="8-15���� ������/���� ȥ��" required/><span id="pwd1Result" class="float-right"></span></td>
                        </tr>
                        <tr>
                            <th scope="col"><span class="icons">*</span>��й�ȣ Ȯ��</th>
                            <td><input type="password" class="input-text" id="userPw2" name="userPw2" style="width:302px" required/><span id="pwd2Result" class="float-right" ></span></td>
                        </tr>
                        <tr>
                            <th scope="col"><span class="icons">*</span>�̸����ּ�</th>
                            <td>
                                <input type="text" class="input-text" id="mail_1" name="mail_1" value="<?php echo $_POST['email1'];?>" style="width:138px" required/> @ <input type="text" id="mail_2" name="mail_2" value="<?php echo $_POST['email2'];?>"class="input-text" style="width:138px" placeholder="�����Է�" required/>
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
                            <th scope="col"><span class="icons">*</span>�޴��� ��ȣ</th>
                            <td>
                                <input type="text" class="input-text" maxlength="3" id="p1" name="p1" style="width:50px" value="<?php echo $_POST['p1'];?>"  required /> -
                                <input type="text" class="input-text" maxlength="4" id="p2" name="p2" style="width:50px" value="<?php echo $_POST['p2'];?>"  required /> -
                                <input type="text" class="input-text" maxlength="4" id="p3" name="p3" style="width:50px" value="<?php echo $_POST['p3'];?>"  required/>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col"><span class="icons"></span>�Ϲ���ȭ ��ȣ</th>
                            <td><input type="text" class="input-text" id="t1" name="t1" maxlength="3" value="<?php echo $_POST['t1'];?>" style="width:88px"/> - <input type="text" maxlength="4" class="input-text" id="t2" name="t2" value="<?php echo $_POST['t2'];?>"style="width:88px"/> - <input type="text" maxlength="4" class="input-text" id="t3" name="t3" value="<?php echo $_POST['t3'];?>" style="width:88px"/></td>
                        </tr>
                        <tr>
                            <th scope="col"><span class="icons">*</span>�ּ�</th>
                            <td>
                                <p >
                                    <label>������ȣ <input type="text" class="input-text ml5" id="address1" name="address1" value="<?php echo $_POST['address1'];?>"style="width:242px" required/></label><a href="#" class="btn-s-tin ml10" onclick="address()">�ּ�ã��</a>
                                </p>
                                <p class="mt10">
                                    <label>�⺻�ּ� <input type="text" class="input-text ml5" id="address2" name="address2" value="<?php echo $_POST['address2'];?>" style="width:719px" required/></label>
                                </p>
                                <p class="mt10">
                                    <label>���ּ� <input type="text" class="input-text ml5" id="address3" name="address3" value="<?php echo $_POST['address3'];?>" style="width:719px" required/></label>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col"><span class="icons">*</span>SMS����</th>
                            <td>
                                <div class="box-input">
                                    <label class="input-sp">
                                        <input type="radio" name="sendSms" id="sendSms1" value="y" checked="checked"/>
                                        <span class="input-txt">������</span>
                                    </label>
                                    <label class="input-sp">
                                        <input type="radio" name="sendSms" id="sendSms2" value="n" />
                                        <span class="input-txt">�̼���</span>
                                    </label>
                                </div>
                                <p>SMS���� ��, ��Ŀ���� ���� �� �̺�Ʈ ������ �޾ƺ��� �� �ֽ��ϴ�.</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col"><span class="icons">*</span>���ϼ���</th>
                            <td>
                                <div class="box-input">
                                    <label class="input-sp">
                                        <input type="radio" name="sendMail" value="y" id="radio1" checked="checked"/>
                                        <span class="input-txt">������</span>
                                    </label>
                                    <label class="input-sp">
                                        <input type="radio" name="sendMail" id="radio2" value="n"/>
                                        <span class="input-txt">�̼���</span>
                                    </label>
                                </div>
                                <p>���ϼ��� ��, ��Ŀ���� ���� �� �̺�Ʈ ������ �޾ƺ��� �� �ֽ��ϴ�.</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <input type="hidden" id="emails" name="emails"/>
                <input type="hidden" id="phones" name="phones"/>
                <input type="hidden" id="tels" name="tels"/>
                </form>
                <div class="box-btn">
                    <a href="#"  class="btn-l">��������</a>
                </div>
            </div>
        </div>
    </div>
</div>



<!--����Ű ����-->
<script>
    $('input[type="text"]').keydown(function() {
        if (event.keyCode === 13) {
            event.preventDefault();
        }
    });
</script>
<!--<script>
    ������ư �� Ȯ��
    $("#radio2").on("click",function(){
        alert($(this).val());
    })
</script>-->
<!--��ȿ���˻� ����-->
<script>
    var idFlag=0;
    var nameFlag=0;
    var pw2Flag=0;
    var pw1Flag=0;
    var idRules=/^[a-zA-Z0-9]{4,12}$/;
    var passwordRules = /^(?=.*[a-zA-Z])(?=.*[0-9]).{8,16}$/;
    var regExp = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;

    /*var nameRules= /^[��-?]{2,4}$/;*/

    $(function(){
        $("#idEnrollChk").on('click',function(){
            $.ajax({
                /*?php ���?*/
                url:"/model/config.php",
                type:"post",
                data:{"userId":$("#userId").val().trim()},
                success:function(data){
                    /*alert(data);*/
                    console.log(data);
                    if(idRules.test($("#userId").val())){
                        if(data==$("#userId").val()){

                            alert($('#userId').val()+ "�� �̹� �����ϴ� ID�Դϴ�. ���̵� �������ּ���");
                            $('#userId').val("");
                            $('#userId').focus();
                        }else{
                            alert($('#userId').val()+"�� ��� ������ ID�Դϴ�");
                            $('#userPw').focus();
                        }
                    }else{
                        alert("ID�� ������ҹ���+���� 4~12���ڷ� �����Ͽ��� �մϴ�.");
                    }
                }
            });
        });
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


    });
    /*�ּ� select�� value ����*/
    $("#selmail").change(function(){
        /*       alert($(this).val());*/
        $("input:text[id=mail_2]").val($(this).val());
        $("#telNum").focus();
    });

    $(".box-btn").on("click",function() {
        // �̸��� ���� ��ũ��Ʈ �ۼ�
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
            alert('�ùٸ��� ���� ������ �̸����Դϴ�. �ٽ� �Է��� �ּ���');
            return false;
        }

        if($('#userPw').val() == "" || $('#userPw2').val() == "" || $('#userId').val() == "" || $('#p1').val() == "" || $('#p2').val() == "" || $('#p3').val() == "" || $('#address1').val() == "" || $('#address2').val() == ""
            || $('#address3').val() == "") {
            alert('�ʼ��׸��� ��� �Է����ּ���.');
            return false;
        }

        if($("#userPw").val() != $("#userPw2").val()) {
            alert("��й�ȣ�� ��ġ���� �ʽ��ϴ�.");
            return false;
        }

        $("#SignUp").attr("action","/model/updateMem.php");
        $("#SignUp").submit();
    });
</script>
<!--�ּ� api �����ϴٴ� ����-->
<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<script>
function address() {
    new daum.Postcode({
        oncomplete: function(data) {
            var fullAddr = ''; // �ּ� ����
            var extraAddr = '';
            if (data.userSelectedType === 'R') { // ���θ�
                fullAddr = data.roadAddress;
            } else { // ����
                fullAddr = data.jibunAddress;
            }
            if(data.userSelectedType === 'R'){
                //��������
                if(data.bname !== ''){
                    extraAddr += data.bname;
                }
                // �ǹ���
                if(data.buildingName !== ''){
                    extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                }
                fullAddr += (extraAddr !== '' ? ' ('+ extraAddr +')' : '');
            }
            document.getElementById('address1').value = data.zonecode; //5�ڸ� ��������ȣ ���
            document.getElementById('address2').value = fullAddr;
            document.getElementById('address3').focus();

        }
    }).open();
}
</script>
<?php
include '../common//footer.php';
?>?>