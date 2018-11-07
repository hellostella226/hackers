<?php
session_start();
include '../common/header.php';
?>
<?php
include '../common/admin_leftNav.php';
?>
<?php
//���� �з� �ҷ�����
include '../../model/selectLecture.php';
?>
    <!--����Ʈ������ �ҽ�-->
    <script type="text/javascript" src="/smarteditor2-2.3.1/js/HuskyEZCreator.js" charset="EUC-KR"></script>
    <style>
        .nse_content{width:600px;height:500px}
    </style>

	<div id="content" class="content">
		<div class="tit-box-h3">
			<h3 class="tit-h3">���� ���</h3>
			<div class="sub-depth">
				<span><i class="icon-home"><span>Ȩ</span></i></span>
				<span>�������� �ȳ�</span>
				<strong>�����ı�</strong>
			</div>
		</div>

		<div class="user-notice">
			<strong class="fs16">���� ����ϱ�</strong>
			<ul class="list-guide mt15">
				<li class="tc-brand">����� ���� ÷�ν� �� ���� ���� ���ε带 �� �� �����ϴ�.(ex: php/html/.c ��)</li>
				<li>�弳(�弳�� ǥ���ϴ� ������/��ȣǥ�� ����) �� �����Ѽ�, ���,�����, ����� ������ ȫ���� �Խñ� �� ��ȸ��Կ� ���ϴ� �Խñ� �� ���ǳ���� ������� ���񽺿� ���� �ۼ��� �۵��� ���� �� �� ������, ���� å���� �� �� �ֽ��ϴ�.</li>
			</ul>
		</div>
     
		<table border="0" cellpadding="0" cellspacing="0" class="tbl-col">
			<caption class="hidden">��������</caption>
			<colgroup>
				<col style="width:15%"/>
				<col style="*"/>
			</colgroup>

            <form id="adminFrm" method="post" enctype="multipart/form-data">
			<tbody>
				<tr>
					<th scope="col">����</th>
					<td>
						<select class="input-sel" style="width:160px" id="selectBox1" name="cateName">
                            <option>�з�</option>
                            <? while($cate=mysql_fetch_array($data)) {
                                echo "<option id='".$cate['cateNo']."' name='".$cate['cateNo']."'>".$cate['cateName']."</option>";
                             } ?>
						</select>
					</td>
                </tr>
                <tr>
                    <th scope="col">����</th>
                    <td>
                        <input type="text" id="teacher" name="teacher" style="height:25px" required/>
                    </td>
               </tr>
                <tr>
                    <th scope="col">�н����̵�</th>
                    <td>
                        <select class="input-sel" style="width:160px" id="lecLevel" name="lecLevel">
                            <option>��</option>
                            <option>��</option>
                            <option>��</option>
                        </select>
                    </td>
               </tr>
                <tr>
                    <th scope="col">�����ð�</th>
                    <td>
                        <input type="number" id="lecTime" name="lecTime" style="height:25px" required/>
                    </td>
                </tr>
                <tr>
                    <th scope="col">���� ��</th>
                    <td>
                        <input type="number" id="lecNum" name="lecNum" style="height:25px" required/>
                    </td>
                </tr>
                <tr>
                    <th scope="col">���� ����</th>
                    <td>
                        <input type="text" id="lecName" name="lecName" style="height:25px" required/>
                    </td>
                </tr>
                <tr>
                    <th scope="col">�� ����</th>
                    <td>
                        <textarea name="ir1" id="ir1" class="nse_content" ></textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="col">�����</th>
                    <td>
                        <input type="hidden" id = "MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="10485760" />
                        <input type="file" id="thumbnail" name="thumbnail" style="height:25px" accept=".jpg, .gif, .jpeg, .png" required/>
                    </td>
                </tr>
			</tbody>
		</table>

		<div class="box-btn t-r">
			<a href="#" class="btn-m-gray">���</a>
			<a href="#" class="btn-m ml5" id="sendContents">���ǵ��</a>
		</div>
        <input type="hidden" id="cateNo" name="cateNo" value="">
        </form>
	</div>
</div>


<script type="text/javascript">

    var oEditors = [];

    nhn.husky.EZCreator.createInIFrame ({
        oAppRef: oEditors,
        elPlaceHolder: "ir1",
        sSkinURI: "/smarteditor2-2.3.1/SmartEditor2Skin.html",
        fCreator: "createSEditor2"
    });

    $('#sendContents').on('click',function() {

        var a = $('option:selected').attr('name');
        var b = $('input:hidden[name=cateNo]').val(a);

        // ������ ���� textarea�� ����
        oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);



        var fileObj = document.getElementById('thumbnail').files[0];

        var fileObjValue = document.getElementById('thumbnail').value;


        var img_all_names = fileObj['name'].split('.');

        var name = img_all_names[0];//�̹��� �̸�

        var ext = img_all_names[1].toLowerCase();//Ȯ����

        var size = fileObj['size'];//���ϻ�����



        //�̹��� Ȯ���� �˻�
        if(ext != 'jpg' && ext != 'jpeg' && ext != 'png' && ext != 'gif') {


            alert('�̹��� ���� ���ε常 �����մϴ�.');
            $('#thumbnail').focus();
            return false;

        }


        //�̹��� ���� ������
        if(size >= parseInt(10485760)) {

            alert('10MB ������ ���ϸ� ���ε尡 �����մϴ�.');
            $('#thumbnail').focus();
            return false;

        }

        //�����ı� �� �� ����
        $('#adminFrm').attr('action','/model/insertLecture.php');
        $('#adminFrm').submit();

    });
</script>


<?php
include '../common/footer.php';
?>