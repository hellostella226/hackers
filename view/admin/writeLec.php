<?php
session_start();
include '../common/header.php';
include '../common/adminLeftNav.php';
include '../../model/selectLecture.php';
?>
    <!--스마트에디터 소스-->
    <script type="text/javascript" src="/smarteditor2-2.3.1/js/HuskyEZCreator.js" charset="EUC-KR"></script>
    <style>
        .nse_content{width:600px;height:500px}
    </style>

	<div id="content" class="content">
		<div class="tit-box-h3">
			<h3 class="tit-h3">강의 등록</h3>
			<div class="sub-depth">
				<span><i class="icon-home"><span>홈</span></i></span>
				<span>직무교육 안내</span>
				<strong>수강후기</strong>
			</div>
		</div>

		<div class="user-notice">
			<strong class="fs16">강의 등록하기</strong>
			<ul class="list-guide mt15">
				<li class="tc-brand">썸네일 파일 첨부시 웹 관련 파일 업로드를 할 수 업습니다.(ex: php/html/.c 등)</li>
				<li>욕설(욕설을 표현하는 자음어/기호표현 포함) 및 명예훼손, 비방,도배글, 상업적 목적의 홍보성 게시글 등 사회상규에 반하는 게시글 및 강의내용과 상관없는 서비스에 대해 작성한 글들은 삭제 될 수 있으며, 법적 책임을 질 수 있습니다.</li>
			</ul>
		</div>
     
		<table border="0" cellpadding="0" cellspacing="0" class="tbl-col">
			<caption class="hidden">강의정보</caption>
			<colgroup>
				<col style="width:15%"/>
				<col style="*"/>
			</colgroup>

            <form id="adminFrm" method="post" enctype="multipart/form-data">
			<tbody>
				<tr>
					<th scope="col">강의</th>
					<td>
						<select class="input-sel" style="width:160px" id="selectBox1" name="cateName">
                            <option>분류</option>
                            <? while($cate=mysql_fetch_array($data)) {
                                echo "<option id='".$cate['cateNo']."' name='".$cate['cateNo']."'>".$cate['cateName']."</option>";
                             } ?>
						</select>
					</td>
                </tr>
                <tr>
                    <th scope="col">강사</th>
                    <td>
                        <input type="text" id="teacher" name="teacher" style="height:25px" required/>
                    </td>
               </tr>
                <tr>
                    <th scope="col">학습난이도</th>
                    <td>
                        <select class="input-sel" style="width:160px" id="lecLevel" name="lecLevel">
                            <option>상</option>
                            <option>중</option>
                            <option>하</option>
                        </select>
                    </td>
               </tr>
                <tr>
                    <th scope="col">교육시간</th>
                    <td>
                        <input type="number" id="lecTime" name="lecTime" style="height:25px" required/>
                    </td>
                </tr>
                <tr>
                    <th scope="col">강좌 수</th>
                    <td>
                        <input type="number" id="lecNum" name="lecNum" style="height:25px" required/>
                    </td>
                </tr>
                <tr>
                    <th scope="col">강의 제목</th>
                    <td>
                        <input type="text" id="lecName" name="lecName" style="height:25px" required/>
                    </td>
                </tr>
                <tr>
                    <th scope="col">상세 내용</th>
                    <td>
                        <textarea name="ir1" id="ir1" class="nse_content" ></textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="col">썸네일</th>
                    <td>
                        <!--<input type="hidden" id = "MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="10485760" />-->
<!--                        <input type="file" id="thumbnail" name="thumbnail" style="height:25px" accept=".jpg, .gif, .jpeg, .png" required/>-->
                        <input type="file" name="myfile" id="myfile">
                    </td>
                </tr>
			</tbody>
		</table>

		<div class="box-btn t-r">
			<a href="#" class="btn-m-gray">목록</a>
		</div>
        <input type="hidden" id="cateNo" name="cateNo" value="">
        <input type="hidden" name="mode" value="lectureFrm">
        <input type="button" class="btn-m ml5" id="sendContents" value="강의등록">
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

        // 에디터 내용 textarea에 적용
        oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);


       /* var fileObj = document.getElementById('thumbnail').files[0];

        var fileObjValue = document.getElementById('thumbnail').value;


        var img_all_names = fileObj['name'].split('.');

        var name = img_all_names[0];//이미지 이름

        var ext = img_all_names[1].toLowerCase();//확장자

        var size = fileObj['size'];//파일사이즈



        //이미지 확장자 검사
        if(ext != 'jpg' && ext != 'jpeg' && ext != 'png' && ext != 'gif') {


            alert('이미지 파일 업로드만 가능합니다.');
            $('#thumbnail').focus();
            return false;

        }


        //이미지 파일 사이즈
        if(size >= parseInt(10485760)) {

            alert('10MB 이하의 파일만 업로드가 가능합니다.');
            $('#thumbnail').focus();
            return false;

        }*/

        var form = $('#adminFrm')[0];
        var formData = new FormData(form);
        formData.append("myfile", $("#myfile")[0].files[0]);

        $.ajax({
            url: "/controller/adminController.php",
            type: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData:false,
            success: function(data) {
                console.log(data);
            }
        });

        //수강후기 폼 값 전송
        // $.post('/controller/adminController.php', $('#adminFrm').serialize(), function(data) {
        //
        //     if(data.success == false) {
        //
        //         alert(data.msg);
        //         return false;
        //
        //     }
        //
        // }, 'json')

    });
</script>


<?php
include '../common/footer.php';
?>