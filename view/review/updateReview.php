<?
session_start();
include '../common/header.php';
include '../common/review_leftNav.php';
include_once '../../model/selectLecture.php';
include_once '../../model/selectDetails.php';
?>

	<div id="content" class="content">
		<div class="tit-box-h3">
			<h3 class="tit-h3">�����ı� ����</h3>
			<div class="sub-depth">
				<span><i class="icon-home"><span>Ȩ</span></i></span>
				<span>�������� �ȳ�</span>
				<strong>�����ı�</strong>
			</div>
		</div>

		<div class="user-notice">
			<strong class="fs16">���ǻ��� �ȳ�</strong>
			<ul class="list-guide mt15">
				<li class="tc-brand">�����ı�� ��û�Ͻ� ������ �н������� 25%�̻� �޼��� �ۼ������մϴ�. </li>
				<li>�弳(�弳�� ǥ���ϴ� ������/��ȣǥ�� ����) �� �����Ѽ�, ���,�����, ����� ������ ȫ���� �Խñ� �� ��ȸ��Կ� ���ϴ� �Խñ� �� ���ǳ���� ������� ���񽺿� ���� �ۼ��� �۵��� ���� �� �� ������, ���� å���� �� �� �ֽ��ϴ�.</li>
			</ul>
		</div>

		<table border="0" cellpadding="0" cellspacing="0" class="tbl-col">
			<caption class="hidden">��������</caption>
			<colgroup>
				<col style="width:15%"/>
				<col style="*"/>
			</colgroup>


            <form id="reviewFrm" method="post">
			<tbody>
				<tr>
					<th scope="col">����</th>
					<td>
						<select class="input-sel" style="width:160px" id = "selectBox1" >
                            <? while($cate=mysql_fetch_array($data)) { ?>
                                <option id='<?=$cate['cateNo']?>' name='cateNo' <? if($cate['cateNo'] == $row['cateNo']) { ?>selected<? } ?>><?=$cate['cateName']?></option>
                            <? } ?>
						</select>
						<select class="input-sel ml5" style="width:454px" id = "selectBox2">
                            <? while($lec=mysql_fetch_array($result2)) { ?>
                                <option id='<?=$lec['lecNo']?>' name='<?=$lec['lecNo']?>' <? if($lec['lecNo'] == $row['lecNo']) { ?>selected<? } ?>><?=$lec['lecName']?></option>
                                <input type="hidden" id="lecNo" name="lecNo" value="<?=$lec['lecNo']?>">
                            <? } ?>
						</select>
					</td>
				</tr>
				<tr>
					<th scope="col">����</th>
					<td><input type="text" class="input-text" id="title" name="title" style="width:611px" value="<?=$row['title']?>"/></td>
				</tr>
				<tr>
					<th scope="col">���Ǹ�����</th>
					<td>
						<ul class="list-rating-choice">
							<li>
								<label class="input-sp ico">
									<input type="radio" name="starChk" id="starChk1" <? if($row['starChk'] == '100'){ echo 'checked'; }?> value="100"/>
									<span class="input-txt">����</span>
								</label>
								<span class="star-rating">
									<span class="star-inner" style="width:100%"></span>
								</span>
							</li>
							<li>
								<label class="input-sp ico">
									<input type="radio" name="starChk" id="starChk2"  <? if($row['starChk'] == '80'){ echo 'checked'; }?> value="80"/>
									<span class="input-txt">����</span>
								</label>
								<span class="star-rating">
									<span class="star-inner" style="width:80%"></span>
								</span>
							</li>
							<li>
								<label class="input-sp ico">
									<input type="radio" name="starChk" id="starChk3"  <? if($row['starChk'] == '60'){ echo 'checked'; }?> value="60"/>
									<span class="input-txt">����</span>
								</label>
								<span class="star-rating">
									<span class="star-inner" style="width:60%"></span>
								</span>
							</li>
							<li>
								<label class="input-sp ico">
									<input type="radio" name="starChk" id="starChk4"  <? if($row['starChk'] == '40'){ echo 'checked'; }?> value="40"/>
									<span class="input-txt">����</span>
								</label>
								<span class="star-rating">
									<span class="star-inner" style="width:40%"></span>
								</span>
							</li>
							<li>
								<label class="input-sp ico">
									<input type="radio" name="starChk" id="starChk5"  <? if($row['starChk'] == '20'){ echo 'checked'; }?> value="20"/>
									<span class="input-txt">����</span>
								</label>
								<span class="star-rating">
									<span class="star-inner" style="width:20%"></span>
								</span>
							</li>
						</ul>
					</td>
				</tr>
			</tbody>

		</table>


        <!--����Ʈ������ �ҽ�-->
        <script type="text/javascript" src="/smarteditor2-2.3.1/js/HuskyEZCreator.js" charset="EUC-KR"></script>
        <style>
            .nse_content{width:660px;height:500px}
        </style>
        <div class="editor-wrap">
            <textarea name="ir1" id="ir1" class="nse_content" ><?=$row['content']?></textarea>
        </div>

        </form>

        <div class="box-btn t-r">
            <a href="#" class="btn-m-gray">���</a>
            <a href="#" class="btn-m ml5" id="sendContents">����</a>
        </div>


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

        // ������ ���� textarea�� ����
        oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);


        //�����ı� �� �� ����
        $('#reviewFrm').attr('action','/model/updateReview.php?reviewNo=<?=$_GET['reviewNo']?>');
        $('#reviewFrm').submit();

    });
</script>
<script>

    /*�з� ���ý� ���Ǹ� ����Ʈ�ڽ� ���� ����*/
    //$(document).on('change', $('#selectBox1'),function() {
    $('select#selectBox1').change(function() {
        //���������� ���� ���� searchType ����
        var searchType = $('option:selected').val();
        $.ajax({
            url: '/model/selectDynamicLecName.php',
            type: 'post',
            data: {
                /*searchType : encodeURIComponent(searchType)*/
                searchType: searchType
            },
            success: function (data) {

                //�̺�Ʈ�ڽ� ���� ����
                var htmls = "<option>-----���Ǹ� ����-----</option>" + data;
                $('#selectBox2').empty().append(htmls);

            }
        });
    });
</script>
<?
include '../common/footer.php';
?>