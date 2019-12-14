## **1.  虚拟机列表接口**
* 参数： email:用户名（邮箱）; salt; guuid:虚拟机组id，不填则返回全部。

|参数|意义|
|:----|:----|
|email |用户名（邮箱）|
|salt | 对应用户表里salt字段 |
|guuid | 虚拟机组id，不填则返回全部 |
|courseid| 课程id，不填不返回任何值 |
|groupname| 情景主机名称，单关键字模糊搜索 |


* URL：/vmtoliu/vlapis
* 传参方式：post 或 get
* 返回参数：虚拟机id,虚拟机名称
* 返回数据格式：json{status:状态码,response:数据}
* 返回格式如下：
* {"status":200,"response":{"0":"group1","1":"group2"}}
* 具体说明：
* 返回数据中:
* Status——返回状态码。状态如下。（只有200情况下的response值可用）
    
|状态码|状态|
|:----|:----|
|200|success|
|404|null（此用户下没有任何虚拟机）|
|400|没有获取到有效参数|
|500|在数据库中没有找到该用户|
|303|虚拟机模块调用失败（虚拟机功能没有返回任何数据）|

* Response——group数组：具体字段含义说明

|字段|类型|意义|
|:----|:----|:----|
|createtime|string|创建时间|
|email|string|使用用户email|
|group_id|string|组id|
|groupname|string|组名|
|nickname|string|用户名称|
|net_type|string|网络类型(局域网)[暂时只有这一种情况，默认Group]|
|node|array|组内的虚拟机|
|**|**|以下为node结构下的字段|
|image_id|string|虚拟机id|
|freename|string|虚拟机名字|
|vcpus|string|cpu|
|ram|string|内存|
|sysname|string|系统名称(windows,ubuntu,debian,centos,else)|
|bit|string|32位or64位(x86,x64)|
|version|string|系统版本号|
|disk|string|硬盘大小|
|role|string|功能机,学生机(resource,client)|
|**usedip**|string|用户配置的ip|
|**note**|string|标签备注，学生主机默认备注client |


## **2.  虚拟机预览**
- URL : ostgroup/view/{courseId}/{gtuuid}
- gtuuid : 与工作流绑定的虚拟机id 
- courseId :课程id
- 此接口通过session验证相关用户关系

## **3.  虚拟机是否有效接口**
- 参数：

|参数|意义|
|:----|:----|
|email |用户名（邮箱）|
|salt | 用户表salt |
|id | 虚拟机组id |
|courseid| 课程id|

- URL：/vmtoliu/cv
- 传参方式：post 或 get
- 返回数据格式：json   {status:状态码,response:数据}
- 返回格式如下：
- {"status":200,"response":”true/false”}
- 具体说明：
- 返回数据中:
- Status——返回状态码。（只有200情况下的response值可用）

|状态码|状态|
|:----|:----|
|200|success|
|500|在数据库中没有找到该用户|
|400|没有获取到有效参数）|

* Response：具体字段含义说明
* true 该用户在此课程里面有这个虚拟机
* false 该用户在此课程里面不存在这个虚拟机
* 

> 2018/06 随喜感恩