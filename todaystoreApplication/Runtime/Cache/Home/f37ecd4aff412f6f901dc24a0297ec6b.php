<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE>
<html>
<head>
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
  <title>今天水果商店</title>
  <link href="/today/todaystore/public/Home/css/bccss.css" type="text/css" rel="stylesheet"/>
  <script type="text/javascript" src="/today/todaystore/public/Home/js/jquery-3.2.1.min.js"></script>  
  <script type="text/javascript" src="/today/todaystore/public/Home/js/tdjs.js"></script>
   <script type="text/javascript" src="/today/todaystore/public/Home/js/vue.min.js"></script>
  <script type="text/javascript" src='/today/todaystore/public/Home/js/vue-resource.min.js'></script>
</head>
<body>
  <div id="back">
  <header class="bc_header">
    <nav class="bc_nav">
      <div class="bc_navleft">
        <a href="#">
          今日管理系统
        </a>
      </div>

      <div class="bc_navright">
        <a id="" href="sign.html">退出</a>
      </div>
    </nav>
  </header>
  <section class="section_center" id="">
    <nav class="left_map">
      <ul class="left_map_ul">
         <li ><a class="white" href="back_index.html">首页</a></li>
        <li><a class="white" href="back_person.html">用户管理</a></li>
        <li class="selected_map_bc"><a><div class="selected_map"></div>订单管理</a></li>
        <li ><a class="white" href="back_goods.html">商品管理</a></li>
        <li><a class="white" href="back_fankui.html"> 反馈管理</a></li>
      </ul>
    </nav>
    <div>

      <div class="newscontent">
          <input type="" name="" class="searchbus_inp" v-model="listdata">
          <span class="searchbus_btn">搜索</span>
        </div>
      <div class="newscontent">
        <table class="show_bus">
          <thead>
            <tr>
              <th>订单编号</th>
              <th>用户编号</th>
              <th>订单时间</th>
              <th>订单价格</th>
              <th>订单地址</th>
              <th>联系电话</th>
              <th>订单状态</th>
              <th>更改状态</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(value,key) in searchData">
              <td>{{value.clientid}}</td>
              <td>{{value.listid}}</td>
              <td>{{value.listtime}}</td>
              <td>{{value.listprice}}</td>
              <td>{{value.listphone}}</td> 
              <td>{{value.listaddress}}</td> 
              <td v-if="value.liststatus=== '1'">未完成</td> 
              <td v-else-if="value.liststatus === '0'">已完成</td>  
              <td v-else>退货中</td>  
              <td>
                <select class="changeliststatu" v-on:change="upliststatu(value.listid)" v-model="whichstatu" v-if="value.liststatus > 0">
                  <option value="">请选择</option>
                  <option value="0">已完成</option>
                  <option value="1">未完成</option>
                  <option value="2">退货中</option>
                </select>
                <span v-else>不可操作</span>
              </td>
            </tr>
            

          </tbody>
          <tfoot></tfoot>
        </table>
      </div>

    </div>
  </section>

</div>
   <script type="text/javascript" src="/today/todaystore/public/Home/js/jiaohu_list.js"></script>
</body>
</html>