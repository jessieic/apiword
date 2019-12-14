#### 所有接口都需要发送 sign 和 tips字段作为校验(get/post形式都可以)。其中：
- sign 为签名
- tips 为当前时间戳


##### sign生成规则：
1. 排除签名参数（默认是sign）
2. 将剩下的全部参数，按参数名字进行字典排序
3. 将排序好的参数，全部用字符串拼接起来
4. 进行md5运算
5. 不包括上传文件/照片等文件字段。

##### 即：

###### 1. 排除签名参数（sign），post传参同理，所有参数都算上

```
?service=Examples_CURD.Get&tip=1477808630000&abs=test
```

###### 2. 将剩下的全部参数，按参数名字进行字典排序

```
abs=test
service=Examples_CURD.Get
tip=1477808630000
```

###### 3. 将排序好的参数，全部用字符串拼接起来

```
"testExamples_CURD.Get1477808630000" = "test" + "Examples_CURD.Get"+"1477808630000"
```

###### 4. 进行md5运算（即：先用等号左侧数据排序，用等号右侧数据串拼加密）

```
sign = 5afbda24cad45fb79c5c768d386ba061= md5("testExamples_CURD.Get1477808630000")
```

###### 5. 请求时的签名参数

```
sign=3ba5f5f03a90b2a648f5dd1df7387e26
```
