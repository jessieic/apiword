## **1.  admin后台登录验证码接口**

* URL: /captchaNum
* 接口格式常量：{{path('login_captcha')}}
* method：GET
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|


###### Response:

* 返回格式:IMG
* ex:

## **2.  考核前台登录界面验证码接口**

* URL: /captchaNum/exam
* 接口格式常量：{{path('login_captcha_exam')}}
* method：GET
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|


###### Response:

* 返回格式:IMG
* ex:


## **3.  考核前台登录界面验证码 验证接口**

* URL: /checkCaptca/exam
* 接口格式常量：{{path('login_checkCaptca_exam')}}
* method：POST
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|captcha_num |body |string|验证码 |



###### Response:

* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response": []
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|response |body |string|返回数据,数组允许为空|



## **4.  邮箱找回密码验证码接口**

* URL: /captchaNum/email
* 接口格式常量：{{path('login_captcha_email')}}
* method：GET
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|


###### Response:

* 返回格式:IMG
* ex:


## **5.  考核前台登录界面验证码 验证接口**

* URL: /checkCaptcha/email
* 接口格式常量：{{path('login_checkCaptcha_email')}}
* method：POST
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|captcha_num_email |body |string|验证码 |



###### Response:

* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response": []
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|response |body |string|返回数据,数组允许为空|



## **6.  发送短信验证码接口**

* URL: /forgetpass/mobileverify
* 接口格式常量：{{path('forget_password_mobileVerify')}}
* method：POST
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|mobile |body |integer|手机号码 |

###### Response:

* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response": []
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|response |body |string|返回数据,数组允许为空|


## **7.  验证手机短信验证码接口**

* URL: /forgetpass/check/mobileverify
* 接口格式常量：{{path('forget_password_check_mobileVerify')}}
* method：POST
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|mobile |body |integer|手机号码 |
|verify |body |integer|手机短信验证码 |

###### Response:

* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response": []
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|response |body |string|返回数据,数组允许为空|





## **8. 发送找回密码邮件**

* URL: /forgetpass/emailsend
* 接口格式常量：{{path('forget_password_email_send')}}
* method：POST
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|email |body |string|邮箱 |
|captcha_num_email |body |string|验证码 |

###### Response:

* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response": []
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|response |body |string|返回数据,数组允许为空|




## **9.  找回密码密码接口（未登录账号）**

* URL: /forgetpass/check/password
* 接口格式常量：{{path('forget_password_check_password')}}
* method：POST
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|type |body |string|mobile/email |
|mobile |body |integer|手机号码 type为mobile时字段不可为空 |
|token |body |string|邮箱的token   type为email时字段不可为空 |
|newPassword |body |string|新密码 |
|confirmPassword |body |string|确认密码 |

###### Response:

* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response": []
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|response |body |string|返回数据,数组允许为空|







|状态码|状态|
|:----|:----|
|200|success|
|400|错误|