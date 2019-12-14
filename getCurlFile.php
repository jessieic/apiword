<?php
/**
 * Created by PhpStorm.
 * User: rising
 * Date: 2018/7/16
 * Time: 10:22
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

