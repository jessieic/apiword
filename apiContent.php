<?php
/**
 * Created by PhpStorm.
 * User: rising
 * Date: 2018/6/22
 * Time: 14:46
 */
require_once __DIR__ . '/Parser.php';
$mdFile = $_GET['file'];
$parser = new HyperDown\Parser;
$dir = __DIR__ .'/'.$_GET['type'].'/'.$mdFile;
if(!strchr($mdFile,'.html')){
    $dir = $dir.'.md';
}
$html = '';
$preCon = '';
if(file_exists($dir)){
    $text = file_get_contents($dir);
    if(!strchr($mdFile,'.html')){
        $html .= $parser->makeHtml($text);
    }
    if(strchr($mdFile,'.html')){
        $html .= $text;
    }

}else{
    $html .= '<div>api文档不存在</div>';
}
if($mdFile == 'trainSystem'){
    $preCon = '<pre>
    数据返回格式json
    数据接收格式json
    <div style="color:red">
        特殊标明的数据返回格式object
        特殊标明的数据接收格式object
    </div>
    数据返回格式:
       失败:
        [
            {
            "code": 400,    除去200其他的都是异常情况
            "message": "",
            "response": [ ]
            }
        ]
       成功:
          []
       或者返回json数据
        [
            {
            "code": 200,
            "message": "",
            "response": [ ]
            }
        ]
</pre>';
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="icon" href="./favicon.ico" type="image/x-icon" />
    <title>mdToHtml</title>
    <link rel="stylesheet" media="all" href="./css/application.css">
    <link rel="stylesheet" media="all" href="./css/print.css">

</head>
<body>

    <div style="position:fixed; z-index:1;"><h3><a href="./index.html">     返回></a></h3></div>
    <div style="width:1000px;  margin-left: auto; margin-right: auto; margin-top: 80px; margin-bottom: 80px" class="wiki issue-realtime-trigger-pulse">
        <?php
        echo $preCon
        ?>
        <?php
        echo $html
        ?>
    </div>
</body>
</html>
