## **1.  登录账号信息接口**

* URL: /examination/user/info
* 接口格式常量：{{path('examination_system_user_info')}}
* method：GET
###### Request：


###### Response:

* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response": [
        ["cname"]:"账号11"
        ["gender"]:"m"
        ["cphone"]:"15210968333"
        ["idcard"]:"230811200005151388"
        ["pname"]:""
        ["address"]:""
        ["telAreaCode"]:""
        ["telephone"]:""
        ["extensionNumber"]:""
      ]
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|response |body |string|返回数据,数组允许为空|
|cname |response |string|学员姓名|
|gender |response |string|学员性别 男m/女w/未知n|
|cphone |response |string|学员手机号码|
|cemail |response |string|学员邮箱|
|idcard |response |string|学员身份证号码|
|pname |response |string|学员公司名称|
|address |response |string|学员公司地址|
|telAreaCode |response |string|公司电话区号|
|telephone |response |string|公司电话号|
|extensionNumber |response |string|公司分机号|


## **2.  修改登录账号密码接口**

* URL: /examination/user/checkpassword
* 接口格式常量：{{path('examination_system_user_check_password')}}
* method：POST
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
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

## **3.  登录账号信息修改接口**

* URL: /examination/user/update
* 接口格式常量：{{path('examination_system_user_update')}}
* method：POST
###### Request：
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|response |body |string|返回数据,数组允许为空|
|cphone |body |string|学员手机号码|
|cemail |body |string|学员邮箱|
|idcard |body |string|学员身份证号码|
|pname |body |string|学员公司名称|
|telAreaCode |body |string|公司电话区号|
|telephone |body |string|公司电话号|
|extensionNumber |body |string|公司分机号|


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

|状态码|状态|
|:----|:----|
|200|success|
|400|错误|