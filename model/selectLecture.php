<?php
session_start();
?>
<?php
include_once 'DBconfig.php';
?>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/plugins/bxslider/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/plugins/bxslider/bxslider.js"></script>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/ui.js"></script>
<!--[if lte IE 9]> <script src="/js/common/place_holder.js"></script> <![endif]-->



<?php
/*�з� ���̺� ��������*/

$sql= "SELECT * FROM category;";
$data = mysql_query($sql);


/*�з�*/
/*print_r($data[0]);
/*���Ǹ�*/
/*print_r($data[1]);*/
?>
