<?php
/**
 * Created by PhpStorm.
 * User: rising
 * Date: 2018/6/26
 * Time: 16:53
 */

$url_file = 'http://study.rising.com.cn:8080/config_files_user/public_html/files/task/5366423445b19f832495410045764457/111.docx';
$curl = curl_init($url_file);
// 不取回数据
curl_setopt($curl, CURLOPT_NOBODY, true);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET'); // 发送请求
$result = curl_exec($curl);
$found = false; // 如果请求发送失败
if ($result !== false) {
    /** 再检查http响应码是否为200 */
    $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if ($statusCode == 200) {
        $found = true;
    }
}

curl_close($curl);
var_dump($result);
var_dump($found);



$apiFileDr = './apiWord.html';
$info = file_get_contents($apiFileDr);

$prg = '/<data class="info">(.*?)<\/data>/ies';


preg_match_all($prg, $info, $apiArr);
$resultDes = array();
foreach($apiArr[0] as $apiVal){
    $search = array('<data class="info">','</data>','<div style="color:red">','</div>','数据返回格式object','数据接收格式object');
    $replace = array('','','','','','');
    $infoCon = str_replace($search, $replace, $apiVal);
    $resultExplode = explode('----result-----',$infoCon);
    $description = array();
    $strApiArr = explode(PHP_EOL,$resultExplode[0] );
    foreach($strApiArr as $apiVal){
        $strInfo = str_replace(' ','',$apiVal);
        if(!empty($strInfo)){
            $valStr = explode(':',$strInfo);
            $arrInfo['str'] = $valStr[0];
            $arrInfo['val'] = empty($valStr[1])?'':$valStr[1];
            $description[] = $arrInfo;
        }
    }
    $resultDes[] = $description;
}

var_dump($resultDes);

//返回字段：
//var_dump($resultExplode[1]);
//$searchEx = array(PHP_EOL,' ');
//$replaceEx = array('','');
//$resultExplode[1] = str_replace($searchEx,$replaceEx, $resultExplode[1] );
//var_dump( $resultExplode[1]);
////var_dump($description);
//var_dump(json_decode($resultExplode[1]));
