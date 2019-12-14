
## **1.  培训系统分类管理——详情界面**

* URL: /admin/category/infoview/{categoryId}
* URL常量：{{path('trainsystem_admin_category_infoview')}}
* method：GET
* twig地址：src/Trainsystem/AdminBundle/Resources/views/Category/category_info.html.twig
|Name|In|type|Description|
|:----|:----|:----|:----|
|categoryId |URL |int|分类id |

## **2.  培训系统分类管理——添加界面**

* URL: /admin/category/createview
* URL常量：{{path('trainsystem_admin_category_createview')}}
* method：GET
* twig地址：src/Trainsystem/AdminBundle/Resources/views/Category/category_create.html.twig


## **3.  培训系统分类管理——编辑界面**

* URL: /admin/category/editview/{categoryId}
* URL常量：{{path('trainsystem_admin_category_editview')}}
* method：GET
* twig地址：src/Trainsystem/AdminBundle/Resources/views/Category/category_edit.html.twig
|Name|In|type|Description|
|:----|:----|:----|:----|
|categoryId |URL |int|分类id |

## **4.  培训系统权限管理——用户详情界面**

* URL: /admin/user/infoview/{userId}
* URL常量：{{path('trainsystem_admin_infoView')}}
* method：GET
* twig地址：src/Trainsystem/AdminBundle/Resources/views/User/user_info.html.twig
|Name|In|type|Description|
|:----|:----|:----|:----|
|userId |URL |int|用户账号id |

## **5.  培训系统权限管理——用户添加界面**

* URL: /admin/user/createview
* URL常量：{{path('trainsystem_admin_createView')}}
* method：GET
* twig地址：src/Trainsystem/AdminBundle/Resources/views/User/user_create.html.twig

## **6.  培训系统权限管理——用户编辑界面**

* URL: /admin/user/editview/{userId}
* URL常量：{{path('trainsystem_admin_editView')}}
* method：GET
* twig地址：src/Trainsystem/AdminBundle/Resources/views/User/user_edit.html.twig

|Name|In|type|Description|
|:----|:----|:----|:----|
|userId |URL |int|用户账号id |


## **7.  培训系统生源管理——新增学员界面**

* URL: /admin/leaner/createview
* URL常量：{{path('admin_leaner_manage_createview')}}
* method：GET
* twig地址：src/Trainsystem/AdminBundle/Resources/views/Leaner/leaner_create.html.twig


## **8.  培训系统生源管理——编辑学员界面**

* URL: /admin/leaner/editview/{client_id}
* URL常量：{{path('trainsystem_admin_leaner_editview'{'client_id':client_id})}}
* method：GET
* twig地址：src/Trainsystem/AdminBundle/Resources/views/Leaner/leaner_edit.html.twig

|Name|In|type|Description|
|:----|:----|:----|:----|
|client_id |URL |int|生源id |

## **9.  培训系统生源管理——查看学员界面**

* URL: /admin/leaner/info/{client_id}
* URL常量：{{path('admin_leaner_manage_info'{'client_id':client_id})}}
* method：GET
* twig地址：src/Trainsystem/AdminBundle/Resources/views/Leaner/leaner_info.html.twig

|Name|In|type|Description|
|:----|:----|:----|:----|
|client_id |URL |int|生源id |


## **10.  培训系统模板管理——新增模板界面**

* URL: /admin/coursetem/createview
* URL常量：{{path('trainsystem_admin_CourseTemplate_CreateView')}}
* method：GET
* twig地址：src/Trainsystem/AdminBundle/Resources/views/Template/tem_create.html.twig


## **11.  培训系统权限管理——权限详情界面**

* URL: /admin/menu/infoview/{menuid}
* URL常量：{{path('trainsystem_admin_AdminMenu_InfoDataView',{'menuid':menuid})}}
* method：GET
* twig地址：src/Trainsystem/AdminBundle/Resources/views/AdminMenu/admin_menu_info.html.twig

|Name|In|type|Description|
|:----|:----|:----|:----|
|menuid |URL |int|权限id |


## **12.  培训系统权限管理——权限编辑界面**

* URL: /admin/menu/editview/{menuid}
* URL常量：{{path('trainsystem_admin_AdminMenu_InfoView',{'menuid':menuid})}}
* method：GET
* twig地址：src/Trainsystem/AdminBundle/Resources/views/AdminMenu/admin_menu_edit.html.twig

|Name|In|type|Description|
|:----|:----|:----|:----|
|menuid |URL |int|权限id |

## **13.  培训系统权限管理——权限新增界面**

* URL: /admin/menu/createv
* URL常量：{{path('trainsystem_admin_AdminMenu_createV')}}
* method：GET
* twig地址：src/Trainsystem/AdminBundle/Resources/views/AdminMenu/admin_menu_add.html.twig