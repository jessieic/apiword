<?php
/**
 * Created by PhpStorm.
 * User: rising
 * Date: 2018/6/22
 * Time: 14:46
 */

$trainSystemIndex = array(
    array('file'=>'trainSystemIndex/报名系统后台的测试计划.doc', 'title'=>'报名系统后台的测试计划.doc'),
    array('file'=>'trainSystemIndex/后台报名系统的测试报告.doc', 'title'=>'后台报名系统的测试报告.doc'),
    array('file'=>'trainSystemIndex/瑞星安全教育培训后台系统测试用例.xlsx', 'title'=>'瑞星安全教育培训后台系统测试用例.xlsx'),
);
$htmlUrlArr = array(
    'testFile'=>$trainSystemIndex,
);

$mdFile = $_GET['type'];
$htmlUrlInfo = $htmlUrlArr[$_GET['type']];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<?php
$info = '';
if(!empty($htmlUrlInfo) && is_array($htmlUrlInfo)){
    foreach($htmlUrlInfo as $urlKey => $urlVal){
        $info .= '<h3><a href="'.$_GET['type'].'/'.$urlVal['file'].'">'.$urlVal['title'].'</a></h3>';
    }
}
echo $info;
?>
</body>
</html>
