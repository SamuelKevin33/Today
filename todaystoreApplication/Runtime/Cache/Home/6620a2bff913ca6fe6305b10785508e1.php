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
<body>
   <div  id="app_index">
  <header class="td_header">
    <nav class="td_nav">
      <div class="td_navleft">
        <a href="tdindex.html">
        <img src="/today/todaystore/public/Home/images/tdlogo.png" />
      </a>
      </div>
      <div class="td_navmiddle">
        <ul>
          <li><a class="td_navlink td_navmask" href="tdindex.html">首页</a></li>
          <li><a class="td_navlink" href="home_fruit.html">国内水果</a></li>
          <li><a class="td_navlink" href="foreign_fruit.html">进口水果</a></li>
          <li><a class="td_navlink" href="center.html">个人中心</a></li>
        </ul>
      </div>
      
    </nav>
  </header>
  <div class="map"><a href="tdindex.html">首页 </a>> 登录</div>
<section class="sign">
  <div class="sign_left">
    <ul class="sign_left_ul">
      <a>
      <li class="sign_left_list"><img src="/today/todaystore/public/Home/images/log1.jpg"/></li>
      <li class="sign_left_list"><img src="/today/todaystore/public/Home/images/log2.jpg"/></li>
      <li class="sign_left_list"><img src="/today/todaystore/public/Home/images/log3.jpg"/></li>
    </a>
    </ul>
  </div>
  <div class="sign_right">
    <label class="sign_title">今天的客人来登录啦^_^</label>
    <div>
      <form id="foryou" v-on:submit.prevent="submitLog" method="post">
        <input class="sign_input" type="text" v-model="client1.phone" placeholder="请输入手机号">
        <input class="sign_input" type="password" v-model="client1.password" placeholder="请输入密码">
        <input class="sign_submit" type="submit" name="" value="登 录">
      </form>
      <a class="sign_tolog" href="sign.html">没有账号？请注册</a>
    </div>
  </div>
</section>
  <footer class="footer">
    <ul class="footer_ul">
      <li class="footer_list">8天退换货</li>
      <li class="footer_list">100%新鲜</li>
      <li class="footer_list">闪电发货</li>
      <li class="footer_list">产地直销</li>
    </ul>
    <div class="footer_lianxi">联系人：1830219826X 高女士</div>
  </footer>
</div>
    <script type="text/javascript" src="/today/todaystore/public/Home/js/indexApp.js"></script>
</body>
</html>