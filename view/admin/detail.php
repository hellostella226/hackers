<?
session_start();
include '../common/header.php';
include_once '../common/admin_leftNav.php';
?>

		<table border="0" cellpadding="0" cellspacing="0" class="tbl-bbs-view">
			<caption class="hidden">�����ı�</caption>
			<colgroup>
				<col style="*"/>
				<col style="width:20%"/>
			</colgroup>
			<tbody>
				 <tr>
					<th scope="col">����</th>
					<th scope="col" class="user-id">�ۼ��� | idididi**</th>
				 </tr>
				<tr>
					<td colspan="2">
						<div class="box-rating">
							<span class="tit_rating">���Ǹ�����</span>
							<span class="star-rating">
								<span class="star-inner" style="width:80%"></span>
							</span>
						</div>
						
						���� ��ȸ ���� ���ǿ���!<br />
						���ǽð��� �����ϰ� ������ �� ��Ƽ� �������ֽó׿�!<br />
						�������� �������� ����ϰ� ��� ���̶�� �� ��õ�մϴ�. <br />
					</td>
				</tr>
			</tbody>
		</table>
		
		
		<p class="mb15"><strong class="tc-brand fs16">dlwlsl**���� �����Ͻ� ���� ����</strong></p>
		
		<table border="0" cellpadding="0" cellspacing="0" class="tbl-lecture-list">
			<caption class="hidden">��������</caption>
			<colgroup>
				<col style="width:166px"/>
				<col style="*"/>
				<col style="width:110px"/>
			</colgroup>
			<tbody>
				<tr>
					<td>
						<a href="#" class="sample-lecture">
							<img src="http://via.placeholder.com/144x101" alt="" width="144" height="101" />
							<span class="tc-brand">���ð��� ��</span>
						</a>
					</td>
					<td class="lecture-txt">
						<em class="tit mt10">Beyond Trouble, ������ ������Ű�� ������ ���</em>
						<p class="tc-gray mt20">����: ��ȯ�� | �н����̵� : �� | �����ð�: 18�ð� (18��)</p>
					</td>
					<td class="t-r"><a href="#" class="btn-square-line">����<br />��</a></td>
				</tr>
			</tbody>
		</table>

		<div class="box-btn t-r">
			<a href="#" class="btn-m-gray">���</a>
			<a href="#" class="btn-m ml5">����</a>
			<a href="#" class="btn-m-dark">����</a>
		</div>

		<div class="search-info">
			<div class="search-form f-r">
				<select class="input-sel" style="width:158px">
					<option value="">�з�</option>
				</select>
				<select class="input-sel" style="width:158px">
					<option value="">���Ǹ�</option>
					<option value="">�ۼ���</option>
				</select>
				<input type="text" class="input-text" placeholder="���Ǹ��� �Է��ϼ���." style="width:158px"/>
				<button type="button" class="btn-s-dark">�˻�</button>
			</div>
		</div>

		<table border="0" cellpadding="0" cellspacing="0" class="tbl-bbs">
			<caption class="hidden">�����ı�</caption>
			<colgroup>
				<col style="width:8%"/>
				<col style="width:8%"/>
				<col style="*"/>
				<col style="width:15%"/>
				<col style="width:12%"/>
			</colgroup>

			<thead>
				<tr>
					<th scope="col">��ȣ</th>
					<th scope="col">�з�</th>
					<th scope="col">����</th>
					<th scope="col">���Ǹ�����</th>
					<th scope="col">�ۼ���</th>
				</tr>
			</thead>
	 
			<tbody>
				<!-- set -->
				<tr class="bbs-sbj">
					<td>1</td>
					<td>CS</td>
					<td>
						<a href="#">
							<span class="tc-gray ellipsis_line">���� ���Ǹ� : Beyond Trouble, ������ ������Ű�� ������ ���</span>
							<strong class="ellipsis_line">���� ��ȸ ���� ���� ����!</strong>
						</a>
					</td>
					<td>
						<span class="star-rating">
							<span class="star-inner" style="width:80%"></span>
						</span>
					</td>
					<td class="last">�̸�</td>
				</tr>
				<!-- //set -->
			</tbody>
		</table>

		<div class="box-paging">
			<a href="#"><i class="icon-first"><span class="hidden">ù������</span></i></a>
			<a href="#"><i class="icon-prev"><span class="hidden">����������</span></i></a>
			<a href="#" class="active">1</a>
			<a href="#">2</a>
			<a href="#">3</a>
			<a href="#">4</a>
			<a href="#">5</a>
			<a href="#">6</a>
			<a href="#"><i class="icon-next"><span class="hidden">����������</span></i></a>
			<a href="#"><i class="icon-last"><span class="hidden">������������</span></i></a>
		</div>
	</div>
</div>


<?
include '../common/footer.php';
?>