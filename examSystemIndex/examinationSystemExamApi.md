* 请求格式:
* Content-Type:application/x-www-form-urlencoded

* 返回格式:Json
* ex:

```
数据返回格式：
失败：
    [
        {
        "status": 400,    除去200其他的都是异常情况
        "message": "失败"
        "msgkey": "keyName"
        "response": [ ]
        }
    ]
成功：
[]
或者返回json数据
    [
        {
        "status": 200,
        "message": "操作成功"
        "msgkey": ""
        "response": [ ]
        }
    ]
```


## **1.  考核系统试卷管理——试卷列表界面**

* URL: /admin/exam/indexview
* URL常量：{{path('ExaminationSystem_Admin_Exam_IndexView')}}
* method：GET
* twig地址：src/ExaminationSytem/AdminBundle/Resources/views/Exam/exam_index.html.twig


## **2.  考核系统试卷管理——试卷添加界面（分步添加试卷功能弃用）**

* URL: /admin/exam/createview
* URL常量：{{path('ExaminationSystem_Admin_Exam_CreateView')}}
* method：GET
* twig地址：src/ExaminationSytem/AdminBundle/Resources/views/Exam/exam_new.html.twig

## **2-1.  考核系统试卷管理——试卷添加界面**

* URL: /admin/exam/createallview
* URL常量：{{path('ExaminationSystem_Admin_Exam_CreateAllView')}}
* method：GET
* twig地址：src/ExaminationSytem/AdminBundle/Resources/views/Exam/exam_new_all.html.twig



## **3.  考核系统试卷管理——试卷修改界面**

* URL: /admin/exam/editview/{examId}/{type}
* URL常量：{{path('ExaminationSystem_Admin_Exam_EditView')}}
* method：GET
* twig地址：src/ExaminationSytem/AdminBundle/Resources/views/Exam/exam_edit.html.twig

|Name|In|type|Description|
|:----|:----|:----|:----|
|examId |body |integer|试卷id |
|type |body |string|试卷当前操作步骤 |

## **4.  考核系统试卷管理——试卷详情界面**

* URL: /exam/infoview/{examId}/{type}
* URL常量：{{path('ExaminationSystem_Admin_Exam_InfoView')}}
* method：GET
* twig地址：src/ExaminationSytem/AdminBundle/Resources/views/Exam/exam_info.html.twig

|Name|In|type|Description|
|:----|:----|:----|:----|
|examId |body |integer|试卷id |
|type |body |string|试卷当前操作步骤 |

## **5.  考核系统试卷管理——试卷列表api**

* URL: /admin/exam/indexlist
* URL常量：{{path('ExaminationSystem_Admin_Exam_IndexList')}}
* method：POST

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|status |body |integer|试卷状态 1开放 2关闭 |
|typeId |body |integer|试卷类型ID |
|examTitle |body |integer|试卷标题  模糊查询 |

###### Response:

* 返回格式:html
* 默认每页展示15条记录
* ex: 返回的分页连接/admin/exam/indexlist?psize=2  地址访问的时候需要post 检索的数据


## **6.  考核系统试卷管理——试卷添加api （分步添加试卷功能弃用）**

* URL: /admin/exam/create
* URL常量：{{path('ExaminationSystem_Admin_Exam_Create')}}
* method：POST

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|examTitle |body |string|试卷名称 |
|examTypeId |body |integer|试卷类型ID |
|examStatus |body |integer|试卷状态 1开放 2关闭 |
|examInfo |body |string|试卷描述 |
|examLogoImage|body |file|试卷logo 图片  'jpg', 'jpeg', 'png' |

###### Response:

* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "msgkey": ""
    "response": {
        "examId":2
    }
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|msgkey |body |string|错误字段标识 eg:examTitle|
|response |body |string|返回数据,数组允许为空|
|examId |body |integer|试卷id|


## **6-1.  考核系统试卷管理——试卷添加所有信息api**

* URL: /admin/exam/setinfo
* URL常量：{{path('ExaminationSystem_Admin_Exam_SetInfo')}}
* method：POST

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|examTitle |body |string|试卷名称 |
|examTypeId |body |integer|试卷类型ID |
|examStatus |body |integer|试卷状态 1开放 2关闭 |
|examInfo |body |string|试卷描述 |
|examLogoImage|body |file|试卷logo 图片  'jpg', 'jpeg', 'png' |
|examStartTime|body |string|试卷开考时间 |
|examDeadlineTime|body |string|试卷截止时间 |
|examAnswersNum|body |integer|试卷答题次数 默认为1  |
|examParticipants|body |array|试卷目标人群 |
|examDispForm|body |integer|试卷展示形式  1:长试卷;2:短试卷|
|examPassScorePercentage|body |string|试卷及格分数百分比 |
|examExmlimit|body |integer|试卷考试时长 分钟单位 |
|examLimitedTimes|body |integer|试卷限制交卷时长 分钟单位 |
|examAnnounceAnswerFlag|body |integer|试卷答案是否公布 1公布 2不公布|
|announceTime|body |string|试卷成绩公布时间 |
|addOrderType|body |integer|试卷组卷方式  1固定模式 2随机模式 |
|试卷组卷方式  1固定模式数据列表 |
|list |body |array|操作的试题列表   多条数据|
|quesId |body |integer|试题id|
|quesScore |body |integer|试题分数|
|sortNum |body |integer|试题顺序|
| 试卷组卷方式   2随机模式数据列表|
|list |body |array|试卷选择的试题类型 数组|
|quesTypeId |body |integer|试题类型id|
|quesNumber |body |integer|试题数量|
|quesScore |body |integer|试题分数|
|quesTypeSortNum |body |integer|试题类型排序序号|
|bankList |body |array|试卷选择的题库id 数组|
###### Response:

* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "msgkey": ""
    "response": {
        "examId":2
    }
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|msgkey |body |string|错误字段标识 eg:examTitle|
|response |body |string|返回数据,数组允许为空|
|examId |body |integer|试卷id|


## **7.  考核系统试卷管理——试卷添加设置api**

* URL: /admin/exam/create/setting
* URL常量：{{path('ExaminationSystem_Admin_Exam_CreateSetting')}}
* method：POST

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|examId|body |integer|试卷Id |
|examStartTime|body |string|试卷开考时间 |
|examDeadlineTime|body |string|试卷截止时间 |
|examAnswersNum|body |integer|试卷答题次数 默认为1  |
|examParticipants|body |array|试卷目标人群 |
|examDispForm|body |integer|试卷展示形式  1:长试卷;2:短试卷|
|examPassScorePercentage|body |string|试卷及格分数百分比 |
|examExmlimit|body |integer|试卷考试时长 分钟单位 |
|examLimitedTimes|body |integer|试卷限制交卷时长 分钟单位 |
|examAnnounceAnswerFlag|body |integer|试卷答案是否公布 1公布 2不公布|
|announceTime|body |string|试卷成绩公布时间 |

* 请求数据
* eg:
```
examParticipants[0]:1
examParticipants[1]:3

```
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
|msgkey |body |string|错误字段标识 允许为空|
|response |body |string|返回数据,数组允许为空|


## **8.  考核系统试卷管理——试卷修改 api**

* URL: /admin/exam/edit
* URL常量：{{path('ExaminationSystem_Admin_Exam_Edit')}}
* method：POST

###### Request： （下列字段 不传参数则不修改）

|Name|In|type|Description|
|:----|:----|:----|:----|
|examId|body |integer|试卷Id |
|examTitle |body |string|试卷名称 |
|examTypeId |body |integer|试卷类型ID |
|examStatus |body |integer|试卷状态 1开放 2关闭 |
|examInfo |body |string|试卷描述 |
|examStartTime|body |string|试卷开考时间 |
|examDeadlineTime|body |string|试卷截止时间 |
|examAnswersNum|body |integer|试卷答题次数 默认为1  |
|examParticipants|body |string|试卷目标人群  最终选择的数据（不传删除的ID） 为空则全部删除|
|examDispForm|body |integer|试卷展示形式  1:长试卷;2:短试卷|
|examPassScorePercentage|body |string|试卷及格分数百分比 |
|examExmlimit|body |integer|试卷考试时长 分钟单位 |
|examLimitedTimes|body |integer|试卷限制交卷时长 分钟单位 |
|examAnnounceAnswerFlag|body |integer|试卷答案是否公布 1公布 2不公布|
|announceTime|body |string|试卷成绩公布时间 |

* 请求数据
* eg:
```
examParticipants[0]:1
examParticipants[1]:3

```
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
|msgkey |body |string|错误字段标识 允许为空|
|response |body |string|返回数据,数组允许为空|


## **9.  考核系统试卷管理——试卷头像修改 api**

* URL: /admin/exam/logoupdate
* URL常量：{{path('ExaminationSystem_Admin_Exam_LogoUpdate')}}
* method：POST

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|examId|body |integer|试卷Id |
|examLogoImage|body |file|试卷logo 图片  'jpg', 'jpeg', 'png' |


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
|msgkey |body |string|错误字段标识 允许为空|
|response |body |string|返回数据,数组允许为空|



## **10.  考核系统试卷管理——试卷删除（支持批量删除） api**

* URL: /admin/exam/delete
* URL常量：{{path('ExaminationSystem_Admin_Exam_Delect')}}
* method：POST

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|examIds|body |integer/array|试卷Id /试卷id多个|

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
|msgkey |body |string|错误字段标识 允许为空|
|response |body |string|返回数据,数组允许为空|


## **11.  考核系统试卷管理——试卷类型 api**

* URL: /admin/extype/list
* URL常量：{{path('ExaminationSystem_Admin_ExamType_List')}}
* method：POST

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|type |body |string|状态标识 默认为空（type值为create在创建试卷是不显示关闭和删除的数据）|
|examId |body |integer|试卷id 默认为空(不为空则列表中存在当前试卷选择的分类数据)|

###### Response:

* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response": [
        {"id":1,"title":"试卷类型001"},
        {"id":2,"title":"试卷类型002"}
    ]
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|msgkey |body |string|错误字段标识 允许为空|
|response |body |string|返回数据,数组允许为空|
|id |response |integer|类型id|
|title |response |string|类型名称|


## **12.  考核系统试卷管理——题库列表 api**

* URL: /admin/bank/list
* URL常量：{{path('ExaminationSystem_Admin_Quesbank_List')}}
* method：POST

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|examId |body |integer|试卷id (可为空)|
|type |body |string|状态标识 默认为空（type值为create在创建试卷是不显示关闭和删除的数据）|

###### Response:

* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response": [
        {"id":1,"title":"试卷题库001","checkFlag":1,
        "typeNumList":[
            {"id":1,"fid":0,"ques_type":"\u5224\u65ad","code":"judge","typeNum":"2"},
            {"id":2,"fid":0,"ques_type":"\u5355\u9009","code":"single","typeNum":"2"},
        ],
        "repeatNumList":[{"bankId":5,"repeat":2,"typeId":1},{"bankId":5,"repeat":3,"typeId":2}{"bankId":7,"repeat":0},{"bankId":8,"repeat":0}]
        },
        {"id":2,"title":"试卷题库002","checkFlag":0,"typeNumList":[
            {"id":1,"fid":0,"ques_type":"\u5224\u65ad","code":"judge","typeNum":"2"},
            {"id":2,"fid":0,"ques_type":"\u5355\u9009","code":"single","typeNum":"2"},
        ],
         "repeatNumList":[{"bankId":5,"repeat":0},{"bankId":7,"repeat":0},{"bankId":8,"repeat":0}]
        }
    ]
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|msgkey |body |string|错误字段标识 允许为空|
|response |body |string|返回数据,数组允许为空|
|id |response |integer|题库id|
|title |response |string|题库名称|
|checkFlag |response |string|试卷是否被选择|
|repeatNumList |response |array|题库所在其他题库中重复的试题数|
|bankId |response |integer|其他题库Id|
|repeat |response |integer|重复的试题数|
|typeId |response |integer|重复的试题所属试题分类|
|typeNumList |response |array|题库中试题类型的题目数量|
|id |response |string|试题类型Id|
|fid |response |string|试题类型父级Id|
|ques_type |response |string|试题类型名称|
|code |response |string|试题类型编码|
|typeNum |response |integer|试题类型试题数|


## **13.  考核系统试卷管理——试题难度 api**

* URL: /admin/exam/hardlist
* URL常量：{{path('ExaminationSystem_Admin_Examhard_List')}}
* method：GET

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|


###### Response:

* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response": [
        {"中等":2},
        {"简单":1},
        {"较难":3},
    ]
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|msgkey |body |string|错误字段标识 允许为空|
|response |body |string|返回数据,数组允许为空|
|key |response |string|试题难度名称|
|value |response |string|试题难度id|


## **14.  考核系统试卷管理——试题类型 api**

* URL: /admin/exam/quetypelist
* URL常量：{{path('ExaminationSystem_Admin_ExamQueType_List')}}
* method：GET

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|


###### Response:

* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response": [
        {"id":1,"fid":0,"ques_type":"判断","code":"judge","subset":[]},
        {"id":2,"fid":0,"ques_type":"单选","code":"single","subset":[]},
        {"id":3,"fid":0,"ques_type":"多选","code":"mulit","subset":[]},
        {"id":6,"fid":0,"ques_type":"CTF","code":"ctf","subset":
            [
            {"id":7,"fid":6,"ques_type":"MISC","code":"ctf","subset":[]},
            {"id":8,"fid":6,"ques_type":"PPC","code":"ctf","subset":[]},
            ]
        }
    ]
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|response |body |array|返回数据,数组允许为空|
|id |response |string|试题类型Id|
|ques_type |response |string|试题类型名称|
|code |response |string|试题类型编码|
|subset |response |array|试题类型子集|

## **15.  考核系统试卷管理——试题列表（试卷固定模式下） api**

* URL: /admin/exam/queslist/notinexam
* URL常量：{{path('ExaminationSystem_Admin_QuesNotInExam_List')}}
* method：POST

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|examId |body |integer|试卷id (可为空， 不为空则返回不包括已选择的试题数据）|
|ques_title |body |string|试题名称 (可为空)|
|bank_id |body |integer|题库id (可为空 默认题库列表中第一个)|
|type_id |body |array|试题类型id 可多个 (可为空默认试题类型列表中第一个)|
|hard_id |body |array|试题难度id  (可为空默认试题难度列表中第一个)|
|notInIds |body |array|试题id 可多个 试题列表中不包含的 (可为空)|
|pageSize |response |integer|每页显示条数 默认15|
|pageIndex |response |integer|当前页数|

###### Response:

* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response": {
        "countNum":17,
        "pageSize":20,
        "pageIndex":0,
        "pageNum":1,
        "list":[
            {"id":24,"ques_title":"试题一","hard_id":1,"bank_id":1,"type_id":2,"title":"题库001","hardname":"简单","ques_type":"单选","type_fid":0},
            {"id":23,"ques_title":"试题2","hard_id":1,"bank_id":1,"type_id":12,"title":"题库001001","hardname":"简单","ques_type":"STEGA","type_fid":6},
        ]
    }
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|response |body |array|返回数据,数组允许为空|
|countNum |response |integer|试题总数|
|pageSize |response |integer|每页显示条数|
|pageIndex |response |integer|当前页数|
|pageNum |response |integer|总页数|
|list |response |array|试题列表|
|id |response |integer|试题id|
|ques_title |response |string|试题题干|
|hard_id |response |integer|试题难度id|
|bank_id |response |integer|试题题库id|
|type_id |response |integer|试题类型id|
|title |response |string|试题所属题库名称|
|hardname |response |string|试题难度名称|
|ques_type |response |string|试题类型名称|
|type_fid |response |integer|试题类型父id|



## **16.  考核系统试卷管理——试卷试题 添加/修改（试卷固定模式下） api**

* URL: /admin/examquere/set
* URL常量：{{path('ExaminationSystem_Admin_ExamQuesRe_Set')}}
* method：POST

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|examId |body |integer|试卷id|
|delExamQuesReIds |body |array|删除的试题id列表(question_parent_id)   多条数据可为空|
|list |body |array|操作的试题列表   多条数据可为空|
|quesId |body |integer|试题id|
|quesScore |body |integer|试题分数|
|sortNum |body |integer|试题顺序|


*eg:
```
examId:17
delExamQuesReIds[]:1
delExamQuesReIds[]:2
list[quesId][0]:2
list[quesScore][0]:2
list[sortNum][0]:2
list[quesId][1]:2
list[quesScore][1]:2
list[sortNum][1]:2
```
###### Response:

* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response": [ ]
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|msgkey |body |string|错误字段标识 允许为空|
|response |body |string|返回数据,数组允许为空|



## **17.  考核系统试卷管理——删除试卷试题（试卷固定模式下） api  ----字段整合到接口16中  弃用**

* URL: /admin/examquere/del
* URL常量：{{path('ExaminationSystem_Admin_ExamQuesRe_Del')}}
* method：POST

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|examId |body |integer|试卷id|
|examQuesReIds |body |array|试题id列表（question_parent_id）  多条数据|

*eg:
```
examId:17
examQuesReIds[]:1
examQuesReIds[]:2
```

###### Response:

* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response": [ ]
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|msgkey |body |string|错误字段标识 允许为空|
|response |body |string|返回数据,数组允许为空|



## **18.  考核系统试卷管理——修改试卷试题分数 单条数据（试卷固定模式下） api**

* URL: /admin/examquere/upscore
* URL常量：{{path('ExaminationSystem_Admin_ExamQuesRe_UpScore')}}
* method：POST

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|examId |body |integer|试卷id |
|examQuesReId |body |string|试卷绑定试题id|
|score |body |integer|试题分数|

*eg:
```
examId:17
examQuesReIds:1
score:3
```

###### Response:

* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response": [ ]
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|msgkey |body |string|错误字段标识 允许为空|
|response |body |string|返回数据,数组允许为空|



## **19.  考核系统试卷管理——试卷选择的试题列表（试卷固定模式下） api**

* URL: /admin/examquere/list/{examId}
* URL常量：{{path('ExaminationSystem_Admin_ExamQuesRe_List')}}
* method：POST

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|examId |url |integer|试卷id|

*试卷读取试题详情界面：
* URL:  /admin/examquestion/info/{questionid}/{examid}
* URL常量：{{path('ExaminationSystem_Admin_ExamQues_InfoView')}}
* questionid：为列表中question_parent_id 试题id
* examid：exam_id 试卷id 可为空

###### Response:

* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response": [
    {"typeCode":"judge","typeName":"judge","scoreSum":"30","list":[
        {"examQuesReId":69,"exam_id":17,"question_parent_id":19,"question_score":2,"question_type_id":1,"question_type_code":"judge","question_type_name":"判断","question_title":"用1、3、5组成的所有的三位数,一定都是3的倍数..","sort_num":2},
        {"examQuesReId":67,"exam_id":17,"question_parent_id":18,"question_score":10,"question_type_id":1,"question_type_code":"judge","question_type_name":"判断","question_title":"0既不是奇数也不是偶数","sort_num":3}
        ]
     },
    {"typeCode":"fillBlank","typeName":"fillBlank","scoreSum":"30","list":[
        {"examQuesReId":70,"exam_id":17,"question_parent_id":21,"question_score":3,"question_type_id":4,"question_type_code":"fillBlank","question_type_name":"填空","question_title":"填空一_____填空2_____。.","sort_num":3}
        ]
    },
    ]
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|msgkey |body |string|错误字段标识 允许为空|
|response |body |string|返回数据,数组允许为空（多条记录）|
|typeCode |body |string| 题型编码（dan，ctf...）|
|typeName |body |string| 题型名称（单选，ctf...）|
|scoreSum |body |integer| 当前类型下的试题总分数|
|exam_id |body |integer|试卷id|
|examQuesReId |body |integer|试卷绑定试题id|
|question_parent_id |body |integer|试题id|
|question_score |body |integer|试题分数|
|question_type_id |body |integer|试题类型id|
|question_type_code |body |string|试题类型code|
|question_type_name |body |string|试题类型名称|
|question_title |body |string|试题名称|
|sort_num |body |integer|试题排序序号|


## **20.  考核系统试卷管理——试卷试题类型添加/保存（试卷随机模式下） api**

* URL: /admin/examrandom/set
* URL常量：{{path('ExaminationSystem_Admin_ExamRandom_Set')}}
* method：POST

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|examId |body |integer|试卷id|
|list |body |array|试卷选择的试题类型 数组|
|quesTypeId |body |integer|试题类型id|
|quesNumber |body |integer|试题数量|
|quesScore |body |integer|试题分数|
|quesTypeSortNum |body |integer|试题类型排序序号|
|bankList |body |array|试卷选择的题库id 数组|

*ge
```
examId:17
list[0][quesTypeId]:1
list[0][quesNumber]:3
list[0][quesScore]:2
list[0][quesTypeSortNum]:1
bankList[0]:1
bankList[1]:2
```


###### Response:
* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response": [ ]
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|msgkey |body |string|错误字段标识 允许为空|
|response |body |string|返回数据,数组允许为空|




## **21.  考核系统试卷管理——试卷选择的试题类型（试卷随机模式下） api**

* URL: /admin/examrandom/list/{examId}
* URL常量：{{path('ExaminationSystem_Admin_ExamRandom_List')}}
* method：GET

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|examId |URL |integer|试卷id|

* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response": [
     {"quesTypeId":1,"QuesTypeName":"判断","QuesTypeCode":"judge","QuesTypeFid":0,"quesNumber":2,"quesScore":2,"quesTypeSortNum":"judge"},
     {"quesTypeId":2,"QuesTypeName":"单选","QuesTypeCode":"single","QuesTypeFid":0,"quesNumber":3,"quesScore":3,"quesTypeSortNum":"single"},
     ]
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|msgkey |body |string|错误字段标识 允许为空|
|response |body |string|返回数据,数组允许为空|
|quesTypeId |body |integer|试题类型id|
|quesTypeName |body |string|试题类型名称|
|QuesTypeCode |body |string|试题类型编码|
|QuesTypeFid |body |string|试题类型父id|
|quesNumber |body |integer|试题数量|
|quesScore |body |integer|试题分数|
|quesTypeSortNum |body |integer|试题类型排序序号|




## **22.  考核系统试卷管理——考核用户组（目标人群） api**

* URL: /admin/examugroup/list
* URL常量：{{path('ExaminationSystem_Admin_ExamUGroup_list')}}
* method：POST

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|type |body |string|状态标识 默认为空（type值为create在创建试卷是不显示关闭和删除的数据）|
|examId |body |integer|试卷id 默认为空(不为空则列表中存在当前试卷选择的分类数据)|

* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response": [
     {"id":1,"title":"组1"},
     {"id":2,"title":"组2"},
     ]
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|msgkey |body |string|错误字段标识 允许为空|
|response |body |string|返回数据,数组允许为空|
|id |body |integer|考核用户组ID|
|title |body |string|考核用户组名称|



## **23.  考核系统试卷管理——试卷详情api**

* URL: /exam/info/{examId}
* URL常量：{{path('ExaminationSystem_Admin_Exam_Info')}}
* method：GET

|Name|In|type|Description|
|:----|:----|:----|:----|
|examId |URL |integer|试卷id |


* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response": [

     ]
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|msgkey |body |string|错误字段标识 允许为空|
|response |body |string|返回数据,数组允许为空|
|examId|body |integer|试卷Id |
|examTitle |body |string|试卷名称 |
|examTypeId |body |integer|试卷类型ID |
|examStatus |body |integer|试卷状态 1开放 2关闭 |
|examInfo |body |string|试卷描述 |
|examLogoImage|body |file|试卷logo 图片  'jpg', 'jpeg', 'png' |
|examStartTime|body |string|试卷开考时间 |
|examDeadlineTime|body |string|试卷截止时间 |
|examAnswersNum|body |integer|试卷答题次数 默认为1  |
|examDispForm|body |integer|试卷展示形式  1:长试卷;2:短试卷|
|examDispOrder|body |integer|组卷方式  0未选择组卷方式   1固定试题  2随机抽题|
|examPassScorePercentage|body |string|试卷及格分数百分比 |
|examExmlimit|body |integer|试卷考试时长 分钟单位 |
|examAnnounceAnswerFlag|body |integer|试卷答案是否公布 1公布 2不公布|
|announceTime|body |string|试卷成绩公布时间 |
|examParticipants|body |array|试卷目标人群 (可为空) |
|groupId|body |array|试卷目标人群id |
|groupTitle|body |array|试卷目标人群名称|




## **24.  考核系统 ——随机试卷生成试题api（针对的是可考的试卷）**


* _controller： ExaminationSytemWebBundle:ExamRandomPaper:setExamQuesReByRandom
* method：GET

|Name|In|type|Description|
|:----|:----|:----|:----|
|examId |URL |integer|试卷id |
|stuId |URL |integer|考生id |

* 调用方式：
* eg:
```
$controller = "ExaminationSytemWebBundle:ExamRandomPaper:setExamQuesReByRandom";
$arrResult =  json_decode($this->forward($controller,array('examId'=>17,'stuId'=>1))->getContent(), TRUE);

```
* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response": [    ]
}
```
* 说明:

* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|msgkey |body |string|错误字段标识 允许为空|
|response |body |string|返回数据,数组允许为空|

## **25.  考核系统 ——随机试卷生成试题api（针对的是未考的试卷所有用户组下的考生）每次更新试卷【试卷用户组，随机设置】、用户组【增删】（都会重新生成未考试试卷）**


* _controller： ExaminationSytemWebBundle:ExamRandomPaper:createRandomPaperAllStuByExamId
* method：GET

|Name|In|type|Description|
|:----|:----|:----|:----|
|em |URL |obj|getManager 对象 |
|examId |URL |integer|试卷id |
|randomPaperSetupInfo |URL |integer|试卷随机配置 未修改则为空 |
|groupList |URL |integer|试卷目标人群（用户组id） 未修改则为空 |

*   Request $request, $em,  $examId, $randomPaperSetupInfo =array(), $groupList = array()
* 调用方式：
* eg:
```
$controller = "ExaminationSytemWebBundle:ExamRandomPaper:setExamQuesReByRandom";
$arrResult =  json_decode($this->forward($controller,array('em'=>em, 'examId'=>17,'randomPaperSetupInfo' => array(),'groupList'=> array(1,2)))->getContent(), TRUE);

```
* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response": [    ]
}
```

* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|msgkey |body |string|错误字段标识 允许为空|
|response |body |string|返回数据,数组允许为空|

## **26.  考核系统试卷分类——试卷分类界面**

* URL: /admin/extype/indexview
* URL常量：{{path('ExaminationSystem_Admin_ExamType_IndexView')}}
* method：GET
* twig地址：src/ExaminationSytem/AdminBundle/Resources/views/ExamType/exam_type_index.html.twig


## **27.  考核系统试卷分类——试卷分类添加界面**

* URL: /admin/extype/createview
* URL常量：{{path('ExaminationSystem_Admin_ExamType_CreateView')}}
* method：GET
* twig地址：src/ExaminationSytem/AdminBundle/Resources/views/ExamType/exam_type_new.html.twig



## **28.  考核系统试卷分类——试卷分类编辑界面**

* URL: /extype/editview/{exam_typeid}
* URL常量：{{path('ExaminationSystem_Admin_ExamType_EditView')}}
* method：GET
* twig地址：src/ExaminationSytem/AdminBundle/Resources/views/ExamType/exam_type_edit.html.twig

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|exam_typeid |body |integer|试卷分类id |



## **29.  考核系统试卷分类——试卷分类列表api**

* URL: /admin/extype/indexlist
* URL常量：{{path('ExaminationSystem_Admin_ExamType_IndexList')}}
* method：POST

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|examTypeTitle |body |integer|试卷分类标题  模糊查询 |

###### Response:

* 返回格式:html
* 默认每页展示15条记录


## **30.  考核系统试卷分类——试卷分类添加api**

* URL: /admin/extype/create
* URL常量：{{path('ExaminationSystem_Admin_ExamType_Create')}}
* method：POST

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|title |body |string|试卷分类名称|
|status |body |integer|试卷分类状态 1开启 2关闭|
|info |body |integer|试卷分类备注|

###### Response:
* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response": [    ]
}
```

* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|msgkey |body |string|错误字段标识 允许为空|
|response |body |string|返回数据,数组允许为空|



## **31.  考核系统试卷分类——试卷分类修改api**

* URL: /admin/extype/edit
* URL常量：{{path('ExaminationSystem_Admin_ExamType_Edit')}}
* method：POST

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|id |body |integer|试卷分类id|
|title |body |string|试卷分类名称|
|status |body |integer|试卷分类状态 1开启 2关闭|
|info |body |integer|试卷分类备注|

###### Response:
* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response": [    ]
}
```

* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|msgkey |body |string|错误字段标识 允许为空|
|response |body |string|返回数据,数组允许为空|



## **32.  考核系统试卷分类——试卷分类删除api**

* URL: /admin/extype/delete
* URL常量：{{path('ExaminationSystem_Admin_ExamType_Delect')}}
* method：POST

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|ids |body |array|试卷分类id 可多个|
* ex:

```
ids[]:1
ids[]:2
ids[]:3

```


###### Response:
* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response": [    ]
}
```

* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|msgkey |body |string|错误字段标识 允许为空|
|response |body |string|返回数据,数组允许为空|




## **33.  考核系统考核管理——用户管理界面**

* URL: /admin/examuser/indexview
* URL常量：{{path('ExaminationSystem_Admin_ExamUser_indexview')}}
* method：GET
* twig地址：src/ExaminationSytem/AdminBundle/Resources/views/ExamUGroup/exam_user_index.html.twig


## **34.  考核系统考核管理——用户组管理界面**

* URL: /admin/examugroup/indexview
* URL常量：{{path('ExaminationSystem_Admin_ExamUGroup_indexview')}}
* method：GET
* twig地址：src/ExaminationSytem/AdminBundle/Resources/views/ExamUGroup/exam_ugroup_index.html.twig



## **35.  考核系统考核管理——用户组添加界面**

* URL: /admin/examugroup/createview
* URL常量：{{path('ExaminationSystem_Admin_ExamUGroup_createview')}}
* method：GET
* twig地址：src/ExaminationSytem/AdminBundle/Resources/views/ExamUGroup/exam_ugroup_new.html.twig



## **36.  考核系统考核管理——用户组修改界面**

* URL: /admin/examugroup/editview/{examUGroupId}/{type}
* URL常量：{{path('ExaminationSystem_Admin_ExamUGroup_editview')}}
* method：GET
* twig地址：src/ExaminationSytem/AdminBundle/Resources/views/ExamUGroup/exam_ugroup_edit.html.twig

* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|examUGroupId |url |string|用户组id |
|type |url |string|类型 setinfo基础信息  setuserlist用户列表 |



## **37.  考核系统考核管理——用户列表界面**

* URL: /admin/examuser/listview
* URL常量：{{path('ExaminationSystem_Admin_ExamUser_listview')}}
* twig地址：src/ExaminationSytem/AdminBundle/Resources/views/ExamUser/exam_user_list.html.twig
* method：POST

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|groupId |body |integer| 用户组id（可为空）|
|search |body |string| 姓名或手机号码  （姓名中文最多8个字）|

## **38.  考核系统考核管理——用户组列表界面**

* URL: /admin/examugroup/listview
* URL常量：{{path('ExaminationSystem_Admin_ExamUGroup_listview')}}
* twig地址：src/ExaminationSytem/AdminBundle/Resources/views/ExamUGroup/exam_ugroup_list.html.twig
* method：POST

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|title |body |string| 用户组名|


## **39.  考核系统考核管理——用户详情界面**
* URL: /admin/examuser/infoview/{examUserId}
* URL常量：{{path('ExaminationSystem_Admin_ExamUser_infoview')}}
* method：GET
* twig地址：src/ExaminationSytem/AdminBundle/Resources/views/ExamUser/exam_user_info.html.twig

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|examUserId |body |integer|用户id|


## **40.  考核系统考核管理——用户列表api**

* URL: /admin/examuser/list
* URL常量：{{path('ExaminationSystem_Admin_ExamUser_list')}}
* method：POST

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|examGroupId |body |string|用户组id （可为空）|
|notInUserIds |body |array|需要去除的用户id （可为空）|
|company |body |integer| 企业1 个人2|
|search |body |string| 姓名或手机号码  （姓名中文最多8个字）|
|pageSize |response |integer|每页显示条数 默认15|
|pageIndex |response |integer|当前页数|
*examGroupId 不为空  userList为空则返回不包含当前用户组内的用户

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
|msgkey |body |string|错误字段标识 允许为空|
|response |body |string|返回数据,数组允许为空|
|countNum |body |integer|记录总数|
|pageSize |response |integer|每页显示条数 默认15|
|pageIndex |response |integer|当前页数|
|pageNum |response |integer|总页数|
|list |response |array|总页数|
|id |list |integer|学员id|
|cname |list |integer|学员姓名|
|gender |list |integer|学员性别  m男  w女 n未知|
|cphone |list |integer|学员手机号码|




## **41.  考核系统考核管理——用户组添加api**

* URL: /admin/examugroup/setinfo
* URL常量：{{path('ExaminationSystem_Admin_ExamUGroup_setInfo')}}
* method：POST


###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|title |body |string|用户组名称|
|status |body |integer|状态 1开启 2关闭|
|info |body |string|备注|
|userList |body |array|选择的用户id 可多个|
* ex:

```
userList[]:1
userList[]:2
userList[]:3
```


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
|msgkey |body |string|错误字段标识 允许为空|
|response |body |string|返回数据,数组允许为空|



## **42.  考核系统考核管理——考生管理-》用户删除api**

* URL: /admin/examuser/delusergroup
* URL常量：{{path('ExaminationSystem_Admin_ExamUser_delUserGroup')}}
* method：POST

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|examUserIds |body |array|学生用户id  可多个|
* ex:

```
examUserIds[]:1
examUserIds[]:2
examUserIds[]:3
```


###### Response:
* 返回格式:Json
* ex:
```
{
    "code": 200,
    "message": "操作成功"
    "msgkey": ""
    "response": []
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|msgkey |body |string|错误字段标识 允许为空|
|response |body |string|返回数据,数组允许为空|


## **43.  考核系统考核管理——考生管理-》用户修改用户组api**

* URL: /admin/examuser/checkgroup
* URL常量：{{path('ExaminationSystem_Admin_ExamUser_checkUserGroup')}}
* method：POST

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|examUserId |body |integer|学生用户 |
|examGroupIds |body |array|用户组id  可多个  为空则当前学生下的组删除|
* ex:

```
examGroupIds[]:1
examGroupIds[]:2
examGroupIds[]:3
```


###### Response:
* 返回格式:Json
* ex:
```
{
    "code": 200,
    "message": "操作成功"
    "msgkey": ""
    "response": []
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|msgkey |body |string|错误字段标识 允许为空|
|response |body |string|返回数据,数组允许为空|


## **44.  考核系统考核管理——考生管理-》用户组学生用户列表api**

 #用户组考生学员列表
* URL: /admin/examugroup/examuserlist
* URL常量：{{path('ExaminationSystem_Admin_ExamUGroup_groupListExamUser')}}
* method：POST

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|examUserId |body |integer|学生用户id |

* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response": [
     {"id":1,"title":"组1","checkFlag":1},
     {"id":2,"title":"组2","checkFlag":0},
     ]
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|msgkey |body |string|错误字段标识 允许为空|
|response |body |string|返回数据,数组允许为空|
|id |body |integer|考核用户组ID|
|title |body |string|考核用户组名称|
|checkFlag |body |integer|考核用户组是否被当前学生选择 1是 0否|



## **45.  考核系统考核管理——用户组管理-》用户组删除api**

* URL: /admin/examugroup/del
* URL常量：{{path('ExaminationSystem_Admin_ExamUGroup_del')}}
* method：POST

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|examGroupId |body |integer|用户组id|


###### Response:
* 返回格式:Json
* ex:
```
{
    "code": 200,
    "message": "操作成功"
    "msgkey": ""
    "response": []
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|msgkey |body |string|错误字段标识 允许为空|
|response |body |string|返回数据,数组允许为空|


## **46.  考核系统考核管理——用户组管理-》用户组详情api**

* URL: /admin/examugroup/info
* URL常量：{{path('ExaminationSystem_Admin_ExamUGroup_info')}}
* method：POST

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|examGroupId |body |integer|用户组id|
|pageSize |response |integer|每页显示条数 默认15 用于用户列表|
|pageIndex |response |integer|当前页数 用于用户列表|
* pageIndex pageSize 为0为空或者不传参数则显示用户组下的所有用户
###### Response:
* 返回格式:Json
* ex:
```
{
    "code": 200,
    "message": "操作成功"
    "msgkey": ""
    "response": []
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|msgkey |body |string|错误字段标识 允许为空|
|response |body |string|返回数据,数组允许为空|
|id |response |integer|用户组id|
|status |response |integer|用户状态 1开启 2关闭|
|title |response |string|用户组名称|
|info |response |string|用户组备注|
|countNum |response |integer|用户组用户总数 |
|pageSize |response |integer|每页显示条数 （pageIndex pageSize 为0为空或者不传参数则为0）|
|pageIndex |response |integer|当前页数（pageIndex pageSize 为0为空或者不传参数则为0）|
|pageNum |response |integer|总页数（pageIndex pageSize 为0为空或者不传参数则为0）|
|userList |response |array|用户组用户列表 可为空|
|id |userList |integer|学员id|
|cname |userList |integer|学员姓名|
|gender |userList |integer|学员性别  m男  w女 n未知|
|cphone |userList |integer|学员手机号码|


## **47.  考核系统考核管理——用户组修改基础信息api**

* URL: /admin/examugroup/updateinfo
* URL常量：{{path('ExaminationSystem_Admin_ExamUGroup_updateInfo')}}
* method：POST

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|examGroupId |body |integer|用户组id|
|title |body |string|用户组名称|
|status |body |integer|状态 1开启 2关闭|
|info |body |string|备注|


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
|msgkey |body |string|错误字段标识 允许为空|
|response |body |string|返回数据,数组允许为空|

## **48.  考核系统考核管理——用户组修改考生api**

* URL: /admin/examugroup/setuserlist
* URL常量：{{path('ExaminationSystem_Admin_ExamUGroup_updateUserList')}}
* method：POST

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|examGroupId |body |integer|用户组id|
|addUserList |body |array|添加的用户id 可多个  为空则不添加|
|delUserList |body |array|删除的用户id 可多个  为空则不删除|
* ex:

```
addUserList[]:1
addUserList[]:2
addUserList[]:3

delUserList[]:6
delUserList[]:5
```
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
|msgkey |body |string|错误字段标识 允许为空|
|response |body |string|返回数据,数组允许为空|



## **49.  生源管理-》批量转换为考核用户api**

* URL: /admin/examuser/setclient
* URL常量：{{path('ExaminationSystem_Admin_ExamUser_setclient')}}
* method：POST

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|clientId |body |array|转换的生源id 可多个  为空则不添加|
* ex:

```
clientId[]:1
clientId[]:2
clientId[]:3
```
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
|msgkey |body |string|错误字段标识 允许为空|
|response |body |string|返回数据,数组允许为空|


## **50.  生源管理-》批量撤销转换考核用户api**

* URL: /admin/examuser/delsetclient
* URL常量：{{path('ExaminationSystem_Admin_ExamUser_delSetclient')}}
* method：POST

###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|clientId |body |array|转换的生源id 可多个  为空则不添加|
* ex:

```
clientId[]:1
clientId[]:2
clientId[]:3
```
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
|msgkey |body |string|错误字段标识 允许为空|
|response |body |string|返回数据,数组允许为空|