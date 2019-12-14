## **1.  虚拟机初始化**

* URL:/osgview/gclone
* 接口格式常量：{{path('openstack_common_g_clone')}}
* 传参方式：post 或 get
* 传入参数：

|参数|意义|
|:----|:----|
|gtuuid | 界面上虚拟机组id |
|marker | 课程情景id（测试运行界面为testing） |


* 返回数据格式：json{status:状态码,response:数据}
* 返回格式例子如下：
* {"status":200,"gnuuid":"e13c89d817134ea720df5044a992fb67","serverlist":["0d032181-0600-452d-a8e2-cf96a3b3f892"],"count":1,"if_cache":true,"msg":""}
* 具体说明：
* 返回数据中:
* Status——返回状态码。状态如下。（只有200情况下的值可用，不成功的情况下msg会有对应提示，成功msg为空）
* 返回参数：
    
|状态码|状态|
|:----|:----|
|200|success|
|400|没有获取到有效参数，或者没有该虚拟机的使用权限|
|101|openstack接口接口返回失败|

* 接口返回字段具体含义说明

|字段|类型|意义|
|:----|:----|:----|
|status|string|状态码|
|gnuuid|string|克隆出来的虚拟机组的id|
|serverlist|array|克隆出来的虚拟机id|
|count|int|组内虚拟机的数量|
|msg|string|错误提示，成功msg为空|
|if_cache|boolean|镜像已被缓存：true，没有缓存：false|



## **2.  虚拟机初始化进度条**

* URL:/osgview/gperpare
* 接口格式常量：{{path('openstack_common_g_perpare')}}
* 传参方式：post 或 get
* 传入参数：

|参数|意义|
|:----|:----|
|gtuuid | 界面上虚拟机组id |
|gnuuid | 第一个接口返回的 |
|server_id | 由第一个接口返回的serverlist中 |

* 返回数据格式：json{status:状态码,response:数据}
* 返回格式例子如下：
* {"status":200,"msg":""}
* 具体说明：
* 返回数据中:
* Status——返回状态码。状态如下。（只有200情况下的值可用，不成功的情况下msg会有对应提示，成功msg为空）
* 返回参数：
    
|状态码|状态|
|:----|:----|
|200|success：找到并且虚拟机状态是active|
|400|没有获取到有效参数，或者没有该虚拟机的使用权限|
|300|没有找到配置资源,请求的组里面没有这台虚拟机|
|101|虚拟机状态是错误的（else）|
|**102**|**虚拟机状态是正在构建中（building**）|

* 接口返回字段具体含义说明

|字段|类型|意义|
|:----|:----|:----|
|status|string|状态码|
|msg|string|错误提示，成功msg为空|
|server|string|接口调试用字段（停用）|

## **3.  虚拟机启动进度条**

* URL:/osgview/gstart
* 接口格式常量：{{path('openstack_common_g_start')}}
* 传参方式：post 或 get
* 传入参数：

|参数|意义|
|:----|:----|
|gtuuid | 界面上虚拟机组id |
|gnuuid | 第一个接口返回的 |
|server_id | 由第一个接口返回的serverlist中 |

* 返回数据格式：json{status:状态码,response:数据}
* 返回格式例子如下：
* {"status":200,"vm_status":"ACTIVE","msg":""}
* 具体说明：
* 返回数据中:
* Status——返回状态码。状态如下。（只有200情况下的值可用，不成功的情况下msg会有对应提示，成功msg为空）
* 返回参数：
    
|状态码|状态|
|:----|:----|
|200|success|
|400|没有获取到有效参数，或者没有该虚拟机的使用权限|
|101|openstack接口接口返回失败|

* 接口返回字段具体含义说明

|字段|类型|意义|
|:----|:----|:----|
|status|string|状态码|
|msg|string|错误提示，成功msg为空|
|vm_status|string|虚拟机的状态（方便调试用）|

## **4.  虚拟机连接服务器**

* URL:/osgview/gconnent
* 接口格式常量：{{path('openstack_common_g_connent')}}
* 传参方式：post 或 get
* 传入参数：

|参数|意义|
|:----|:----|
|gnuuid | 第一个接口返回的 |
|method | 虚拟机渲染类型默认vnc，支持：vnc,rdp,url |

* 返回数据格式：json{status:状态码,response:数据}
* 返回格式例子如下：
*{"status":200,"msg":"","method":"rdp","sysname":"系统名称",paramter:"3389 或 5900","ip":"虚拟机ip"}
* 具体说明：
* 返回数据中:
* Status——返回状态码。状态如下。（只有200情况下的值可用，不成功的情况下msg会有对应提示，成功msg为空）
* 返回参数：
    
|状态码|状态|
|:----|:----|
|200|success|
|400|没有获取到有效参数，或者没有该虚拟机的使用权限|
|101|openstack接口返回失败|

* 接口返回字段具体含义说明

|字段|类型|意义|
|:----|:----|:----|
|status|string|状态码|
|msg|string|错误提示，成功msg为空|
|method|string|rdp 或者 vnc |
|sysname|string|系统名称 |
|paramter|string|3389 或 5900 |
|ip|string| 虚拟机ip |
|url|string| url |

## **5.  独立主机运行界面(停用)**

* 接口格式常量：{{path('openstack_common_server_run')}}
* 传参方式：post 或 get
* 传入参数：

|参数|意义|
|:----|:----|
|serverid | 界面上的参数server_id |
|method | 虚拟机渲染类型默认rdp，支持：vnc,rdp,url三种格式 |

* 返回数据格式：json{status:状态码,response:数据}
* 成功返回格式例子如下：
* {"status":200,"msg":"","method":"rdp","sysname":"系统名称",paramter:"3389 或 5900","ip":"虚拟机ip"}
* 失败：
* {"status":400,"msg":"xxxxx"}
* 具体说明：
* 返回数据中:
* Status——返回状态码。状态如下。（只有200情况下值可用，不成功的情况下msg会有对应提示，成功msg为空）
* 返回参数：
    
|状态码|状态|
|:----|:----|
|200|success|
|400|没有获取到有效参数，或者没有该虚拟机的使用权限|
|101|openstack接口接口返回失败|

* 接口返回字段具体含义说明

|字段|类型|意义|
|:----|:----|:----|
|status|string|状态码|
|msg|string|错误提示，成功msg为空|
|method|string|默认rdp，会根据输入值切换 |
|sysname|string|系统名称 |
|paramter|string|3389 或 5900 |
|ip|string| 虚拟机ip |
|url|string| 虚拟机url |



> 2018/06 随喜感恩