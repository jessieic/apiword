##测试获取登录账号的cookies



## **1. 获取验证码内容接口**

* URL: /getCaptchaNum
* 接口格式常量：{{path('trainsystem_login_get_captcha')}}
* method：GET

###### Response:

* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response":
    {"captchaNum":"xwn2s"}
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|response |body |array|返回数据,数组允许为空|
|captchaNum |body |string|验证码内容|



## **2. 获取scrfToken内容接口**

* URL: /getScrfToken
* 接口格式常量：{{path('trainsystem_login_get_scrftoken')}}
* method：GET

###### Response:

* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response":
    {"ScrfToken":"jCSJqoVBLhoSpuRTsGNpp5pl6y6LtQf9BR0II9XJryU"}}
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|response |body |array|返回数据,数组允许为空|
|ScrfToken |body |string|scrfToken内容|




## **3. 获取登录cookies内容接口(读取返回的cookies)**

* URL: /login_check
* 接口格式常量：{{path('login_check')}}
* method：POST
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|captcha_num |body |string|验证码(根据接口1获取)|
|_csrf_token |body |string|scrfToken(根据接口2获取) |
|_target_path |body |string|跳转的url(输入值为：/admin/leaner/indexview) |
|_password |body |string|密码 |
|_username |body |string|账号 |

###### Response:

* 读取返回的cookies


* 返回格式:html
* 登录错误ex:

```
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="1;url=/login" />

        <title>Redirecting to /login</title>
    </head>
    <body>
        Redirecting to <a href="/login">/login</a>.
    </body>
</html>
```
* 登录成功ex:

```
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="1;url=/login" />

        <title>Redirecting to /admin/leaner/indexview</title>
    </head>
    <body>
        Redirecting to <a href="/admin/leaner/indexview">/login</a>.
    </body>
</html>
```




