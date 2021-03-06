<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE>
<html>
<head>
  <meta http-equiv="Content-Type" content="multipart/form-data;charset=utf-8">
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
          <a id="" href="<?php echo U('Index/index');?>">退出</a>
        </div>
      </nav>
    </header>
    <section class="section_center" id="">
      <nav class="left_map">
        <ul class="left_map_ul">
          <li ><a class="white" href="back_index.html">首页</a></li>
          <li><a class="white" href="back_person.html">用户管理</a></li>
          <li><a class="white" href="back_business.html">订单管理</a></li>
          <li class="selected_map_bc"><a><div class="selected_map"></div>商品管理</a></li>
          <li><a class="white" href="back_fankui.html"> 反馈管理</a></li>
        </ul>
      </nav>
      <div class="right_goods">

<div class="newstitle">库存管理</div>
<div class="newscontent">
  <div class="floatleft kucun_left">
    <span class="kucun_title">补货处</span> 
    <ul id="upleft">
      <li class="kucun_buhuo" v-for="(value,key) in fruitlists">{{value.fruitname}}<input class="kuncun_sub" type="button" v-on:click="sub_fruitleft(key,value.fruitname)" value="保存"><input class="kuncun_inp" type="text" ></li>
      
    </ul>
  </div>
  <div class="floatleft kucun_right">
    <span class="kucun_title">库存状态</span>
    <ul>
      <li v-for="item in fruitlists" class="kucun_jindu" :class=" [ 'color'+item.fruitid%10]" :style="{width: item.fruitleft/4+70 + 'px' }" >{{item.fruitleft}}<span class="mask_red" v-if="item.fruitleft<200">缺货</span></li>

    </ul>
  </div>
</div>
       
<div class="newstitle">商品信息管理</div>
<div class="newscontent">
  <input type="" name="" class="searchgoods_inp" v-model="thissearch">
  <label class="searchgoods_btn" >搜索</label>
</div>
<div class="newscontent">
  <table class="show_goods">
    <thead>
      <tr>
        <th>商品编号</th>
        <th>商品名</th>
        <th>商品克重</th>
        <th>商品价格</th>
        <th>商品状态</th>
        <th>保存操作</th>
        <th>删除操作</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(value,key) in searchData" :id="'fru'+key">
        <td>{{value.fruitid }}</td>
        <td><input class="upfruit_info" type="text" name="" :value="value.fruitname"></td>
        <td><input class="upfruit_info" type="text" name="" :value="value.fruitweight"></td>
        <td><input class="upfruit_info" class="upfruit_info" type="text" name="" :value="value.fruitprice"></td>
        <td><input class="upfruit_info" type="text" name="" :value="value.fruitstatu"></td> 
        <td><a v-on:click="upthisfruit(value.fruitid,key)" class="point">保存</a></td> 
        <td><a v-on:click="delthisfruit(value.fruitid)" class="point">删除</a></td> 

      </tr>


    </tbody>
    <tfoot></tfoot>
  </table>
</div>
 <div class="newstitle">添加商品</div>
        <div class="newscontent">
          <table>
            <tr class="add_goods_title">

             <td >商品分类</td>
             <td>是否进口</td>
             <td>商品名</td>
             <td>商品克重</td>
             <td>商品价格</td>
             <td>商品库存</td>
             <td>商品状态</td>
             <td>上传图片</td>
           </tr>
           <tr>
            <td><input class="add_goods" type="text" name="" v-model="gtype"></td>
            <td><input class="add_goods_radio" type="radio" name="" v-model="gchina"></td>
            <td><input class="add_goods" type="text" name="" v-model="gname"></td>
            <td><input class="add_goods" type="text" name="" v-model="gweight"></td>
            <td><input class="add_goods" type="text" name="" v-model="gprice"></td>
            <td><input class="add_goods" type="text" name="" v-model="gleft"></td>
            <td><select class="add_goods" v-model="gstatus">
              <option value="1" selected='selected'>无状态</option>
              <option value="2">新品上线</option>
              <option value="3">当季水果</option>
            </select></td>
            <td class="change_relative">
              <div class="add_goods" ></div>
              <input class="add_goods add_trasprant" type="file" v-on:change='add_img'></td>
          </tr>
        </table>
        <button v-on:click="upload" class="submit_newgoods">添加新商品</button>
</div>
</div>
</section>
</div><!-- /.modal-content -->

<script type="text/javascript" src="/today/todaystore/public/Home/js/jiaohu.js"></script>
</body>
</html>