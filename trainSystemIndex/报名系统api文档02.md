## **1.  前台->个人用户报名**

* 接口格式常量：{{path('web_apply_presonal')}}
* 传参方式：**GET**
* 传入格式

```
{
    "personal": {
        "courseid": "111", 
        "cname": "XXXXXXXX123", 
        "gender": "w", 
        "idcard": "11010319921212782x", 
        "cphone": "15310978221", 
        "trainLocationId": "45", 
        "ifstay": "0"
        'vercode':123456,
        'captcha':asdfg
        
    }
}
```

* 传入参数说明：

|字段|类型|要求|说明|
|:----|:----|:----|:----|
|personal|array| | 个人报名数据结构体|
|courseid |int| 非空；长度大于1小于10|课程id|
|cname |string| 非空；长度大于1小于50|学员姓名|
|gender |string| 非空；长度1；(男m/女w)|学员性别|
|idcard |string| 非空；长度18|学员身份证信息|
|cphone |string| 非空；长度11|学员手机号|
|trainLocationId |int| 非空；长度大于1小于10|报名地点id|
|ifstay |int| 非空；长度1(住宿:1;不住宿0)|是否住宿|
|captcha|string|长度5|图片验证码(没有不传)|
|vercode|string|非空|手机验证码|

* 返回数据格式：json
* 返回格式例子如下：
* {"status":300,"sysmsg":"miss field courseid"}
* 具体说明：
* 返回数据中:
* status——返回状态码。状态如下。
* 200为成功，不成功的情况下sysmsg会有对应提示，成功sysmsg为空
* 301： 图片验证码错误
* 401：短信验证错误
* 返回参数：

* 接口返回字段具体含义说明

|字段|类型|意义|
|:----|:----|:----|
|status|string|状态码，200就是success.|
|sysmsg|string|错误信息，调试用，**不建议返回给用户|
|msg|string|中文提示,暂时只有301和401的错误返回中文提示|
|id|int|新增字段id|



## **2.  前台->企业报名**

* 接口格式常量：{{path('web_apply_company')}}
* 传参方式：**POST**
* 传入格式
* 

```
{
    "company": {
        "courseid": "111", 
        "pname": "XXXXXXXX123", 
        "address": "wasdasdasd", 
        "contant": "110103199011281823", 
        "pmphone": "15210968771", 
        "vercode": "123456", 
        "tel1": "1104", 
        "tel2": "88889999", 
        "tel3": "1231", 
        "trainLocationId": "45", 
        "ifstay": "0", 
        'vercode':123456,
        'captcha':asdfg,
        "personal": [
            {
                "cname": "XXXXXXXX123", 
                "gender": "w", 
                "jobid": "12", 
                "idcard": "110103199011281823", 
                "cphone": "15210968771"
            }
        ]
    }
}
```

* 传入参数说明：

|字段|类型|要求|说明|
|:----|:----|:----|:----|
|company|array| | 企业报名数据结构体|
|courseid |int| 非空；长度大于1小于10|课程id|
|pname |string| 非空；长度大于1小于100|企业名称|
|address |string| 非空；长度大于1小于200|企业地址|
|contant |string| 非空；长度大于1小于50|企业联系人姓名|
|pmphone |string| 非空；长度11|企业联系人手机|
|vercode|string|非空|手机验证码|
|captcha|string|长度5|图片验证码（没有不传）|
|tel1 |string|长度小于等于5|电话区号|
|tel2 |string|长度小于等于8|电话号|
|tel3 |string|长度小于等于6|电话分机号|
|trainLocationId |int| 非空；长度大于1小于10|报名地点id|
|ifstay |int| 非空；长度1(住宿:1;不住宿0)|是否住宿|
|personal|array| | 个人报名数据结构体|
|cname |string| 非空；长度大于1小于50|学员姓名|
|gender |string| 非空；长度1；(男m/女w)|学员性别|
|jobid |int| 非空；长度大于1小于10|职务id|
|idcard |string| 非空；长度18|学员身份证信息|
|cphone |string| 非空；长度11|学员手机号|


* 返回数据格式：json
* 返回格式例子如下：
* {"status":300,"sysmsg":"miss field courseid"}
* 具体说明：
* 返回数据中:
* status——返回状态码。状态如下。
* 200为成功，不成功的情况下sysmsg会有对应提示，成功sysmsg为空
* 301： 图片验证码错误
* 401：短信验证错误
* 返回参数：

* 接口返回字段具体含义说明

|字段|类型|意义|
|:----|:----|:----|
|status|string|状态码，200就是success.|
|sysmsg|string|错误信息，调试用，**不建议返回给用户|
|msg|string|中文提示,暂时只有301和401的错误返回中文提示|
|id|int|新增字段id|


## **3.  前台->图片验证码**

* URL:/apply/captcha
* 传参方式：**GET**
* 传入格式

```
{
        "phone": "13121801577",
}
```
* 传入参数说明：

|字段|类型|要求|说明|
|:----|:----|:----|:----|
|phone|int|非空，长度11|手机号,没有手机号，默认加载验证码|
|width|int|正整数,可以为空有默认状态|验证码长|
|height|int|正整数,可以为空有默认状态|验证码高|

* 返回数据格式：
* 手机验证出现三次错误 返回headers:'content-type', 'image/jpeg'
* 正常headers:'content-type', ''
* 注：手机短信验证未对接成功前验证码开启。

 
## **4.  后台->报名用户管理（列表）**

* 接口格式常量：{{path('admin_leaner_manage_index')}}
* 传参方式：**GET**
* 传入格式

```
{
        "registration_type": "company", 
        "searchkey": "XXXXXXXX123", 
        "pageIndex": 1, 
        "pageSize": 4, 

}
```
* 传入参数说明：

|字段|类型|要求|说明|
|:----|:----|:----|:----|
|registration_type|string|个人:presonal;企业:company;全部:null(默认)|报名类型筛选|
|searchkey |string| |模糊搜索|
|pageIndex |int|默认1 |从第几条数据开始调用(假设每页20条，第一页为0，第二页为20以此类推)|
|pageSize |int| 默认20|每页数据量|

* 返回数据格式：json
* 返回格式例子如下：

```
{
    "rowDatas": [
        {
            "serial_num": 1,
            "id": "28",
            "cname": "XXXXXXXX123",
            "gender": "男",
            "cphone": "15210968771",
            "registration_type": "企业",
            "pname": "公司abc",
            "tel": "  "
        },
        {
            "serial_num": 2,
            "id": "27",
            "cname": "XXXXXXXX123",
            "gender": "女",
            "cphone": "15210968771",
            "registration_type": "企业",
            "pname": "公司abc",
            "tel": "  "
        }
    ],
    "dataLength": 25,
    "errcode": 0
}
```
* 接口返回字段具体含义说明

|字段|类型|意义|
|:----|:----|:----|
|rowDatas|结构体||
|dataLength|int|数据总条数|
|errcode|int|错误代码，0是正常，暂时没有别的错误信息|
|serial_num|int|序列号|
|cname |string|学员姓名|
|gender |string|学员性别|
|cphone |string|学员手机号|
|pname |string|企业名称|
|tel |string|长度小于等于8|电话号|


## **5.  后台->报名用户查看**

* 接口格式常量：{{path('admin_leaner_manage_info')}}
* 传参方式：**PATH**
* 传入格式:
```
{{ path('admin_leaner_manage_info',{client_id:id) }}
ex:
{{ path('admin_leaner_manage_info',{client_id:3) }}
```
* 请求方式：**GET**
* 传入参数说明：

|字段|类型|要求|说明|
|:----|:----|:----|:----|
|client_id|int||传入列表接口返回值里面的id字段|


* 返回数据格式：json
* 返回格式例子如下：

```
[
    {
        "cname": "XXXXXXXX123",
        "gender": "w",
        "idcard": "110103199011281823",
        "cphone": "15210968771",
        "pname": "XXXXXXXX123",
        "tel1": null,
        "tel2": null,
        "tel3": null,
        "train_location_id": 45,
        "trainLocationName":"报名地点"
        "ifstay": "1",
        "id": 7
    }
]
```
###### 注意当id不存在的时候返回：[]
* 接口返回字段具体含义说明

|字段|类型|意义|
|:----|:----|:----|
|cname |string|学员姓名|
|gender |string |学员性别|
|idcard |string|学员身份证信息|
|cphone |string|学员手机号|
|train_location_id |int|报名地点id|
|trainLocationName |int|报名地点|
|ifstay |int|是否住宿(住宿:1;不住宿0)|
|pname |string|公司名称|
|tel1 |string|电话区号|
|tel2 |string|电话号|
|tel3 |string|电话分机号|
|id |int|ID号编辑的时候可以再传回来|
|courseTrainName |string|==培训课程名称==|
|courseid |int|==培训课程id==|


## **6.  后台->新增学员**

* 接口格式常量：{{path('admin_leaner_manage_create')}}
* 传参方式：**GET**
* 传入格式

```
{
    "personal": {
        "cname": "XXXXXXXX123", 
        "gender": "w", 
        "idcard": "110103199011281823", 
        "cphone": "15210968771", 
        "trainLocationId": "45", 
        "ifstay": "0", 
        "pname": "公司的名字"
    }
}
```

* 传入参数说明：

|字段|类型|要求|说明|
|:----|:----|:----|:----|
|personal|array| | 个人报名数据结构体|
|cname |string| 非空；长度大于1小于50|学员姓名|
|gender |string| 非空；长度1；(男m/女w)|学员性别|
|idcard |string| 非空；长度18|学员身份证信息|
|cphone |string| 非空；长度11|学员手机号|
|trainLocationId |int| 非空；长度大于1小于10|报名地点id|
|ifstay |int| 非空；长度1(住宿:1;不住宿0)|是否住宿|
|pname |string| 非空；长度大于1小于200|公司名称|
|tel1 |string|长度小于等于5|电话区号|
|tel2 |string|长度小于等于8|电话号|
|tel3 |string|长度小于等于6|电话分机号|

* 返回数据格式：json
* 返回格式例子如下：
```
{"status":200,"sysmsg":"","id":13}
```

* 接口返回字段具体含义说明

|字段|类型|意义|
|:----|:----|:----|
|status|string|状态码，200就是success|
|sysmsg|string|错误信息，调试用，**不建议返回给用户|
|id|int|新增字段id|

## **7.  后台->编辑学员**

* 接口格式常量：{{path('admin_leaner_manage_update')}}
* 传参方式：**GET**
* 传入格式

```
{
    "personal": {
        "id": "7",
        "cname": "oooooo",
        "gender": "w",
        "idcard": "110103199011281823",
        "cphone": "15210968771",
        "trainLocationId": "45",
        "ifstay": "0",
        "vercode": "123456",
        "pname": "公司的名字",
        "tel1": "1010",
        "tel2": "88889999",
        "tel3": "6789"
    }
}
```

* 传入参数说明：

|字段|类型|要求|说明|
|:----|:----|:----|:----|
|personal|array| | 个人报名数据结构体|
|id |int| 非空；长度大于1小于10|要编辑的数据id|
|cname |string| 非空；长度大于1小于50|学员姓名|
|gender |string| 非空；长度1；(男m/女w)|学员性别|
|idcard |string| 非空；长度18|学员身份证信息|
|cphone |string| 非空；长度11|学员手机号|
|trainLocationId |int| 非空；长度大于1小于10|报名地点id|
|ifstay |int| 非空；长度1(住宿:1;不住宿0)|是否住宿|
|pname |string| 非空；长度大于1小于200|公司名称|
|tel1 |string|长度小于等于5|电话区号|
|tel2 |string|长度小于等于8|电话号|
|tel3 |string|长度小于等于6|电话分机号|

* 返回数据格式：json
* 返回格式例子如下：
```
{"status":200,"sysmsg":"","id":13}
```

* 接口返回字段具体含义说明

|字段|类型|意义|
|:----|:----|:----|
|status|string|状态码，200就是success|
|sysmsg|string|错误信息，调试用，**不建议返回给用户|
|id|int|新增字段id|


## **8.  后台->批量删除学员**

* 接口格式常量：{{path('admin_leaner_manage_del')}}
* 传参方式：**GET**
* 传入格式

```
{
    "client_id_arr": [
        "4",
        "5"
    ]
}
```

* 传入参数说明：

|字段|类型|要求|说明|
|:----|:----|:----|:----|
|client_id_arr|array| |结构体包含要删除的数据id |

* 返回数据格式：json
* 返回格式例子如下：
```
[
    {
        "status": 101,
        "sysmsg": "not found",
        "id": "4"
    },
    {
        "status": 200,
        "sysmsg": "",
        "id": "5"
    }
]
```

* 接口返回字段具体含义说明

|字段|类型|意义|
|:----|:----|:----|
|status|string|状态码，200就是success|
|sysmsg|string|错误信息，调试用，**不建议返回给用户|
|id|int|删除的id|

## **9.  后台->导出学员**

* 接口格式常量：{{path('admin_leaner_create_excel')}}
* 测试路由：/leaner/create/excel 直接访问可输出测试使用，路由可呢会变更的
* 传参方式：**GET**
* 传入格式

```
{
    "client_id_arr": [
        "4",
        "5"
    ]
}
```

* 传入参数说明：

|字段|类型|要求|说明|
|:----|:----|:----|:----|
|client_id_arr|array| |结构体包含要删除的数据id |

* 返回数据格式：excel文件
* 

## **10.   报名时间地点选择 **
* 接口格式常量：{{path('web_apply_address_time_select')}}
* 传参方式：**path**
* 传入格式

```
{{ path('web_apply_address_time_select',{courseid:id) }}
ex:
{{ path('web_apply_address_time_select',{courseid:1) }}
```
* 传入参数说明：

|字段|类型|要求|说明|
|:----|:----|:----|:----|
|courseid|int||课程id,前台按照课程id选择，后台courseid=0|


* 返回数据格式：json
* 返回格式例子如下：（这就是一个下拉框）

```
[{
	"train_location_id": "1",
	"address_time_name": "test(datename)"
}]
```
###### 后台courseid=0,返回全量
* 接口返回字段具体含义说明

|字段|类型|意义|
|:----|:----|:----|
|train_location_id |int|课程培训时间地点id（创建编辑接口都返回这个id值）|
|address_time_name |string |课程培训时间地点（下来框的内容）|


## **11.   报名职务选择 **
* 接口格式常量：{{path('web_apply_job_select')}}
* 传参方式：null
* 传入格式:null
* 传入参数说明：null
* 返回数据格式：json
* 返回格式例子如下：

```
[{
	"jobid": 3,
	"jobname": "网管"
}, {
	"jobid": 2,
	"jobname": "经理"
}, {
	"jobid": 1,
	"jobname": "职员"
}]
```
* 接口返回字段具体含义说明

|字段|类型|意义|
|:----|:----|:----|
|jobid |int|企业报名时选择的职务id，创建编辑接口都返回这个id值|
|jobname|string |职务名称|


## **12.   后台用户管理-新增学员-课程选择下拉框 **

* html文件路径：无html页面
* 路由常量：{{ path('trainsystem_admin_leaner_Select') }}
* 测试路由：/admin/leaner/select
* 

* 请求方式：**GET**
* 传入参数：无

* 返回数据格式：json
* 返回格式例子如下：

```
{
	"133": {
		"courseTrainName": "xxx",
		"select": [{
			"train_location_id": "134",
			"address_time_name": "北京市(09月24日全天报名)"
		},{
			"train_location_id": "143",
			"address_time_name": "北京市(09月29日全天报名)"
		}]
	},
}
```

* 接口返回字段具体含义说明

|字段|类型|意义|
|:----|:----|:----|
|courseTrainName|string|报名课程名称（报名课程下拉框显示的名称）|
|courseid|int|报名课程id|
|select|array|培训地点下拉框结构体|
||||
|address_time_name|int|培训地点名称（下拉框显示的名称）|
|train_location_id|int|培训地点id(编辑添加等操作的返回值)|
