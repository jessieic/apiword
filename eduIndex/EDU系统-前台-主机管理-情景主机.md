## **1.  情景主机列表页面**

* URL: /ostgroup/indexview/{courseId}
* 接口格式常量：{{path('os_teacher_group_indexview', {courseId:course.id})}}
* method：GET
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|courseId |URL |integer|课程id |

###### Response:
* 返回格式：HTMl页面


## **2.  情景主机列表数据**

* URL: /ostgroup/list/{courseId}
* 接口格式常量：{{path('os_teacher_group_list'), {courseId:course.id}}}
*  ==ip字段常量：{{ ipused }} ==
* method：GET
###### Request：
    
    |Name|In|type|Description|
    |:----|:----|:----|:----|
    |courseId |URL |integer |课程id |
    |groupname |body |string |情景主机名 |

###### Response:
    
* 返回格式:Json
* ex:
```
[
    {
        "group_id":"fcbd55eac1ffcc2fbd33588341ee9afd",
        "groupname":"XXXXX",
        "createtime":"2018-06-22 13:01",
        "usedip":"172.16.0.2",
        "groupstatus":"已关机",
        "sernum":1,
        "resourse_info":[
            {
                "group_id":"fcbd55eac1ffcc2fbd33588341ee9afd",
                "freename":"Lession12",
                "usedip":"172.16.0.254",
                "note":"HTTP"
            }
        ]
    },
    {
        "group_id":"bdfbd7d08de3b6bd0b4bad61ab8dad4f",
        "groupname":"Lession254",
        "createtime":"2018-06-12 16:33",
        "usedip":null,
        "groupstatus":"已关机",
        "sernum":0,
        "resourse_info":[

        ]
    }
]
```
* 说明:

    |Name|In|type|Description|
    |:----|:----|:----|:----|
    |id| body | integer |序列号|
    |groupname| body | string |情景主机名|
    |createtime| body | string |创建时间|
    |usedip| body | string |学生主机ip |
    |groupstatus|body | string | 情景主机状态 |
    |sernum| body | string |功能主机数量|
    |resourse_info| body | string |功能主机信息结构体|
    |group_id| body | string |情景主机唯一识别码 |
    |freename| body | string |功能主机名字|
    |usedip| body | string |功能主机ip|
    |note| body | string |功能主机标签|

## **3.  新建情景主机页面**

* URL:  /ostgroup/createview/{courseId}
* 接口格式常量：{{path('os_teacher_group_createview', {courseId:course.id})}}
* ==ip字段常量：{{ ipused }} ==
* method：GET
###### Request：
    
    |Name|In|type|Description|
    |:----|:----|:----|:----|
    |courseId |URL |integer|课程id |

###### Response:
    
* 返回格式：HTMl页面         

## **4.  情景主机新建**

* URL: /ostvm/create/{courseId}
* 接口格式常量：{{path('os_teacher_group_create'), {courseId:course.id}}}
* method：POST

###### Request：
* ex:
```
{
    "hash": "asdfhaklsjfasdfl",
    "groupname": "groupname",
    "virid": [
        {
            "imgid": "f5187f77-0e10-4e24-9fa4-a9596b55196f",
            "ip": "2",
            "note": "FTP"
        },
        {
            "imgid": "224aefbb-22cd-42a6-9565-d39d7c92adf3",
            "ip": "254",
            "note": "HTTP"
        }
    ],
}
```
* 说明:

    |Name|In|type|Description|
    |:----|:----|:----|:----|
    |courseId |URL |integer|课程id,参数在路径中，不用ajax再提交 |
    |hash|body |string| hash值|
    |groupname|body |string| 情景主机名（not null）|
    |virid|body |string| 镜像信息结构体，学生主机请第一个提交 |
    |imgid|body |string| 镜像列表（按页面顺序提交，not null，不重复）|
    |ip|body |string| ip列表[3-254]（按页面顺序提交，not null，不重复）|
    |note|body |string| 镜像标签列表，学生主机标签默认client,not null |

###### Response:
    
* 返回格式:Json
* ex:

```
{
    "status": 200,
    "msg": "操作成功"
}
```
* 说明:

    |Name|In|type|Description|
    |:----|:----|:----|:----|
    |status |body |string|状态码(参照状态码表) |
    |msg |body |string|返回信息提示|
    

## **5.  查看情景主机页面**

* URL:  /ostgroup/infoview/{courseId}/{group_id}
* 接口格式常量：{{path('os_teacher_group_infoview', {courseId:course.id,group_id:''})}
* 常量注释在页面上了
* method：GET
###### Request：
    
    |Name|In|type|Description|
    |:----|:----|:----|:----|
    |courseId|URL |integer|课程id |
    |group_id|URL | string |情景主机唯一识别码 |

###### Response:
    
* 返回格式：HTMl页面 

## **6.  解除情景主机与工作流的情景组合**

* URL: /ostgroup/delpm
* 接口格式常量：{{path('os_teacher_group_delpm')}}
* method：GET
###### Request：
    
    |Name|In|type|Description|
    |:----|:----|:----|:----|
    |group_id| body | string |情景主机唯一识别码|

###### Response:
    
* 返回格式:Json
* ex:

```
{
    "status": 200,
    "msg": "操作成功"
}
```
* 说明:

    |Name|In|type|Description|
    |:----|:----|:----|:----|
    |status |body |string|状态码(参照状态码表) |
    |msg |body |string|返回结果，信息提示|  


## **7.  删除情景主机**

* URL: /ostgroup/delgroup
* 接口格式常量：{{path('os_teacher_group_delgroup')}}
* method：GET
###### Request：
    
    |Name|In|type|Description|
    |:----|:----|:----|:----|
    |group_id| body | string |情景主机唯一识别码|

###### Response:
    
* 返回格式:Json
* ex:

```
{
    "status": 200,
    "msg": "操作成功"
}
```
* 说明:

    |Name|In|type|Description|
    |:----|:----|:----|:----|
    |status |body |string|状态码(参照状态码表) |
    |msg |body |string|返回结果，信息提示|  
    
    
## **8.  删除情景主机的测试运行主机**

* URL: /ostgroup/delrunninggroup
* 接口格式常量：{{path('os_teacher_group_delrunninggroup')}}
* method：GET
###### Request：
    
    |Name|In|type|Description|
    |:----|:----|:----|:----|
    |group_id| body | string |情景主机唯一识别码|

###### Response:
    
* 返回格式:Json
* ex:

```
{
    "status": 200,
    "msg": "操作成功"
}
```
* 说明:

    |Name|In|type|Description|
    |:----|:----|:----|:----|
    |status |body |string|状态码(参照状态码表) |
    |msg |body |string|返回结果，信息提示|
    

## **9.  情景主机列表页面**

* URL: /ostgroup/view/{courseId}/{group_id}
* 接口格式常量：{{path('os_teacher_group_view'), {courseId:course.id,group_id:''}}}
* method：GET
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|courseId |URL |integer|课程id |
|group_id| URL | string |情景主机唯一识别码|

###### Response:
* 返回格式：HTMl页面



> 2018/06 随喜感恩


