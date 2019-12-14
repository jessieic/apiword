## **1.  发送短信验证码接口**

* URL: /mobile/verify
* 接口格式常量：{{path('trainsystem_web_mobile_verify')}}
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


## **2.  界面浏览人数接口**

* URL: /visits/num/{courseType}
* 接口格式常量：{{path('trainsystem_web_visits_num',{courseType:dataSecurity})}}
   or           {{path('trainsystem_web_visits_num',{courseType:informationSafety})}}
   or           {{path('trainsystem_web_visits_num',{courseType:courseTrainId})}}
* method：GET
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|courseType |body |string|课程类型（dataSecurity：大数据安全课程， informationSafety：信息安全课程） |
|courseTrainId |body |string|培训课程id|

###### Response:

* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response":
    {
        "visitsCount":880
    }
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|response |body |string|返回数据,数组允许为空|
|visitsCount |body |integer|返回数据,浏览人数|



## **3.  培训课程添加接口**

* URL: /admin/course/train/set
* 接口格式常量：{{path('trainsystem_admin_course_train_set')}}
* method：POST
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|courseTrainName |body |string|课程培训名称 |
|categoryId |body |integer|课程培训类别id |
|status |body |srring| 课程状态 开启： 'published', 关闭:'closed'|
|originalPrice |body |float|课程培训原价单价(以人为单位) |
|activityPrice |body |float|课程培训活动单价(以人为单位) |
|startTrainTime |body |string|开始报名时间 |
|endTrainTime |body |string|截止报名时间 |
|accommodate |body |integer|食宿安排 1自愿 2 统一 |
|remarks |body |string|备注|
|addressDate |body |array|课程培训地址信息(可二维数组记录、也可一维数组) |
|addressDescribe |body |integer|地址详细信息|
|addressId |body |integer|地址id  |
|startTime |body |string|开始时间|
|endTime |body |integer|结束时间|
|tempId |body |string|模板id|
|banner |body |array|焦点图模块|
|bannerImage |body |image|焦点图|
|giftFlag |body |integer|是否赠送礼品 1是，0否|
|giftId |body |integer|礼品id|
|introduce |body |array|课程介绍模块(可二维数组记录、也可一维数组)|
|trainIntroduce |body |string|课程介绍|
|title |body |string|介绍标题|
|introduceImage |body |image|介绍特点图片|
|teacher |body |array|讲师模块|
|teacherIntroduce |body |string|讲师介绍|
|teacherIds |body |string|讲师模块 选择的讲师id 使用'竖线'分割|
|courseArrangement |body |array|课程安排模块(可二维数组记录、也可一维数组)|
|arrangementName |body |string|名称|
|amTrainTheme |body |string|上午主题|
|amDescribe |body |string|上午描述|
|amTrainInfo |body |string|上午培训内容 使用'竖线'分割|
|pmTrainTheme |body |string|下午主题|
|pmDescribe |body |string|下午描述|
|pmTrainInfo |body |string|下午培训内容 使用'竖线'分割 |
|talentGap |body |array|目标人群模块(可二维数组记录、也可一维数组)|
|talentGap |body |string|目标人群介绍|
|talentGapFlag |body |string|目标人群人才缺口标识 1是 0否|
|talentGapNum |body |string|目标人群介人数|
|parentCategoryId |body |integer|目标人群父级id|
|childCategoryId |body |string|目标人群子集id 使用'竖线'分割|
|trainComment |body |array|培训评论模块|
|nickName |body |string|用户昵称|
|commentImage |body |image|用户头像|
|message |body |string|评论内容|
|createTime |body |string|添加时间|
|trainSkill |body |array|培训技能模块(可二维数组记录、也可一维数组)|
|skillImage |body |image|培训技能图片|
|describe |body |string|培训技能描述|


* addressDate 课程培训地址信息 请求格式:array
* ex:

```
addressDate['addressId']:1
 addressDate['addressDescribe']:'海淀黄庄28号'
 addressDate['startTime']:'2018-08-15 08:00:00'
 addressDate['endTime']:'2018-08-19 19:00:00'
或者
 addressDate[0]['addressId']:1
 addressDate[0]['addressDescribe']:'海淀黄庄28号'
 addressDate[0]['startTime']:'2018-08-15 08:00:00'
 addressDate[0]['endTime']:'2018-08-19 19:00:00'

```


* banner 焦点图模块 请求格式:array
* ex:

```
 FILE['imageAddress']['bannerImage']:FILE
 banner['giftFlag']:'1'
 banner['giftId']:'12'

```

* introduce 课程介绍模块 请求格式:array
* ex:

```
 FILE['imageAddress']['introduceImage']:FILE
 introduce['trainIntroduce']:'课程介绍'
 introduce['info']['title']:'介绍标题'
 introduce['info']['describe']:'介绍描述'
 或者
  introduce['info'][0]['title']:'介绍标题'
  introduce['info'][0]['describe']:'介绍描述'

```

* teacher 讲师模块 请求格式:array
* ex:

```
 teacher['teacherIntroduce']:'讲师介绍'
 teacher['teacherIds']:'2|3|4|5'

```

* courseArrangement 课程安排模块 请求格式:array
* ex:

```
 courseArrangement['arrangementName']:'名称'
 courseArrangement['amTrainTheme']:'上午主题'
 courseArrangement['amDescribe']:'上午描述'
 courseArrangement['amTrainInfo']:'上午培训内容|上午培训内容|上午培训内容'
 courseArrangement['pmTrainTheme']:'下午主题'
 courseArrangement['pmDescribe']:'下午描述'
 courseArrangement['pmTrainInfo']:'下午培训内容|下午培训内容|下午培训内容'
或者
 courseArrangement[0]['arrangementName']:'名称'
 courseArrangement[0]['amTrainTheme']:'上午主题'
 courseArrangement[0]['amDescribe']:'上午描述'
 courseArrangement[0]['amTrainInfo']:'上午培训内容|上午培训内容|上午培训内容'
 courseArrangement[0]['pmTrainTheme']:'下午主题'
 courseArrangement[0]['pmDescribe']:'下午描述'
 courseArrangement[0]['pmTrainInfo']:'下午培训内容|下午培训内容|下午培训内容'
```

* talentGap 目标人群模块 请求格式:array
* ex:

```
 talentGap['talentGapIntroduce']:'目标人群介绍'
 talentGap['info'][0]['parentCategoryId']:'1'
 talentGap['info'][0]['childCategoryId']:'2|3|4|5'
 talentGap['info'][1]['parentCategoryId']:'6'
 talentGap['info'][1]['childCategoryId']:'7|8|9'
```

* trainComment 培训评论模块 请求格式:array
* ex:

```
FILE['imageAddress']['commentImage']:
 trainComment['nickName']:'用户昵称
 trainComment['message']:'评论内容评论内容评论内容 '
 trainComment['createTime']:'2018-08-19 19:00:00'
或者
FILE['imageAddress']['commentImage']:
 trainComment[0]['nickName']:'用户昵称
 trainComment[0]['message']:'评论内容评论内容评论内容 '
 trainComment[0]['createTime']:'2018-08-19 19:00:00'
```

* trainSkill 培训技能模块 请求格式:array
* ex:

```
 FILE['imageAddress']['skillImage']:'海淀黄庄28号'
 trainSkill['describe']:'啊稍等热'
 或者
  FILE['imageAddress']['skillImage']:'海淀黄庄28号'
  trainSkill[0]['describe']:'啊稍等热'
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
|response |body |string|返回数据,数组允许为空|

## **4.  培训课程修改接口**

* URL: /admin/course/train/update/{id}
* 接口格式常量：{{path('trainsystem_admin_course_train_set')}}
* method：POST
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|id |body |string|课程培训id |
|courseTrainName |body |string|课程培训名称 |
|categoryId |body |integer|课程培训类别id |
|status |body |srring| 课程状态 开启： 'published', 关闭:'closed'|
|originalPrice |body |float|课程培训原价单价(以人为单位) |
|activityPrice |body |float|课程培训活动单价(以人为单位) |
|startTrainTime |body |string|开始报名时间 |
|endTrainTime |body |string|截止报名时间 |
|accommodate |body |integer|食宿安排 1自愿 2 统一 |
|remarks |body |string|备注|
|addressDate |body |array|课程培训地址信息 |
|info |body |array|添加课程培训地址信息(可二维数组记录、也可一维数组) |
|addressDescribe |body |string|地址详细信息|
|addressId |body |integer|地址id |
|startTime |body |string|开始时间|
|endTime |body |integer|结束时间|
|update |body |array|修改课程培训地址信息(可二维数组记录、也可一维数组) |
|id |body |integer|培训地址日期id  |
|addressId |body |integer|地址id  |
|dateId |body |integer|日期id  |
|addressDescribe |body |string|地址详细信息|
|startTime |body |string|开始时间|
|endTime |body |integer|结束时间|
|delAddressDateIds |body |array|删除的课程培训地址id|
|tempId |body |string|模板id|
|banner |body |array|焦点图模块|
|bannerImage |body |image|焦点图|
|giftFlag |body |integer|是否赠送礼品 1是，0否|
|giftId |body |integer|礼品id|
|introduce |body |array|课程介绍模块|
|trainIntroduce |body |string|课程介绍|
|info |body |array|添加课程介绍(可二维数组记录、也可一维数组)|
|title |body |string|介绍标题|
|imageAddress |body |image|介绍特点图片|
|describe |body |string|介绍描述|
|update |body |array|更新课程介绍(可二维数组记录、也可一维数组)|
|id |body |string|课程介绍id|
|title |body |string|介绍标题|
|describe |body |string|介绍描述|
|delIntroduceIds |body |array|删除的课程介绍id|
|teacher |body |array|讲师模块|
|teacherIntroduce |body |string|讲师介绍|
|teacherIds |body |string|讲师模块 选择的讲师id 使用'竖线'分割|
|courseArrangement |body |array|课程安排模块|
|info |body |array|添加课程安排模块(可二维数组记录、也可一维数组)|
|arrangementName |body |string|名称|
|amTrainTheme |body |string|上午主题|
|amDescribe |body |string|上午描述|
|amTrainInfo |body |string|上午培训内容 使用'竖线'分割|
|pmTrainTheme |body |string|下午主题|
|pmDescribe |body |string|下午描述|
|pmTrainInfo |body |string|下午培训内容 使用'竖线'分割 |
|update |body |array|修改课程安排模块(可二维数组记录、也可一维数组)|
|id |body |string|课程安排id|
|arrangementName |body |string|名称|
|amTrainTheme |body |string|上午主题|
|amDescribe |body |string|上午描述|
|amTrainInfo |body |string|上午培训内容 使用'竖线'分割|
|pmTrainTheme |body |string|下午主题|
|pmDescribe |body |string|下午描述|
|pmTrainInfo |body |string|下午培训内容 使用'竖线'分割 |
|delCourseArrangementIds |body |array|删除的课程安排id|
|talentGap |body |array|目标人群模块|
|talentGapIntroduce |body |string|目标人群介绍|
|parentCategoryId |body |integer|目标人群父级id|
|childCategoryId |body |string|目标人群子集id 使用'竖线'分割|
|trainComment |body |array|培训评论模块|
|nickName |body |string|用户昵称|
|imageAddress |body |image|用户头像|
|message |body |string|评论内容|
|createTime |body |string|添加时间|
|trainSkill |body |array|培训技能模块|
|info |body |array|添加培训技能模块(可二维数组记录、也可一维数组)|
|imageAddress |body |image|培训技能图片|
|describe |body |string|培训技能描述|
|update |body |array|修改培训技能模块(可二维数组记录、也可一维数组)|
|id |body |integer|培训技能id|
|describe |body |string|培训技能描述|
|delTrainSkillIds |body |array|删除的培训技能id|

* addressDate 课程培训地址信息 请求格式:array
* ex:

```
 addressDate[info]['addressId']:1
 addressDate[info]['addressInfo']:'海淀黄庄28号'
 addressDate[info]['startTime']:'2018-08-15 08:00:00'
 addressDate[info]['endTime']:'2018-08-19 19:00:00'
 addressDate[update]['id']:1
 addressDate[update]['addressId']:1
 addressDate[update]['dateId']:'1'
 addressDate[update]['addressDescribe']:'地址详细信息'
 addressDate[update]['startTime']:'2018-08-15 08:00:00'
 addressDate[update]['endTime']:'2018-08-19 19:00:00'
 addressDate[delAddressDateIds][0]:1
 addressDate[delAddressDateIds][1]:2
或者
 addressDate[info][0]['addressId']:1
 addressDate[info][0]['addressInfo']:'海淀黄庄28号'
 addressDate[info][0]['startTime']:'2018-08-15 08:00:00'
 addressDate[info][0]['endTime']:'2018-08-19 19:00:00'
 addressDate[update][0]['id']:1
 addressDate[update][0]['addressId']:1
 addressDate[update][0]['dateId']:'1'
 addressDate[update][0]['addressDescribe']:'地址详细信息'
 addressDate[update][0]['startTime']:'2018-08-15 08:00:00'
 addressDate[update][0]['endTime']:'2018-08-19 19:00:00'
 addressDate[delAddressDateIds][0]:1
 addressDate[delAddressDateIds][1]:2
```

* banner 焦点图模块 请求格式:array
* ex:

```
 banner['bannerImage']:FILE
 banner['giftFlag']:'1'
 banner['giftId']:'12'

```

* introduce 课程介绍模块 请求格式:array
* ex:

```
 FILE['imageAddress']['introduceImage']:FILE
 introduce['trainIntroduce']:'课程介绍'
  introduce['info']['title']:'介绍标题'
  introduce['info']['describe']:'介绍描述'

  introduce['update']['id']:'1'
  introduce['update']['title']:'介绍标题'
  introduce['update']['describe']:'介绍描述'
  introduce['delIntroduceIds'][0]:1
  introduce['delIntroduceIds'][1]:2
 或者

 introduce['info'][0]['title']:'介绍标题'
 introduce['info'][0]['describe']:'介绍描述'

 introduce['update'][0]['id']:'1'
 introduce['update'][0]['title']:'介绍标题'
 introduce['update'][0]['describe']:'介绍描述'

  introduce['delIntroduceIds'][0]:1
  introduce['delIntroduceIds'][1]:2
```

* teacher 讲师模块 请求格式:array
* ex:

```
 teacher['teacherIntroduce']:'讲师介绍'
 teacher['teacherIds']:'2|3|4|5'

```

* courseArrangement 课程安排模块 请求格式:array
* ex:

```

 courseArrangement['info']['arrangementName']:'名称'
 courseArrangement['info']['amTrainTheme']:'上午主题'
 courseArrangement['info']['amDescribe']:'上午描述'
 courseArrangement['info']['amTrainInfo']:'上午培训内容|上午培训内容|上午培训内容'
 courseArrangement['info']['pmTrainTheme']:'下午主题'
 courseArrangement['info']['pmDescribe']:'下午描述'
 courseArrangement['info']['pmTrainInfo']:'下午培训内容|下午培训内容|下午培训内容'

 courseArrangement['update']['id']:'课程安排id'
 courseArrangement['update']['arrangementName']:'名称'
 courseArrangement['update']['amTrainTheme']:'上午主题'
 courseArrangement['update']['amDescribe']:'上午描述'
 courseArrangement['update']['amTrainInfo']:'上午培训内容|上午培训内容|上午培训内容'
 courseArrangement['update']['pmTrainTheme']:'下午主题'
 courseArrangement['update']['pmDescribe']:'下午描述'
 courseArrangement['update']['pmTrainInfo']:'下午培训内容|下午培训内容|下午培训内容'

 courseArrangement['delCourseArrangementIds'][0]:1
 courseArrangement['delCourseArrangementIds'][1]:2
或者

 courseArrangement['info'][0]['arrangementName']:'名称'
 courseArrangement['info'][0]['amTrainTheme']:'上午主题'
 courseArrangement['info'][0]['amDescribe']:'上午描述'
 courseArrangement['info'][0]['amTrainInfo']:'上午培训内容|上午培训内容|上午培训内容'
 courseArrangement['info'][0]['pmTrainTheme']:'下午主题'
 courseArrangement['info'][0]['pmDescribe']:'下午描述'
 courseArrangement['info'][0]['pmTrainInfo']:'下午培训内容|下午培训内容|下午培训内容'

 courseArrangement['update'][0]['id']:'课程安排id'
 courseArrangement['update'][0]['arrangementName']:'名称'
 courseArrangement['update'][0]['amTrainTheme']:'上午主题'
 courseArrangement['update'][0]['amDescribe']:'上午描述'
 courseArrangement['update'][0]['amTrainInfo']:'上午培训内容|上午培训内容|上午培训内容'
 courseArrangement['update'][0]['pmTrainTheme']:'下午主题'
 courseArrangement['update'][0]['pmDescribe']:'下午描述'
 courseArrangement['update'][0]['pmTrainInfo']:'下午培训内容|下午培训内容|下午培训内容'


 courseArrangement['delCourseArrangementIds'][0]:1
 courseArrangement['delCourseArrangementIds'][1]:2
```

* talentGap 目标人群模块 请求格式:array
* ex:

```
 talentGap['talentGap']:'目标人群介绍'
 talentGap['parentCategoryId']:'1'
 talentGap['childCategoryId']:'2|3|4|5'
```

* trainComment 培训评论模块 请求格式:array
* ex:

```
FILE['imageAddress']['commentImage']:FILE
 trainComment['nickName']:'用户昵称
 trainComment['imageAddress']:
 trainComment['message']:'评论内容评论内容评论内容 '
 trainComment['createTime']:'2018-08-19 19:00:00'
```

* trainSkill 培训技能模块 请求格式:array
* ex:

```
 FILE['imageAddress']['skillImage']:FILE
  trainSkill['info']['describe']:'啊稍等热'
  trainSkill['update']['id']:'1'
  trainSkill['update']['describe']:'啊稍等热'
  trainSkill['delTrainSkillIds'][0]:1
  trainSkill['delTrainSkillIds'][1]:2
 或者
 trainSkill['info'][0]['describe']:'啊稍等热'
 trainSkill['update'][0]['id']:'1'
 trainSkill['update'][0]['describe']:'啊稍等热'
 trainSkill['delTrainSkillIds'][0]:1
 trainSkill['delTrainSkillIds'][1]:2

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
|response |body |string|返回数据,数组允许为空|


## **5.  培训课程详情接口**

* URL: /course/train/get/info/{id}
* 接口格式常量：{{path('trainsystem_web_course_train_get_info')}}
* method：GET
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|id |body |string|课程培训id |


###### Response:

* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": ""
    "response":
    {
        "id":1
        "courseTrainName":"瑞星信息数据安全"
        "categoryId" : 1
        "introduce" : ""
        "originalPrice" :  "9800"
        "activityPrice" :  "4800"
        "status":   "published"
        "accommodate":   "1"
        "startTrainTime": "2018-07-19 "
        "endTrainTime":"2018-09-19 "
        "createTime":  "2018-07-19 "
        "categoryName": ""
        "remarks": "备注"
        "dateAddressInfo":
        [
            {
                "id":   1
                "addressId":   1
                "addressName":  "名称1"
                "addressDescribe": "描述1"
                "dateId":        1
                "dateName":    "0818(全天"
                "startTime":   "2018-08-18"
                "endTime":     "2018-08-22 "
            }
            {
                "id":   2
                "addressId":   2
                "addressName":  "名称2"
                "addressDescribe": "描述1"
                "dateId":        2
                "dateName":    "0825(全天)"
                "startTime":   "2018-08-25"
                "endTime":     "2018-08-29 "
            }
        ]
        "banner":
            "info":
            {
                "fileName":           "wejin"
                "imageType":          "jpg"
                "imageAddress":          "aaaa"
                "imageSize":           "12343"
                "source":          true
                "id":          1
            }
            "giftFlag": 1
            "giftList":
            [
                {
                    "giftId":            1
                    "giftMessage":            "sdfwerwer"
                    "createTime":            2018-04-13  23:26:25
                    "giftCheck":            1
                },
                {
                    "giftId":            2
                    "giftMessage":            "wewe"
                    "createTime":            2018-04-13  23:26:25
                    "giftCheck":            0
                }
            ]
        "introduce" :
            "trainIntroduce": ""
            "info":
            [
                {
                    "title":      "titletitle"
                    "imageId":      5
                    "describes":      "describedescribedescribedescribe"
                    "id":      9
                    "fileName":      0
                    "imageType":      1
                    "imageAddress":      2
                    "imageSize":      3
                    "source":      4
                },
                {
                    "title":      "titletitle"
                    "imageId":      5
                    "describes":      "describedescribedescribedescribe"
                    "id":      10
                    "fileName":      0
                    "imageType":      1
                    "imageAddress":      2
                    "imageSize":      3
                    "source":      4
                }
            ]

        "teacher":
            "teacherIntroduce":  "teacherIntroduceteacherIntroduce"
            "info":
            [
                {
                    "teacherName":      "teacherName"
                    "teacherNickname":
                    "professionalTitle":      "professionalTitle"
                    "describeTitle":      "describeTitle"
                    "imageId":      5
                    "describes":      8 "describe"
                    "createTime":      1534831901
                    "id":      1
                    "teacherCheck":      0
                    "fileName":      0
                    "imageType":      1
                    "imageAddress":      2
                    "imageSize":      3
                     "source":      4
                },
                {
                    "teacherName":      "teacherName"
                    "teacherNickname":
                    "professionalTitle":      "professionalTitle"
                    "describeTitle":      "describeTitle"
                    "imageId":      5
                    "describes":      8 "describe"
                    "createTime":      1534831901
                    "id":      1
                    "teacherCheck":      0
                    "fileName":      0
                    "imageType":      1
                    "imageAddress":      2
                    "imageSize":      3
                    "source":      4
                }
            ]
        "talentGaps":
            "talentGapIntroduce": ""
            "talentGapFlag": ""
            "talentGapNum": ""
            "info":
            [
                {
                    "id":      3
                    "categoryName":       "a"
                    "parentId":
                    "description":      "aaaaaaaaaaaaaaaaa"
                    "talentGapCheck":      0
                },
                {
                    "id":      4
                    "categoryName":       "aa"
                    "parentId":      0
                    "description":      "3333333aa"
                    "talentGapCheck":      0
                    "subset":
                    [
                        {
                            "id":            9
                            "categoryName":             "ba"
                            "parentId":            4
                            "description":            "4444444ba"
                            "talentGapCheck":            0
                        },
                        {
                            "id":            10
                            "categoryName":             "bc"
                            "parentId":            4
                            "description":            "4444444bc"
                            "talentGapCheck":            0
                        }
                    ]
                 },
                {
                    "id":      5
                    "categoryName":      "ab"
                    "parentId":      3
                    "description":      "3333333ab"
                    "talentGapCheck":      0
                    "subset":
                    {
                        "id":            11
                        "categoryName":             "ca"
                        "parentId":            5
                        "description":             "555555ca"
                        "talentGapCheck":            0
                    }
                }
            ]

        "courseArrangement" :
        [
            {
                "courseTrainId":    28
                "arrangementName":    "arrangementNamearrangementName"
                "amTrainTheme":    "amTrainInfo"
                "amDescribe":    "amDescribeamDescribe"
                "amTrainInfo":
                "pmTrainTheme":    "pmTrainTheme"
                "pmDescribe":    "pmDescribe"
                "pmTrainInfo":    "pmTrainInfo"
                "createTime":    1534751363
                "id":    7
            },
            {
                "courseTrainId":    28
                "arrangementName":    "arrangementNamearrangementName"
                "amTrainTheme":    "amTrainInfo"
                "amDescribe":    "amDescribeamDescribe"
                "amTrainInfo":
                "pmTrainTheme":    "pmTrainTheme"
                "pmDescribe":    "pmDescribe"
                "pmTrainInfo":    "pmTrainInfo"
                "createTime":    1534751388
                "id":    8
            }
        ]
        "trainComment":
        [
            {
                "nikeName":       "nickName"
                "imageId":      5
                "message":      7 "message"
                "createTime":      0
                "id":      6
                "fileName":      0
                "imageType":      1
                "imageAddress":      ''
                "imageSize":      3
                "source":      4
            },
            {
                "nikeName":       "nickName"
                "message":      "message"
                "createTime":      0
                "id":      7
                "fileName":       "wejin"
                "imageType":      "jpg"
                "imageAddress":      "aaaa"
                "imageSize":       "12343"
                "source":      true
                "imageId":      1
            }
        ]
        "trainSkill":
        [
            {
                "id":    2
                "title":
                "describes":    "describedescribe"
                "fileName":     "wejin"
                "imageType":    "jpg"
                "imageAddress":    "aaaa"
                "imageSize":     "12343"
                "source":    true
                "imageId":    1
            },
            {
                "id":    3
                "title":
                "describes":    "describedescribe"
                "fileName":     "wejin"
                "imageType":    "jpg"
                "imageAddress":    "aaaa"
                "imageSize":     "12343"
                "source":    true
                "imageId":    1
            }
        ]
        "tempInfo":
        [
            {
                "tempId":1,
                "tempName":"模板名称11",
                "tempVersion":"1.0",
                "tempCreateTime":"2018-08-15 15:32:00",
                "tempCourseNum":"23",
                "tempSmallImage":"",
                "tempImage":"",
                "tempConfig":
                [
                    {
                        "model":"a",
                        "image":""
                    },
                    {
                        "model":"b",
                        "image":""
                    },
                    {
                        "model":"c",
                        "image":""
                    },
                ]
            },
            {
                "tempId":1,
                "tempName":"模板名称11",
                "tempVersion":"1.0",
                "tempCreateTime":"2018-08-16 16:32:00",
                "tempCourseNum":"45",
                "tempSmallImage":"",
                "tempImage":"",
                "tempConfig":
                [
                    {
                        "model":"a",
                        "image":""
                    },
                    {
                        "model":"b",
                        "image":""
                    },
                    {
                        "model":"c",
                        "image":""
                    },
                ]
            }
            ]
    }
}

```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|response |body |string|返回数据,数组允许为空|
|courseTrainName |body |string|课程培训名称 |
|categoryId |body |integer|课程培训类别id |
|categoryName |body |integer|课程培训类别名称 |
|status |body |srring| 课程状态 开启： 'published', 关闭:'closed'|
|originalPrice |body |float|课程培训原价单价(以人为单位) |
|activityPrice |body |float|课程培训活动单价(以人为单位) |
|accommodate |body |integer|食宿安排 1自愿 2 统一 |
|startTrainTime |body |string|课程开始报名时间 |
|endTrainTime |body |string|课程结束报名时间 |
|remarks |body |string|备注|
|createTime |body |string|课程添加时间|
|tempId |body |string|模板id|
|dateAddressInfo |body |array|课程培训地址信息 |
|id |body |integer|培训地址日期id  |
|addressId |body |integer|地址id  |
|dateId |body |integer|日期id  |
|addressName |body |string|地址名称|
|addressDescribe |body |integer|地址详细信息|
|dateName |body |string|时间名称描述|
|startTime |body |string|开始时间|
|endTime |body |integer|结束时间|
|banner |body |array|焦点图模块|
|giftFlag |body |integer|是否赠送礼品 1是，0否|
|giftList |body |array|礼品列表|
|giftId |body |integer|礼品id|
|giftMessage |body |integer|礼品描述|
|createTime |body |integer|礼品创建时间|
|giftCheck |body |integer|礼品是否被选择 1是 0否|
|info |body |array|焦点图信息|
|imageId |body |integer|图片id|
|fileName |body |string|图片名称|
|imageType |body |string|文件类型|
|imageAddress |body |string|文件地址|
|imageSize |body |string|文件大小|
|source |body |string|文件来源 1上传， 2分享，3公共资料|
|introduce |body |array|课程介绍模块|
|trainIntroduce |body |string|课程介绍|
|info |body |array|课程介绍详情|
|id |body |integer|课程介绍id|
|title |body |string|介绍标题|
|describes |body |string|介绍描述|
|imageId |body |integer|图片id|
|fileName |body |string|图片名称|
|imageType |body |string|文件类型|
|imageAddress |body |string|文件地址|
|imageSize |body |string|文件大小|
|source |body |string|文件来源 1上传， 2分享，3公共资料|
|teacher |body |array|讲师模块|
|teacherIntroduce |body |string|讲师介绍|
|info |body |array|讲师列表详情|
|id |body |integer|讲师id|
|teacherCheck |body |string|讲师是否被选择 1是  0否|
|teacherName |body |string|讲师名称|
|teacherNickname |body |string|讲师昵称|
|professionalTitle |body |string|讲师讲师职称|
|describeTitle |body |string|讲师描述标题|
|describes |body |string|讲师描述|
|createTime |body |string|讲师添加时间|
|imageId |body |integer|图片id|
|fileName |body |string|图片名称|
|imageType |body |string|文件类型|
|imageAddress |body |string|文件地址|
|imageSize |body |string|文件大小|
|source |body |string|文件来源 1上传， 2分享，3公共资料|
|talentGaps |body |array|目标人群模块|
|talentGapIntroduce |body |string|目标人群介绍|
|talentGapFlag |body |string|目标人群人才缺口标识 1是 0否|
|talentGapNum |body |string|目标人群介人数|
|info |body |array|目标人群列表|
|id |body |integer|目标人群id|
|categoryName |body |string|目标人群名称|
|parentId |body |integer|目标人群父id|
|description |body |string|目标人群描述|
|talentGapCheck |body |integer|目标人群是否被选择  1是  0否|
|subset |body |array|子集|
|id |body |integer|目标人群id|
|categoryName |body |string|目标人群名称|
|parentId |body |integer|目标人群父id|
|description |body |string|目标人群描述|
|talentGapCheck |body |integer|目标人群是否被选择  1是  0否|
|courseArrangement |body |array|课程安排模块|
|id |body |integer|课程安排id|
|arrangementName |body |string|名称|
|amTrainTheme |body |string|上午主题|
|amDescribe |body |string|上午描述|
|amTrainInfo |body |string|上午培训内容 使用'竖线'分割|
|pmTrainTheme |body |string|下午主题|
|pmDescribe |body |string|下午描述|
|pmTrainInfo |body |string|下午培训内容 使用'竖线'分割 |
|trainComment |body |array|培训评论模块|
|id |body |integer|评论id|
|nickName |body |string|用户昵称|
|message |body |string|评论内容|
|createTime |body |string|添加时间|
|imageId |body |integer|图片id|
|fileName |body |string|图片名称|
|imageType |body |string|文件类型|
|imageAddress |body |string|文件地址|
|imageSize |body |string|文件大小|
|source |body |string|文件来源 1上传， 2分享，3公共资料|
|trainSkill |body |array|培训技能模块|
|id |body |integer|培训id|
|title |body |image|培训标题|
|describes |body |string|培训技能描述|
|imageId |body |integer|图片id|
|fileName |body |string|图片名称|
|imageType |body |string|文件类型|
|imageAddress |body |string|文件地址|
|imageSize |body |string|文件大小|
|source |body |string|文件来源 1上传， 2分享，3公共资料|
|tempInfo |body |array|模板详情|
|tempId |body |string|模板id|
|tempName |body |string|模板名称|
|tempVersion |body |string|模板版本|
|tempCreateTime |body |string|模板创建时间|
|tempCourseNum |body |string|模板热度|
|tempSmallImage |body |string|模板缩略图|
|tempImage |body |string|模板原始图|
|tempConfig |body |array|模板配置|
|model |body |string|模板模块名称|
|image |body |string|模板模块图片|


## **6.  培训课程删除接口**

* URL: /admin/course/train/remove
* 接口格式常量：{{path('trainsystem_admin_course_train_remove')}}
* method：POST
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|delCourseIds |body |array/integer|课程id |

###### Response:

* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response":[]
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|response |body |string|返回数据,数组允许为空|



## **7.  分类添加接口**

* URL: /admin/category/set
* 接口格式常量：{{path('trainsystem_admin_setcategory')}}
* method：POST
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|categoryName |body |string|分类名称 |
|description |body |integer|分类描述 |
|parentId |body |integer|分类父级id |

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

## **8.  分类修改接口**

* URL: /admin/category/update/{id}
* 接口格式常量：{{path('trainsystem_admin_updatecategory_info',{id:1})}}
* method：POST
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|id |body |string|分类id |
|categoryName |body |string|分类名称 |
|description |body |integer|分类描述 |


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


## **9.  分类详情接口**

* URL: /admin/category/get/info/{id}
* 接口格式常量：{{path('trainsystem_admin_getcategory_info',{id:1})}}
* method：GET
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|id |body |string|分类id |


###### Response:

* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": ""
    "response": {
      "id":int(1)
      "categoryName":sting"分类"
      "description":sting"描述"
    }
}

```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|response |body |string|返回数据,数组允许为空|
|id |body |string|分类id |
|categoryName |body |string|分类名称 |
|description |body |integer|分类描述 |

## **10.  分类删除接口**

* URL: /admin/category/remove/{id}
* 接口格式常量：{{path('trainsystem_admin_category_remove',{id:1})}}
* method：GET
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|id |body |integer|课程id |

###### Response:

* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response":[]
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|response |body |string|返回数据,数组允许为空|


## **11.  分类列表接口**

* URL: /admin/category/list
* 接口格式常量：{{path('trainsystem_admin_category_list')}}
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
    "message": ""
    "response":
    [
    {
          "id":1
          "categoryName":"分类1"
          "description":"描述1"
          "parentId":"0"
          "createTime":"2018-07-19 "
    }
    {
          "id":2
          "categoryName": "分类2"
          "description": "描述2"
          "parentId":"0"
          "createTime":"2018-07-19 "
        }
    ]
}

```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|response |body |string|返回数据,数组允许为空|
|id |body |string|分类id |
|categoryName |body |string|分类名称 |
|description |body |string|分类描述 |
|parentId |body |integer|分类父级id |
|createTime |body |string|分类创建时间 |



## **12.  地址列表接口**

* URL: /admin/address/train/list
* 接口格式常量：{{path('trainsystem_admin_address_train_list')}}
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
    "message": ""
    "response":
    [
    {
          "id":1
          "addressName":"地址名称1"
          "description":"描述1"
          "createTime":"2018-07-19 "
    }
    {
           "id":2
           "addressName":"地址名称1"
           "description":"描述1"
           "createTime":"2018-07-19 "
        }
    ]
}

```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|response |body |string|返回数据,数组允许为空|
|id |body |string|分类id |
|addressName |body |string|地址名称 |
|description |body |integer|地址描述 |
|createTime |body |string|创建时间 |


## **13.  时间列表接口**

* URL: /admin/date/train/list
* 接口格式常量：{{path('trainsystem_admin_date_train_list')}}
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
    "message": ""
    "response":
    [
    {
          "id":1
          "dateName":"时间名称1"
          "startTime":"2018-08-22 "
          "endTime":"2018-08-26 "
          "createTime":"2018-07-19 "
    }
    {
        "id":2
        "dateName":"时间名称2"
        "startTime":"2018-08-28 "
        "endTime":"2018-08-29 "
        "createTime":"2018-07-19 "
        }
    ]
}

```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|response |body |string|返回数据,数组允许为空|
|id |body |string|分类id |
|dateName |body |string|时间名称 |
|startTime |body |string|开始时间 |
|endTime |body |string|结束时间 |
|createTime |body |string|创建时间1 |


## **14.  角色列表**

* URL: /admin/role/list
* 接口格式常量：{{path('trainsystem_admin_role_List'}}
* method：GET
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|id |body |string|用户id |



###### Response:

* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response": [
    {"id":2,
    "roleCode":"dfg",
    "roleName":"srwerwe",
    "description":"",
    "createTime":""}
    ]
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|response |body |string|返回数据,数组允许为空|
|id |body |string|角色id |
|roleName |body |string|角色名称 |
|roleCode |body |string|角色编码 |
|description |body |string|角色描述 |
|createTime |body |string|角色创建时间 |


## **15.  添加账号信息**

* URL: /admin/user/set
* 接口格式常量：{{path('trainsystem_admin_setuser')}}
* method：POST
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|user |body |string|用户名 |
|password |body |string|密码 |
|roleId |body |string|角色id |
|mobile |body |string|电话号码 |
|email |body |string|邮箱 |
|username |body |string|用户昵称 |
|isActive |body |string|状态  1启用  2不启用 |
|remark |body |string|备注 |


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


## **16.  修改账号信息**

* URL: /admin/user/update/{id}
* 接口格式常量：{{path('trainsystem_admin_setuser_info',{id:1})}}
* method：POST
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|id |body |string|用户id |
|user |body |string|用户名 |
|password |body |string|用户密码|
|roleId |body |string|角色id |
|mobile |body |string|电话号码 |
|email |body |string|邮箱 |
|username |body |string|用户昵称 |
|isActive |body |string|状态  1启用  2不启用 |
|remark |body |string|备注 |

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


## **17. 账号详情信息**

* URL: /admin/user/get/info/{id}
* 接口格式常量：{{path('trainsystem_admin_getuser_info',{id:1})}}
* method：GET
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|id |body |string|用户id |



###### Response:

* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response": {
    "id":1,
    "user":"test1",
    "roleId":2,
    "username":"1aaaaa",
    "mobile":"15230021458",
    "email":"1232@qq.com",
    "loginTime":"",
    "lastLoginTime":"",
    "roleName":"srwerwe",
    "roleCode":"dfg"，
    "isActive":"1"，
    "remark":"dfg"，
    }
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|response |body |string|返回数据,数组允许为空|
|id |body |string|用户id |
|user |body |string|用户名 |
|roleId |body |string|角色id |
|roleName |body |string|角色名称 |
|roleCode |body |string|角色编码 |
|username |body |string|用户昵称 |
|mobile |body |string|电话号码 |
|email |body |string|邮箱 |
|loginTime |body |string|登录时间 |
|lastLoginTime |body |string|最后一次登录时间 |
|isActive |body |string|状态  1启用  2不启用 |
|remark |body |string|备注 |

## **18.  删除账号**

* URL: /admin/user/remove
* 接口格式常量：{{path('trainsystem_admin_tuser_remove')}}
* method：POST
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|userIds |body |array|用户ids |



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
|response |body |array|返回数据,数组允许为空 多维数组|
|user |body |array|返回数据 用户名|
|username |body |string|用户昵称 |


## **19.  修改账号密码**

* URL: /admin/user/check/password
* 接口格式常量：{{path('trainsystem_admin_tuser_check_password')}}
* method：POST
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|userId |body |integer|用户id |
|newPassword |body |string|新密码 |
|confirmPassword |body |string|旧密码 |


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



## **20.  账号状态修改接口**

* URL: /admin/user/check/status
* 接口格式常量：{{path('trainsystem_admin_tuser_check_status')}}
* method：POST
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|userId |body |integer|用户id |


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



## **21.  模板列表**
* URL: /admin/temp/list
* 接口格式常量：{{path('trainsystem_admin_temp_list')}}
* method：GET
###### Request：



###### Response:

* 返回格式:html
* ex:

```


     'banner',//焦点图gift 礼品
     'train_introduce',//描述详情
     'teachers',//讲师
     'talent_gap',//目标人群
     'train_course_arrangement',//课程安排
     'train_comments',//培训评论
     'train_skill',//培训技能
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|response |body |string|返回数据,数组允许为空|
|tempId |body |string|模板id|
|tempName |body |string|模板名称|
|tempVersion |body |string|模板版本|
|tempCreateTime |body |string|模板创建时间|
|tempCourseNum |body |string|模板热度|
|tempSmallImage |body |string|模板缩略图|
|tempImage |body |string|模板原始图|
|tempConfig |body |array|模板配置|
|model |body |string|模板模块名称|
|image |body |string|模板模块图片|



## **22.  目标人群添加类别接口**

* URL: /admin/talentgap/set
* 接口格式常量：{{path('trainsystem_admin_talentgap_set')}}
* method：POST
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|categoryName |body |string|分类名称 |
|description |body |integer|分类描述 |
|parentId |body |integer|分类父级id |

###### Response:

* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response":
    {
       "id":      3
       "categoryName":       "a"
       "parentId":
       "description":      "aaaaaaaaaaaaaaaaa"
   }
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|response |body |string|返回数据,数组允许为空|


## **23.  更新图片接口**

* URL: /admin/image/update
* 接口格式常量：{{path('trainsystem_admin_image_update')}}
* method：POST
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|imageId |body |string|文件id |
|courseTrainId |body |string|培训课程id |
|imageAddress |body |FILE|更新的图片object|

imageAddress：
FILE['imageAddress']: FILE  更新的图片object
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


## **24.  添加教师接口**

* URL: /admin/teacher/set
* 接口格式常量：{{path('trainsystem_admin_teacher_set')}}
* method：POST
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|teacherName |body |string|教师名称 |
|professionalTitle |body |string|教师职位 |
|describeTitle |body |string|教师擅长信息|
|describe |body |string|教师描述|
|teacherImage |body |FILE|教师头像图片object|

imageAddress：
FILE['teacherImage']: FILE  教师头像图片object
###### Response:

* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response": {
    "teacherName":"teacherName",
    "teacherNickname":"",
    "professionalTitle":"professionalTitle",
    "describeTitle":"describeTitle",
    "imageId":"1",
    "describes":"describe",
    "createTime":"2018-08-21  08:21:20",
    "id":8
   "fileName":      0
   "imageType":      1
   "imageAddress":      2
   "imageSize":      3
   "source":      4
    }

}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|response |body |string|返回数据,数组允许为空|
|teacherName |body |string|教师名称 |
|teacherNickname |body |string|教师昵称 |
|professionalTitle |body |string|教师职位 |
|describeTitle |body |string|教师擅长信息|
|describe |body |string|教师描述|
|fileName |body |string|图片名称|
|imageType |body |string|文件类型|
|imageAddress |body |string|文件地址|
|imageSize |body |string|文件大小|
|source |body |string|文件来源 1上传， 2分享，3公共资料|


## **25.  礼品列表接口**

* URL: /admin/gift/list
* 接口格式常量：{{path('trainsystem_admin_gift_list')}}
* method：POST
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|page |body |integer|当前页 |
|pageSize |body |integer|每页显示条数 |

###### Response：

* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response":
    [
        {
            "giftId":            1
            "giftMessage":            "sdfwerwer"
            "createTime":            2018-04-13  23:26:25
        },
        {
            "giftId":            2
            "giftMessage":            "wewe"
            "createTime":            2018-04-13  23:26:25
        }
    ]

}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|response |body |string|返回数据,数组允许为空|
|giftId |body |integer|礼品id|
|giftMessage |body |integer|礼品描述|
|createTime |body |integer|礼品创建时间|



## **26.  讲师列表接口**

* URL: /admin/teacher/list
* 接口格式常量：{{path('trainsystem_admin_teacher_list')}}
* method：POST
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|page |body |integer|当前页 |
|pageSize |body |integer|每页显示条数 |

######Response
* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response":
   [
       {
           "teacherName":      "teacherName"
           "teacherNickname":
           "professionalTitle":      "professionalTitle"
           "describeTitle":      "describeTitle"
           "imageId":      5
           "describes":      8 "describe"
           "createTime":      1534831901
           "id":      1
           "fileName":      0
           "imageType":      1
           "imageAddress":      2
           "imageSize":      3
            "source":      4
       },
       {
           "teacherName":      "teacherName"
           "teacherNickname":
           "professionalTitle":      "professionalTitle"
           "describeTitle":      "describeTitle"
           "imageId":      5
           "describes":      8 "describe"
           "createTime":      1534831901
           "id":      1
           "fileName":      0
           "imageType":      1
           "imageAddress":      2
           "imageSize":      3
           "source":      4
       }
   ]

}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|response |body |string|返回数据,数组允许为空|
|id |body |integer|讲师id|
|teacherName |body |string|讲师名称|
|teacherNickname |body |string|讲师昵称|
|professionalTitle |body |string|讲师讲师职称|
|describeTitle |body |string|讲师描述标题|
|describes |body |string|讲师描述|
|createTime |body |string|讲师添加时间|
|imageId |body |integer|图片id|
|fileName |body |string|图片名称|
|imageType |body |string|文件类型|
|imageAddress |body |string|文件地址|
|imageSize |body |string|文件大小|
|source |body |string|文件来源 1上传， 2分享，3公共资料|



## **27. 目标人群列表接口**

* URL: /admin/talent/gap/list
* 接口格式常量：{{path('getTalentGapList')}}
* method：POST
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|


######Response
* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response":
    [
       {
           "id":      3
           "categoryName":       "a"
           "parentId":
           "description":      "aaaaaaaaaaaaaaaaa"
       },
       {
           "id":      4
           "categoryName":       "aa"
           "parentId":      0
           "description":      "3333333aa"
           "subset":
           [
               {
                   "id":            9
                   "categoryName":             "ba"
                   "parentId":            4
                   "description":            "4444444ba"
               },
               {
                   "id":            10
                   "categoryName":             "bc"
                   "parentId":            4
                   "description":            "4444444bc"
               }
           ]
        },
       {
           "id":      5
           "categoryName":      "ab"
           "parentId":      3
           "description":      "3333333ab"
           "subset":
           {
               "id":            11
               "categoryName":             "ca"
               "parentId":            5
               "description":             "555555ca"
           }
       }
    ]

}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|response |body |string|返回数据,数组允许为空|
|id |body |integer|目标人群id|
|categoryName |body |string|目标人群名称|
|parentId |body |integer|目标人群父id|
|description |body |string|目标人群描述|
|subset |body |array|子集|
|id |body |integer|目标人群id|
|categoryName |body |string|目标人群名称|
|parentId |body |integer|目标人群父id|
|description |body |string|目标人群描述|



## **28.  课程评论添加接口**

* URL: /admin/train/comment/set/{trainCourseId}
* 接口格式常量：{{path('trainsystem_admin_train_comment_set')}}
* method：POST
* 支持多条记录添加
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|trainCourseId |body |string|课程id |
|trainComment |body |array|培训评论模块|
|nickName |body |string|用户昵称|
|commentImage |body |image|用户头像|
|message |body |string|评论内容|


* trainComment 培训评论模块 请求格式:array
* ex:

```
FILE['imageAddress']['commentImage']:
 trainComment['nickName']:'用户昵称
 trainComment['message']:'评论内容评论内容评论内容 '
 trainComment['createTime']:'2018-08-19 19:00:00'
或者
FILE['imageAddress']['commentImage']:
 trainComment[0]['nickName']:'用户昵称
 trainComment[0]['message']:'评论内容评论内容评论内容 '
 trainComment[0]['createTime']:'2018-08-19 19:00:00'
```

###### Response:

* 返回格式:Json
* ex:

```
{
    "code": 200,
    "message": "操作成功"
    "response":
    [
        {
            "nikeName":       "nickName"
            "imageId":      5
            "message":      7 "message"
            "createTime":      0
            "id":      6
            "fileName":      0
            "imageType":      1
            "imageAddress":      ''
            "imageSize":      3
            "source":      4
        },
        {
            "nikeName":       "nickName"
            "message":      "message"
            "createTime":      0
            "id":      7
            "fileName":       "wejin"
            "imageType":      "jpg"
            "imageAddress":      "aaaa"
            "imageSize":       "12343"
            "source":      true
            "imageId":      1
        }
    ]
}
```
* 说明:

|Name|In|type|Description|
|:----|:----|:----|:----|
|code |body |string|状态码(参照状态码表) |
|message |body |string|返回提示信息|
|response |body |string|返回数据,数组允许为空|
|id |body |integer|评论id|
|nickName |body |string|用户昵称|
|message |body |string|评论内容|
|createTime |body |string|添加时间|
|imageId |body |integer|图片id|
|fileName |body |string|图片名称|
|imageType |body |string|文件类型|
|imageAddress |body |string|文件地址|
|imageSize |body |string|文件大小|
|source |body |string|文件来源 1上传， 2分享，3公共资料|


## **29.  培训课程搜索接口**

* URL: /admin/course/train/search
* 接口格式常量：{{path('trainsystem_admin_course_train_search')}}
* method：POST
* 支持多条记录添加
###### Request：

|Name|In|type|Description|
|:----|:----|:----|:----|
|courseTrainName |body |string|课程名称 |
|courseTrainStatus |body |string|课程状态  1报名中  2已截止|
###### Response:

* 返回格式:html




|状态码|状态|
|:----|:----|
|200|success|
|400|错误|