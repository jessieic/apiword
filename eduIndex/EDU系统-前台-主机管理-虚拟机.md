## **1.  虚拟机列表页面**

* URL: /ostvm/index/{courseId}
* 接口格式常量：{{path('os_teacher_vm_index')}}
* method：GET
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|courseId |URL |integer|课程id |

###### Response:
* 返回格式：HTMl页面


## **2.  虚拟机列表数据**

* URL: /ostvm/list/{courseId}
* 接口格式常量：{{path('os_teacher_vm_list')}}
* method：GET
###### Request：
    
    |Name|In|type|Description|
    |:----|:----|:----|:----|
    |courseId |URL |integer|课程id |
    |serversname |body |string|虚拟机名 |

###### Response:
    
* 返回格式:Json
* ex:
```
[
    {
        "id": "128",
        "server_id": "7d400014-464d-42ba-96dd-287fe4100b03",
        "name": "ppp",
        "publishrole": "new",
        "userid": "1",
        "courseid": "256",
        "image_id": "27be735d-4ded-4cd8-965f-3bc6675c4d74",
        "network": "f280e4db-35dc-4e88-8921-6d0be6c2c296",
        "disk": "20GB",
        "sysname": "windows",
        "bit": "x64",
        "version": " server 2003 ",
        "createtime": "2018-06-14 14:45",
        "flavor_id": "daeeba63-9d9e-4229-9519-da86f36be4b0",
        "publish_id": null,
        "ram": "2GB",
        "vcpus": "1",
        "net_style": "",
        "ip": "10.1.1.33",
        "nickname": "62admin",
        "roles": " 学员 教师 超级管理员 ",
        "employeeNumStudentId": "XXX",
        "group_id": null,
        "role": "独立主机",
        "imgname": "weixin",
        "status": "ACTIVE",
        "task": "",
        "btn": "7d400014-464d-42ba-96dd-287fe4100b03",
        "vmstatus": "运行中"
    }
]
```
* 说明:

    |Name|In|type|Description|
    |:----|:----|:----|:----|
    |id| body | integer |序列号|
    |server_id| body | string |虚拟机唯一识别码|
    |name| body | string |虚拟机名|
    |publishrole| body | string |虚拟机角色(published,new,running)|
    |userid| body | integer |用户id|
    |courseid| body | integer |课程id|
    |image_id| body | string |镜像识别码|
    |network| body | string |网络识别码|
    |disk| body | string |硬盘配置|
    |sysname| body | string |系统名|
    |bit| body | string |系统位数|
    |version| body | string | 系统版本 |
    |createtime| body | string |创建时间|
    |flavor_id| body | string |主机类型识别码|
    |publish_id|body | string |（停用）|
    |ram| body | string |内存配置|
    |vcpus| body | integer |cpu配置|
    |net_style| body | string |（停用）|
    |ip| body | string |ip|
    |nickname| body | string |用户昵称|
    |roles| body | string | 用户角色 |
    |employeeNumStudentId| body | string |用户工号|
    |group_id| body | string |（停用）|
    |role| body | string |虚拟机角色(独立主机,学生端,功能机)|
    |imgname| body | string |镜像名|
    |status| body | string |虚拟机状态|
    |task| body | string |虚拟机任务状态|
    |btn| body | string |（停用）|
    |vmstatus| body | string |虚拟机状态（中文）|

## **3.  新建虚拟机页面**

* URL: /ostvm/createview/{courseId}
* 接口格式常量：{{path('os_teacher_vm_createview')}}
* method：GET
###### Request：
    
    |Name|In|type|Description|
    |:----|:----|:----|:----|
    |courseId |URL |integer|课程id |

###### Response:
    
* 返回格式：HTMl页面         

## **4.  虚拟机新建**

* URL: /ostvm/create/{courseId}
* 接口格式常量：{{path('os_teacher_vm_create')}}
* method：GET
###### Request：
    
    |Name|In|type|Description|
    |:----|:----|:----|:----|
    |courseId |URL |integer|课程id |
    |hash|body |string| hash值|
    |label|body |string| 名字|
    |mbid|body |string| 主机类型id|
    |system|body |string| 系统 |
    |xt|body |string| 版本位数 |
    |version|body |string| 系统版本id |

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
    
## **5.  虚拟机重建**

* URL: /ostvm/vmrecreate
* 接口格式常量：{{path('os_teacher_vm_recreate')}}
* method：GET
###### Request：
    
    |Name|In|type|Description|
    |:----|:----|:----|:----|
    |servermark| body | string |虚拟机唯一识别码|

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


    
## **6.  虚拟机重启**

* URL: /ostvm/vmreboot
* 接口格式常量：{{path('os_teacher_vm_reboot')}}
* method：GET
###### Request：
    
    |Name|In|type|Description|
    |:----|:----|:----|:----|
    |servermark| body | string |虚拟机唯一识别码|
    |type|body |string| 重启类型，HARD：硬重启；SOFT：软重启|

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


## **7.  虚拟机删除**

* URL: /ostvm/vmdel
* 接口格式常量：{{path('os_teacher_vm_delete')}}
* method：GET
###### Request：
    
    |Name|In|type|Description|
    |:----|:----|:----|:----|
    |servermark| body | string |虚拟机唯一识别码|

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
    |id |body |string|返回删除的虚拟机id |
    |status |body |string|状态码(参照状态码表) |
    |msg |body |string|返回结果，信息提示|  
    
## **8.  虚拟机运行界面**

* URL: /ostvm/vmview/{serverid}
* 接口格式常量：{{path('os_teacher_vm_view')}}
* method：GET
###### Request：
    
    |Name|In|type|Description|
    |:----|:----|:----|:----|
    |courseId |URL |integer|课程id |

###### Response:
* 返回格式：HTMl页面  
* 
    
## **9.  虚拟机关机**

* URL: /ostvm/vmpoff
* 接口格式常量：{{path('os_teacher_vm_vmpoff')}}
* method：GET
###### Request：
    
    |Name|In|type|Description|
    |:----|:----|:----|:----|
    |servermark| body | string |虚拟机唯一识别码|

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
    |id |body |string|返回删除的虚拟机id |
    |status |body |string|状态码(参照状态码表) |
    |msg |body |string|返回结果，信息提示|  
    
## **10.  虚拟机创建镜像**

* URL: /ostvm/vmpublish
* 接口格式常量：{{path('os_teacher_vm_publish')}}
* method：GET


###### Request：
    
    |Name|In|type|Description|
    |:----|:----|:----|:----|
    |servermark| body | string |虚拟机唯一识别码|
    |courseid| body | string |课程id|


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
    |id |body |string| 创建镜像的虚拟机id |
    |status |body |string|状态码(参照状态码表) |
    |msg |body |string|返回结果，信息提示|  
    
    
  
> 未完成



|状态码|状态|
|:----|:----|
|200|success|
|101|openstack接口类有错误|
|300|输入验证报错|
|400|权限判断类|


> 2018/06 随喜感恩