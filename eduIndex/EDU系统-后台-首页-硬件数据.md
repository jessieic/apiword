## **1.  硬件数据统计**

* URL:/admin/hypervisors/admindata
* 常量：{{ path('os_admin_hypervisors_adminilist') }}
* method：get
* 传入参数：无
* 返回数据格式：json
* 返回格式例子如下：

```
{
    "cpudata": {
        "05-11": {
            "used": 4, 
            "all": 48, 
            "precent": 8.3333333333333
        }, 
        "05-10": {
            "used": 0, 
            "all": 0, 
            "precent": 0
        }, 
        "05-09": {
            "used": 0, 
            "all": 0, 
            "precent": 0
        }, 
        "05-08": {
            "used": 0, 
            "all": 0, 
            "precent": 0
        }, 
        "05-07": {
            "used": 0, 
            "all": 0, 
            "precent": 0
        }, 
        "05-06": {
            "used": 0, 
            "all": 0, 
            "precent": 0
        }, 
        "05-05": {
            "used": 0, 
            "all": 0, 
            "precent": 0
        }
    }, 
    "ramdata": {
        "05-11": {
            "used": 5120, 
            "all": 40923, 
            "precent": 12.511301712973
        }, 
        "05-10": {
            "used": 0, 
            "all": 0, 
            "precent": 0
        }, 
        "05-09": {
            "used": 0, 
            "all": 0, 
            "precent": 0
        }, 
        "05-08": {
            "used": 0, 
            "all": 0, 
            "precent": 0
        }, 
        "05-07": {
            "used": 0, 
            "all": 0, 
            "precent": 0
        }, 
        "05-06": {
            "used": 0, 
            "all": 0, 
            "precent": 0
        }, 
        "05-05": {
            "used": 0, 
            "all": 0, 
            "precent": 0
        }
    }, 
    "hypredata": {
        "hyp_sum": 3, 
        "hyp_enable": 2, 
        "hyp_disable": 1, 
        "hyp_precent": 66.666666666667, 
        "cpu_warn": 0, 
        "ram_warn": 0, 
        "disk_warn": 0
    }
}
```


* 具体返回参数说明：
1. 一级参数：

|参数（键名）|说明|数据类型|
|:----|:----|:----|
|cpudata|cpu数据|数组|
|hypredata|计算节点数据|数组|
|ramdata|内存数据|数组|


2. 二级参数：

＊hypredata下参数：

|参数（键名）|说明|数据类型|
|:----|:----|:----|
|hyp_sum|计算节点总数|正整数（包括0）|
|hyp_enable|在线数量|正整数（包括0）|
|hyp_disable|离线数量|正整数（包括0）|
|hyp_precent|百分比:在线/总数|小数，数值范围［0，100］|
|cpu_warn|cpu预警数量|正整数（包括0）|
|ram_warn|内存预警数量|正整数（包括0）|
|disk_warn|存储预警数量|正整数（包括0）|

＊cpudata 和 ramdata 下的参数
键名是日期，结构体内的参数说明：


|参数（键名）|说明|数据类型|
|:----|:----|:----|
|use|使用数量|正整数（包括0）|
|all|全部数量|正整数（包括0）|
|precent|百分比:使用/全部|小数，数值范围［0，100］|


>2018.06随喜感恩