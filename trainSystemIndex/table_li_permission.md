
## **1.  后台-权限管理-列表按钮数据格式约定**

* 左侧菜单栏code编码 ：


>system :  系统

    >>home :  首页

>trainmanage : 培训管理

   >>user : 报名生源

    >>train : 课程培训

    >>template : 课程模板

    >>category : 课程分类

    >>admin : 系统权限

       >>>users : 账号

       >>>role : 角色

       >>>menu : 权限

>exammanage : 考核管理

    >>question : 考试题库

    >>bank : 题库分类

    >>examList : 考试试卷 （setQuesPaper：试卷批阅）

    >>examType : 试卷分类

    >>stumanage : 考生管理

        >>>examUser : 考生

        >>>examUGroup : 考生组

>statistics : 统计管理





* 权限表中添加的字段admin_menu ：
* ex:
```
name="data_target", type="string", length=30, nullable=true,options={"comment":"标签target属性"}
name="data_toggle", type="string", length=30, nullable=true,options={"comment":"标签toggle属性"}
name="icon", type="string", length=15, nullable=true,options={"comment":"标签icon属性"}
name="class", type="string", length=60, nullable=true,options={"comment":"标签class属性"}
name="data_uid", type="string", length=30, nullable=true,options={"comment":"标签参数名称"}
name="data_url", type="string", length=50, nullable=true,options={"comment":"标签url地址"}
name="params", type="string", length=30, nullable=true,options={"comment":"路由参数"}
name="isLiButton", type="string", length=30, nullable=true,options={"comment":"列表按钮标识  1列表按钮  0不是列表按钮"}
name="onclick", type="string", length=30, nullable=true,options={"comment":"标签点击事件"}

```
|Name|type|length|nullable|comment|
|:----|:----|:----|:----|:----|
|data_target|string|30|true|标签target属性|
|data_toggle|string|30|true|标签toggle属性|
|icon|string|15|true|标签icon属性|
|class|string|60|true|标签class属性|
|data_uid|string|30|true|标签参数名称|
|data_url|string|50|true|标签url地址|
|params|string|30|true|路由参数|
|isLiButton|string|30|true|列表按钮标识  1列表按钮  0不是列表按钮|
|onclick|string|30|true|标签点击事件|

* twig.html引用格式:
```
{% set _context = trainCourse %}

{% set liStrCodeInfo='view,delete' %}
{% if trainCourse.startTrainTime is defined and trainCourse.endTrainTime is defined  and  trainCourse.startTrainTime>nowDate %}
    {% set liStrCodeInfo %}
        {{liStrCodeInfo }},editor
    {% endset %}
{% endif %}

{% include 'TrainsystemAdminBundle::permission_menu_li.html.twig' with {menu: menu, liStrCode:liStrCodeInfo} %}
```
* 字段数据内容的格式:
    |Name|Description|
    |:----|:----|
    |path|trainsystem_admin_course_train_check|
    |data_uid|(trainCourse.id)|
    |params|type:update,trainCourseId:(trainCourse.id)|


* 权限标识 codeName:
    |Name|Description|
    |:----|:----|
    |delete|删除|
    |editor|编辑|
    |view|详情|
    |closed|关闭|
    |open|开启|
    |disable|禁用|
    |enabled|启用|
    |setQues|编辑试题|
    |setInfo|编辑基本信息|
    |setSetting|编辑设置|
    |examInfo|试卷批阅|
    |setuserlist|编辑分配考生|


* a标签的 属性

|Name|Description|
|:----|:----|
|data-target|有数据:"_blank"|
|data-toggle|默认为空|
|class|默认为空|
|title|默认为空|
|data-uid|默认为空|
|href|有地址链接就显示地址链接  没有就显示"javascript:;"|
|onclick|默认为空|
|data-url|默认为空|
