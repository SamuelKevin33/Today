<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE>
<html>
<head>
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
  <title>今天水果商店</title>
  <link href="/today/todaystore/public/Home/css/tdcss.css" type="text/css" rel="stylesheet"/>
  <script type="text/javascript" src="/today/todaystore/public/Home/js/jquery-3.2.1.min.js"></script>  
  <script type="text/javascript" src="/today/todaystore/public/Home/js/tdjs.js"></script>
<script type="text/javascript" src="/today/todaystore/public/Home/js/vue.min.js"></script>
  <script type="text/javascript" src='/today/todaystore/public/Home/js/vue-resource.min.js'></script>
</head>
<body >
  <div id="app_index">
  <header class="td_header">
    <nav class="td_nav">
      <div class="td_navleft">
        <a href="tdindex.html">
        <img src="/today/todaystore/public/Home/images/tdlogo.png" />
      </a>
      </div>
      <div class="td_navmiddle">
        <ul>
         <li><a class="td_navlink " href="tdindex.html">首页</a></li>
          <li><a class="td_navlink td_navmask" href="home_fruit.html">国内水果</a></li>
          <li><a class="td_navlink" href="foreign_fruit.html">进口水果</a></li>
          <li><a class="td_navlink" href="center.html">个人中心</a></li>
        </ul>
      </div>
     <div class="td_navright">
        <div class="floatright">
        <div class="floatright">
         <a id="car" class="td_navright_a "  >购物车</a>
         </div>
          <my-component-name></my-component-name>
        </div>
      </div>
    </nav>
  </header>
  <div class="map"><a href="tdindex.html">首页 </a>> 国内水果</div>
  <section class="filter_section">
    <div class="filter">
      <div class="filter_list">
        <h5 class="filter_title">分类：</h5>
        <a class="filter_quanbu_active">
          <span class="filter_fruit filter_active">全部</span>
        </a>
        <div class="filter_list_name">
          <a v:on-click="filterfruitType('苹果'')">
            <span class="filter_fruit">苹果</span>
          </a>
          <a v:on-click="filterfruitType('梨子')">
            <span class="filter_fruit">梨子</span>
          </a>
           <a v:on-click="filterfruitType('番茄')">
            <span class="filter_fruit">番茄</span>
          </a>
           <a v:on-click="filterfruitType('榴莲')">
            <span class="filter_fruit">榴莲</span>
          </a>
           <a v:on-click="filterfruitType('奇异果')">
            <span class="filter_fruit">奇异果</span>
          </a>
          <a v:on-click="filterfruitType('火龙果')">
            <span class="filter_fruit">火龙果</span>
          </a>
          <a v:on-click="filterfruitType('百香果')">
            <span class="filter_fruit">百香果</span>
          </a>
          <a v:on-click="filterfruitType('牛油果')">
            <span class="filter_fruit">牛油果</span>
          </a>
          <a v:on-click="filterfruitType('香蕉')">
            <span class="filter_fruit">香蕉</span>
          </a>
          <a v:on-click="filterfruitType('李子')">
            <span class="filter_fruit">李子</span>
          </a>
        </div>
      </div>
      <div class="filter_list1">
        <h5 class="filter_title">排序：</h5>
        <a class="filter_active" v-on:click="orderALL">
          <span class="filter_fruit ">默认</span>
        </a>
          <a v-on:click="orderUPc()">
            <span class="filter_fruit">价格从低到高</span>
          </a> 
          <a v-on:click="orderDOWNc()">
            <span class="filter_fruit">价格从高到低</span>
          </a> 
      </div>
    </div>
      <div class="clear"></div>
    <div class="fruit_list">
      <ul class="fruit_content_ul">
        <li class="fruit_content_li" v-for="item in fruitlocal" >
          <div class="fruit_content_center">

          <img class="fruit_content_image" v-bind:src="'/today/todaystore/public/Home/images/'+item.fruitname+'.jpg'"/>
          <p class="fruit_content_title">{{item.fruitname}}</p>
          <p class="fruit_content_weight">{{item.fruitweight}}g</p>
          <p class="fruit_content_price">￥{{item.fruitprice}}</p>
          <img class="fruit_content_car" src="/today/todaystore/public/Home/images/gwc.png"/>
          </div>
        </li>
      </ul>
    </div>
  </section>
  <div class="clear"></div>
  <footer class="footer">
    <ul class="footer_ul">
      <li class="footer_list">8天退换货</li>
      <li class="footer_list">100%新鲜</li>
      <li class="footer_list">闪电发货</li>
      <li class="footer_list">产地直销</li>
    </ul>
    <div class="footer_lianxi">联系人：1830219826X 高女士</div>
  </footer>
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog"> 
      <div class="modal-content orange" ng-app="hotelApp" ng-controller="hotelCtrl3">




      </div><!-- /.modal-content -->
    </div><!-- /.modal -->
  </div>
  </div>
     <script type="text/javascript" src="/today/todaystore/public/Home/js/indexApp.js"></script>
</body>
</html>