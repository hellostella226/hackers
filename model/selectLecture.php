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
/*분류 테이블 가져오기*/

$sql= "SELECT * FROM category;";
$data = mysql_query($sql);


/*분류*/
/*print_r($data[0]);
/*강의명*/
/*print_r($data[1]);*/
?>
