

# 兰州大学点餐平台





[TOC]

## 一、四个模块

### 1.普通用户功能模块

用户管理

> –申请注册用户（校园卡号）
>
> –修改用户信息：用户可以添加修改自己的个人信息（性别、年龄、电话（必填）、QQ号、email）。



浏览页面

> –查看商家信息：鼠标移到商家logo能看到该商家信息（店名，联系方式，地址等）
>
> –查看供应菜品，可以搜索菜品。点击菜品名称能进入菜品详细介绍页面，包括已售数量，菜品状态



### 2.商家模块

>–发布菜品：菜品基本信息（标题、图片、简介、价格）
>
>–菜品管理：修改、删除，
>
>–菜品显示：菜品基本信息，已售数量，修改菜品状态（售罄）。
>
>–查看订单：商家可以查看订单信息及订餐者信息（新订单提示）。
>
>–修改订单：改变订单状态（已接单/已完成/已取消）
>
>–订单、菜品搜索。



### 3.用户订餐功能模块

> –餐车功能：用户可以将菜品加入自己的餐车，可以查看修改餐车。
>
> –下单功能：用户可以购买选中的菜品。
>
> –订单管理：用户可以查看自己的订单状态，查看历史订单。
>
> –订单搜索功能：用户可以在自己的订单页面，用订单号或者商品名搜索历史订单



### 4.系统管理模块

> –用户管理：系统管理员能够浏览、删除用户。
>
> –商家管理：系统管理员能够添加、关闭商家。
>
> –商家推荐：系统管理员能够推荐和取消推荐商家，推荐商家优先出现在用户首页



## 二、页面



### 1.首页【index.html】

#### 首部(header)：

一级目录：

> 登录（登录后：注销）
>
> 注册
>
> 个人中心（登录前：登录）
>
> 商户服务（直接跳到商户登录页面）



二级目录：

> **个人中心**:
>
> 修改个人信息
>
> 我的餐车
>
> 订单管理



#### body：

搜索框：

> **搜索框**
>
> 点击回车搜索
>
> 点击搜索按钮搜索
>
> 均在新页面打开



展示区域：

> 展示区域：
>
> 各家店铺的菜品



![image-20201208151202748](C:%5CUsers%5C14254%5CAppData%5CRoaming%5CTypora%5Ctypora-user-images%5Cimage-20201208151202748.png)



### 2.普通用户登录页面【accountlogin.html】

![image-20201208151329092](C:%5CUsers%5C14254%5CAppData%5CRoaming%5CTypora%5Ctypora-user-images%5Cimage-20201208151329092.png)

### 3.商户登录页面



### 4.普通用户注册页面【accountregister .html】

![image-20201208151404315](C:%5CUsers%5C14254%5CAppData%5CRoaming%5CTypora%5Ctypora-user-images%5Cimage-20201208151404315.png)

### 5.搜索页面【search.html】