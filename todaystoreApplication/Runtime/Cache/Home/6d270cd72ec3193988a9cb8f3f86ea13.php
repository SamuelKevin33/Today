<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE>
<html>
<head>
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
  <meta http-equiv="Content-Type" content="application/x-www-form-urlencoded; charset=utf-8">
  <title>今天水果商店</title>
  <link href="http://47.106.111.76/todaystore/public/Home/css/tdcss.css" type="text/css" rel="stylesheet"/>
  <script type="text/javascript" src="http://47.106.111.76/todaystore/public/Home/js/jquery-3.2.1.min.js"></script>  
  <script type="text/javascript" src="http://47.106.111.76/todaystore/public/Home/js/tdjs.js"></script>
  <script type="text/javascript" src="http://47.106.111.76/todaystore/public/Home/js/vue.min.js"></script>
  <script type="text/javascript" src='http://47.106.111.76/todaystore/public/Home/js/vue-resource.min.js'></script>
</head>
<body>
  <div id="app_index">
    <div id="except_model">
      <header class="td_header">
        <nav class="td_nav">
          <div class="td_navleft">
            <a href="#">
              <img src="http://47.106.111.76/todaystore/public/Home/images/tdlogo.png" />
            </a>
          </div>
          <div class="td_navmiddle">
            <ul>
              <li><a class="td_navlink td_navmask" href="#">首页</a></li>
              <li><a class="td_navlink" href="home_fruit.html">国内水果</a></li>
              <li><a class="td_navlink" href="foreign_fruit.html">进口水果</a></li>
              <li><a class="td_navlink" v-on:click="poplogin(2)">个人中心</a></li>
            </ul>
          </div>
          <div class="td_navright">
            <div class="floatright">
              <div class="floatright">
               <a id="car" class="td_navright_a " v-on:click="poplogin(2)">购物车</a>
             </div>
             <my-component-name></my-component-name>
           </div>
        <!-- <div class="floatright" v-html="changeSign">
        
        </div> -->
      </div>
    </nav>
  </header>
  <section class="td_loopimage" id="loopimage">
    <img id="loop" src="http://47.106.111.76/todaystore/public/Home/images/nicebg.png"/>
    <img id="loop1" src="http://47.106.111.76/todaystore/public/Home/images/fruit1.jpg"/>
    <img id="loop2" src="http://47.106.111.76/todaystore/public/Home/images/fruit2.jpg"/>
    <img id="loop3" src="http://47.106.111.76/todaystore/public/Home/images/fruit3.jpg"/>
    <img id="loop4" src="http://47.106.111.76/todaystore/public/Home/images/fruit4.jpg"/>
    <img id="loop5" src="http://47.106.111.76/todaystore/public/Home/images/fruit5.jpg"/>
    <img id="loop6" src="http://47.106.111.76/todaystore/public/Home/images/fruit6.jpg"/>
    <div class="td_loopimg">
      <input type="button" class="selectloop"/><br/>
      <input type="button" class="selectloop"/><br/>
      <input type="button" class="selectloop"/><br/>
      <input type="button" class="selectloop"/><br/>
      <input type="button" class="selectloop"/><br/>
      <input type="button" class="selectloop"/>
    </div>
  </section>
  <section class="tab_center">
    <div class="haoping_tab">
      <div class="tab_left">
        <a id="tb_btn_dangji" class="tb_btn tb_btn_dangji_hover">当季水果</a>
        <a id="tb_btn_newfruit" class="tb_btn tb_btn_newfruit">新品上线</a>
      </div>
      <div class="tab_right">
        <ul class="tab_dangji">

          <li class="tab_dangji_li" v-for="(value,index) in fruitlocal" v-if="index<6">
            <a v-on:click="start_model(value.fruitid)">
              <div class="tab_dangji_div">
                <img v-bind:src="'http://47.106.111.76/todaystore/public/Home/images/'+value.fruitname+'.jpg'"/>
                <span class="tab_span">{{value.fruitname}}</span>
                <p class="tab_p">￥{{value.fruitprice}}</p>
              </div>
            </a>
          </li>


        </ul>
        <ul class="tab_newfruit">
         <li class="tab_dangji_li" v-for="(value,index) in fruitlocal" v-if="index>11">
          <a v-on:click="start_model(value.fruitid)">
            <div class="tab_dangji_div">
              <img v-bind:src="'http://47.106.111.76/todaystore/public/Home/images/'+value.fruitname+'.jpg'"/>
              <span class="tab_span">{{value.fruitname}}</span>
              <p class="tab_p">￥{{value.fruitprice}}</p>
            </div>
          </a>
        </li>
      </ul>
    </div>
  </div>
</section>
<section class="list">
  <div class="list_fenge">
    <img src="http://47.106.111.76/todaystore/public/Home/images/fengexian.jpg">
  </div>
  <div class="list_left">
    <div class="list_c_list">
      <ul class="list_c_ul">

        <li class="list_c_li" v-for="(value,index) in fruitlocal" v-if="index<8">
          <a v-on:click="start_model(value.fruitid)">
            <div class="list_c_div">
             <div class="list_c_gif"> 
              <img class="list_c_image" v-bind:src="'http://47.106.111.76/todaystore/public/Home/images/'+value.fruitname+'.jpg'"/>
            </div>
            <p class="list_c_title">{{value.fruitname}}</p>
            <p class="list_c_price">￥{{value.fruitprice}}</p>
          </div>
        </a>
      </li>

    </ul>
  </div>
</div>
<div class="list_right">
  <div class="list_title">国 产 水 果</div>
  <img src="http://47.106.111.76/todaystore/public/Home/images/f1.jpg"/>
</div>
<div class="list2_left">
  <div class="list_c_list">
    <ul class="list_c_ul">
      <li class="list_c_li" v-for="(value,index) in fruitforeign" v-if="index<8">
        <a v-on:click="start_model(value.fruitid)">
          <div class="list_c_div">
           <div class="list_c_gif"> 
            <img class="list_c_image" v-bind:src="'http://47.106.111.76/todaystore/public/Home/images/'+value.fruitname+'.jpg'"/>
          </div>
          <p class="list_c_title">{{value.fruitname}}</p>
          <p class="list_c_price">￥{{value.fruitprice}}</p>
        </div>
      </a>
    </li>
  </ul>
</div>
</div>
<div class="list_right">
  <div class="list2_title">进 口 水 果</div>
  <img src="http://47.106.111.76/todaystore/public/Home/images/f2.jpg"/>
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
<aside>
 <a href="" class="cebianlan">^</a>
</aside>
</div>
<!-- /.modal-content -->
<div class="fruit_model_bg hidden" style="">
  <a class="close_model_a" v-on:click="start_model(0)">
    <img src="http://47.106.111.76/todaystore/public/Home/images/close_model.png" >
  </a>
  <div class="model_content">
    <div v-for="item in onefruit">
      <table>
        <tr>
          <td><img class="width350" v-bind:src="'http://47.106.111.76/todaystore/public/Home/images/'+item.fruitname+'.jpg'"/></td>
          <td><img class="width350" v-bind:src="'http://47.106.111.76/todaystore/public/Home/images/'+item.fruitname+'.jpg'"/></td>
          <td class="paddingL45">
            <h2 class="content3">{{item.fruitname}}</h2>
            <h5 class="content2">{{item.fruitweight}}g</h6>
            <h4 class="content1">￥{{item.fruitprice}}</h6>
            <h6 class="content2">剩{{item.fruitleft}}件</h6>
            <input class="cut change_carnum" value="-" type="button" v-on:click="car_num--">
            <input class="amount" type="text" value="1" v-model="car_num">
            <input class="add change_carnum" value="+" type="button" v-on:click="car_num++">
            <input type="submit" class="change_carnum" v-on:click="sub_car(item.fruitid)" value="加入购物车">
            <div class="content_bottom">
              存储方法 0°冷藏<br>
              商品编号 {{item.fruitid}}<br>
              多吃水果补充维生素~<br>（在购物车进行结算哦）
            </div>
          </td>
        </tr>
      </table>

    </div>
    <!--  <modal-fruit v-bind:onefruit="onefruit1"></modal-fruit> -->
  </div>
</div>
</div>
<script type="text/javascript" src="http://47.106.111.76/todaystore/public/Home/js/indexApp.js"></script>
</body>
</html>