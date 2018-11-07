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
				<li><a href="#">���̵� ã��</a></li>
				<li class="on"><a href="#">��й�ȣ ã��</a></li>
			</ul>

			<div class="tit-box-h4">
				<h3 class="tit-h4">��й�ȣ ã�� ��� ����</h3>
			</div>

            <dl class="find-box">
                <dt>�޴��� ����</dt>
                <dd>
                    �������� ȸ�� ���� �� ����� �޴��� ��ȣ�� �Է��Ͻ� �޴��� ��ȣ�� �����ؾ� �մϴ�.
                    <label class="input-sp big">
                        <input type="radio" id="searchPhone" name="radio" checked="checked" />
                        <span class="input-txt"></span>
                    </label>
                </dd>
            </dl>
            <dl class="find-box">
                <dt>�̸��� ����</dt>
                <dd>
                    �������� ȸ�� ���� �� ����� �̸��� �ּҿ� �Է��Ͻ� �̸��� �ּҰ� �����ؾ� �մϴ�.
                    <label class="input-sp big">
                        <input type="radio" id="searchEmail" name="radio" />
                        <span class="input-txt"></span>
                    </label>
                </dd>
            </dl>

            <div class="section-content mt30">
                <table border="0" cellpadding="0" cellspacing="0" class="tbl-col-join">
                    <caption class="hidden">���̵� ã�� �������� �Է�</caption>
                    <colgroup>
                        <col style="width:15%"/>
                        <col style="*"/>
                    </colgroup>
                    <tbody>
                    <form id="sendFrm" method="post">
                        <tr>
                            <th scope="col">����</th>
                            <td><input type="text" class="input-text" id="userName" name="userName" style="width:302px" /></td>
                            <input type="hidden" id="userId" name="userId" />
                        </tr>
                        <tr>
                            <th scope="col">���̵�</th>
                            <td>
                                <input type="text" class="input-text" id="userIds" name="userIds" style="width:302px" />
                            </td>
                        </tr>
                        <tr>
                            <th scope="col" id="fMailTh">�̸����ּ�</th>
                            <td id="fMail">
                                <input type="text" class="input-text" id="mail_1" name="mail_1" style="width:138px" required/> @ <input type="text" id="mail_2" name="mail_2" class="input-text" style="width:138px" placeholder="�����Է�" required/>
                                <input type="hidden" id="email" name="email"/>
                                <select class="input-sel" id="selmail" name="selmail" style="width:160px">
                                    <option id="naver" value="naver.com">naver.com</option>
                                    <option id="gmail" value="gmail.com">gmail.com</option>
                                    <option id="daum" value="daum.net">daum.net</option>
                                    <option id="stella" value="stella.com">stella.com</option>
                                    <option id="hackers" value="hackers.com">hackers.com</option>
                                </select>
                                <a href="#" class="btn-s-tin ml10" id="mChk">������ȣ �ޱ�</a>
                            </td>
                            <label>
                                <th scope="col" id="fPhoneTh">�޴�����ȣ</th>
                                <td id="fPhone" name="fPhone">
                                    <input type="text" maxlength = "3" class="input-text" style="width:50px" id="p1" name="p1"/> -
                                    <input type="text" maxlength = "4" class="input-text" style="width:50px" id="p2" name="p2"/> -
                                    <input type="text" maxlength = "4" class="input-text" style="width:50px" id="p3" name="p3"/>
                                    <a href="#" class="btn-s-tin ml10" id="pChk">������ȣ �ޱ�</a>
                                </td>
                            </label>
                        </tr>
                    </form>
                    <tr>
                        <th scope="col">������ȣ</th>
                        <td><input type="text" class="input-text" id="pChk_Cp" style="width:478px" /><a href="#" class="btn-s-tin ml10" id="pChkVal">������ȣ Ȯ��</a></td>
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
            //default���� �޴��� �����̹Ƿ� ���� �Է¹ڽ� ����
            $('#fMailTh').hide();
            $('#fMail').hide();

            $('input:radio').click(function () {
                //�޴��� ���� Ŭ�� ��
                if($('#searchPhone').is(':checked')) {

                    $('#fPhoneTh').show();
                    $('#fPhone').show();
                    $('#fMailTh').hide();
                    $('#fMail').hide();
                    //���� ���� Ŭ�� ��
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
        /*�����ּ� select�� ���õ� �� �ؽ�Ʈ�ڽ��� ����*/
        $("#selmail").change(function() {
            /*       alert($(this).val());*/
            $("input:text[id=mail_2]").val($(this).val());
        });
    </script>
    <script>
        //�޴�����ȣ ��ȿ��üũ ���Խ�
        var phoneNumberRegex = /^[0-9]{3}-[0-9]{4}-[0-9]{4}$/;

        $("#pChk").click(function(event) {
            var a = $("input:text[name='p1']").val();
            var b = $("input:text[name='p2']").val();
            var c = $("input:text[name='p3']").val();
            var phoneVal = a+"-"+b+"-"+c;
            /*alert(pEnroll);*/
            //��ȿ�� ������ �޴�����ȣ�� ���
            if(phoneVal.match(phoneNumberRegex) != null) {

                //������ �޴�����ȣ�� DB�� �ִ� �����Ϳ� ���ϱ� ���� Ajax ���
                $.ajax ({
                    url: "/model/selectNamePhonePw.php",
                    type: "post",
                    //userName ���ڵ�
                    data: {userName: encodeURIComponent($('#userName').val()), phone: phoneVal, userId: $('#userIds').val() },

                    success: function (data) {
                       /* console.log(data);*/
                        //���۹��� data�� �Է��� userName�� ���� ���
                        if (data.trim() != "") {

                            alert("������ȣ�� <?=$_SESSION['num']?> �Դϴ�.");
                            var a = $('input:hidden[name=userId]').val(data);

                        } else {

                            alert("�Է��Ͻ� ���� & �̸��ϰ� ��ġ�ϴ� ȸ���� �����ϴ�. ������ �̸����� ��Ȯ�� �Է��� �ּ���");
                            $('#userName').focus();

                        }
                    }
                });

            } else {
                alert("�޴�����ȣ�� ������ �ùٸ��� �ʽ��ϴ�. ��Ȯ�� ��ȣ�� �Է����ּ���.");
                $('#p1').focus();
            }
        });
    </script>
    <script>
        //���� ��ȿ��üũ ���Խ�
        var regExp = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;

        $("#mChk").click(function(event) {

            var emailVal = $("#mail_1").val()+"@"+$("#mail_2").val();
            //��ȿ�� ������ �̸����� ���
            if (emailVal.match(regExp) != null) {
                //������ �̸����ּҸ� DB�� �ִ� �����Ϳ� ���ϱ����� Ajax ���
                $.ajax ({
                    url: "/model/selectNameEmailPw.php",
                    type: "post",
                    //userName ���ڵ�
                    data: {userName: encodeURIComponent($('#userName').val()), email: emailVal, userId: $('#userIds').val() },

                    success: function (data) {
                        /*console.log(data);*/
                        //���۹��� data�� �Է��� userName�� ���� ���
                        if (data.trim() != "") {

                            alert("������ȣ�� <?=$_SESSION['num']?> �Դϴ�.");
                            var a = $('input:hidden[name=userId]').val(data);

                        } else {

                            alert("�Է��Ͻ� ���� & �̸��ϰ� ��ġ�ϴ� ȸ���� �����ϴ�. ������ �̸����� ��Ȯ�� �Է��� �ּ���");
                            $('#userName').focus();

                        }
                    }
                });

            } else {
                //�̸��� ������ ��ȿ���� ���� ���
                alert("������ ������ �ùٸ��� �ʽ��ϴ�. ��Ȯ�� �̸����� �Է����ּ���.");
                $('#mail_1').focus();
            }
        });
    </script>
    <script>
        //������ȣ Ȯ��
        $("#pChkVal").on("click", function(){
            //���ǰ��� �ؽ�Ʈ�ڽ��� ���� ���� ���
            if($("input:text[id='pChk_Cp']").val() === '<?=$_SESSION['num']?>'){
                alert("�����Ǿ����ϴ�.");

                $('#sendFrm').attr("action","./fine_pass_2.php");
                $('#sendFrm').submit();

            }else{
                alert("������ȣ�� ��ġ���� �ʽ��ϴ�. �ٽ� �õ��� �ּ���.");
            }
        });
    </script>

<?php
include '../common/footer.php';
?>