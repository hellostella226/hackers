<table border="0" cellpadding="0" cellspacing="0" class="tbl-bbs">
    <caption class="hidden">�����ı�</caption>
    <colgroup>
        <col style="width:8%"/>
        <col style="width:8%"/>
        <col style="*"/>
        <col style="width:15%"/>
        <col style="width:12%"/>
        <col style="width:12%"/>
    </colgroup>

    <thead>
    <tr>
        <th scope="col">��ȣ</th>
        <th scope="col">�з�</th>
        <th scope="col">����</th>
        <th scope="col">���¸�����</th>
        <th scope="col">��ȸ��</th>
        <th scope="col">�ۼ���</th>
    </tr>
    </thead>

    <tbody id="reviewList">
    <? while($row = mysql_fetch_array($result2)) { ?>
        <tr class='bbs-sbj'>
            <td><?=$row['reviewNo']?></td>
            <td><?=$row['cateName']?></td>
            <td>
                <!--ī��Ʈ-->
                <a href="./reviewDetail.php?reviewNo=<?=$row['reviewNo']?>">
                    <span class="tc-gray ellipsis_line"><?=$row['lecName']?></span>
                    <strong class="ellipsis_line"><?=$row['title']?></strong>
                </a>
            </td>
            <td>
                            <span class="star-rating">
                               <span class="star-inner" style="width:<?=$row['starChk']?>%"></span>
                            </span>
            </td>
            <td><?=$row['lecCnt']?></td>
            <td class="last"><?=$row['userName']?></td>
        </tr>
    <? } ?>
    </tbody>

</table>