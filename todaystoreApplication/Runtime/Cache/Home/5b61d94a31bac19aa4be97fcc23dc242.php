<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE>
<html>
<head>
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
  <title>今天水果商店</title>
  <link href="http://47.106.111.76/todaystore/public/Home/css/tdcss.css" type="text/css" rel="stylesheet"/>
  <script type="text/javascript" src="http://47.106.111.76/todaystore/public/Home/js/jquery-3.2.1.min.js"></script>  
  <script type="text/javascript" src="http://47.106.111.76/todaystore/public/Home/js/tdjs.js"></script>
   <script type="text/javascript" src="http://47.106.111.76/todaystore/public/Home/js/vue.min.js"></script>
  <script type="text/javascript" src='http://47.106.111.76/todaystore/public/Home/js/vue-resource.min.js'></script>
</head>
<body>
    <div id="app_index">
  <header class="td_header">
    <nav class="td_nav">
      <div class="td_navleft">
        <a href="tdindex.html">
          <img src="http://47.106.111.76/todaystore/public/Home/images/tdlogo.png" />
        </a>
      </div>
      <div class="td_navmiddle">
        <ul>
          <li><a class="td_navlink " href="tdindex.html">首页</a></li>
          <li><a class="td_navlink" href="home_fruit.html">国内水果</a></li>
          <li><a class="td_navlink" href="foreign_fruit.html">进口水果</a></li>
          <li><a class="td_navlink td_navmask">个人中心</a></li>
        </ul>
      </div>
      <div class="td_navright">
         <div class="floatright">
        <div class="floatright">
         <a id="car" class="td_navright_a " >购物车</a>
         </div>
          <my-component-name></my-component-name>
      
        </div>
      </div>
    </nav>
  </header>
  <div class="map"><a href="tdindex.html">首页 </a>> 个人中心</div>
  <section class="center_client">
    <div class="center_nav">
      <ul>
        <li class="center_nav_active" id="this_person">个 人 资 料</li>
        <li id="this_car" ><a v-on:click="judge_car" href="?tab=2">购 物 车</a></li>
        <li id="this_doing_table">未 完 成 订 单</li>
        <li id="this_finished_table">已 完 成 订 单</li>
        <li id="this_tables">所 有 订 单</li>
        <li id="this_fankui">反 馈 渠 道</li>
        <li id="this_fankui"><a href="<?php echo U('Back/back_index');?>">后 台 系 统</a></li>
      </ul>
    </div>
    <div class="center_information">
      <div class="center_information_map"> 
        <ul>
          <li id="primary" class="center_information_map_active">基本资料</li>
          <li id="change_password">修改密码</li>
          <li id="your_address">收货地址</li>
        </ul>
      </div>
      <div class="clear"></div>
      <form class="center_information_client">
        <span>姓名</span><input class="center_information_name"/><br><br><br>
        <span>生日</span><select class="center_information_month" >
          <option disabled="disabled" selected>--</option>
        </select>
        <select class="center_information_day" >
        </select>
        <br><br><br>
        <span>电话</span><input class="center_information_phone"/><br><br><br>
        <span>所在地</span><select class="center_information_home">
          <option value="" disabled="disabled" selected>省份</option> 
          <option value="110000">北京市</option>
          <option value="120000">天津市</option>
          <option value="130000">河北省</option>
          <option value="140000">山西省</option>
          <option value="150000">内蒙古自治区</option>
          <option value="210000">辽宁省</option>
          <option value="220000">吉林省</option>
          <option value="230000">黑龙江省</option>
          <option value="310000">上海市</option>
          <option value="320000">江苏省</option>
          <option value="330000">浙江省</option>
          <option value="340000">安徽省</option>
          <option value="350000">福建省</option>
          <option value="360000">江西省</option>
          <option value="370000">山东省</option>
          <option value="410000">河南省</option>
          <option value="420000">湖北省</option>
          <option value="430000">湖南省</option>
          <option value="440000">广东省</option>
          <option value="450000">广西壮族自治区</option>
          <option value="460000">海南省</option>
          <option value="500000">重庆市</option>
          <option value="510000">四川省</option>
          <option value="520000">贵州省</option>
          <option value="530000">云南省</option>
          <option value="540000">西藏自治区</option>
          <option value="610000">陕西省</option>
          <option value="620000">甘肃省</option>
          <option value="630000">青海省</option>
          <option value="640000">宁夏回族自治区</option>
          <option value="650000">新疆维吾尔自治区</option>
          <option value="700000">其他</option></select><br><br><br>
          <input type="button" class="submit_person" value="提交" />
        </form>  
        <form class="center_information_password">
          <span>当前密码</span><input type="password" name=""><br><br>
          <span>新密码</span><input type="password" name=""><br><br>
          <span>密码由6-16个字符组成，区分大小写<br>
          为了提升您的密码安全性，建议使用英文字母加数字或符号的混合密码</span><br><br>
          <span>确认密码</span><input type="password" name=""><br><br>
          <input type="button" name="" class="submit_person" value="提交"><br><br>
        </form>
        <form class="center_information_address">
          <span>收货地址</span><input type="text" name=""><br><br>
          <span>收货人</span><input type="text" name=""><br><br>
          <span>手机号</span><input type="text" name=""><br><br>
          <input type="button" name="" class="submit_person" value="提交"><br><br>
        </form>
      </div>
      <div class="center_car">
        <table class="center_car_lto">
          <thead class="thead">
            <tr class="head-tit">
              <td class="choose-all checkbox-car">
                <input id="exampleCheckbox" type="checkbox" class="selectAll goods-check AllCheck">
                <label for="exampleCheckbox">全选</label>                    </td>
                <td class="name">商品名称</td>
                <td class="single">单价(元)</td>
                <td class="num">数量</td>
                <td class="all">小计(元)</td>
                <td >操作</td>
              </tr>
            </thead>
            <tbody class="tbody-border one-shop">
              <tr class="even"  v-for="(value,key) in carlist">
                <td class="check-input checkbox-car">
                  <input :id="'fruit'+key" v-on:change="forsum" type="checkbox" class="selecthing goods-check GoodsCheck" data-id="5208">
                  <label :for="'fruit'+key"></label>        </td>
                  <td class="eve_img" >
                    <img :src="'http://47.106.111.76/todaystore/public/Home/images/'+value.fruitname+'.jpg'" title="显示85号苹果5斤的详细信息" class="center_car_img">
                    <div class="detial">
                      <span class="things"><a href="/59" title="查看详情">{{value.fruitname}}</a></span>
                    </div>
                  </td>
                  <td class="price">
                    <span class="product-unit-price" :id="'findprice1'+key">{{value.fruitprice}}</span>
                  </td>
                  <td class="">
                    <input class="cut" value="-" type="button" v-on:click="forsum(--value.fruitnum,1,key)">
                    <input class="amount" type="text"  :value="value.fruitnum">
                    <input class="add" value="+" v-on:click="forsum(++value.fruitnum,2,key)" type="button">
                    <span class="measure-unit"></span>
                  </td>
                  <td class="lcount">
                    <span class="subtotal" :id="'findprice'+key">{{value.fruitnum*value.fruitprice}}.00</span>
                  </td>
                  <td class="deleitem">
                    <a class="deleCls" href="#a">删除</a>
                  </td>
                </tr>              
              </tbody>
              <tfoot class="tfoot">
                <tr class="head-tit">
                  <td class="choose-all checkbox-car">
                    <input id="exampleCheckbox" type="checkbox" class="selectAll goods-check AllCheck">
                    <label for="exampleCheckbox">全选</label>                            </td>
                    <td class="all_car">
                      <div class="totle">
                        <span>小计:</span> <span class="cmoney" >{{sum_price}}</span>
                      </div>
                      <div class="totle-js">
                      </div>
                    </td>
                    <td class="ctrl">
                      <div class="pay-web">
                        <div class="can-pay"><a href="#" class="go-pay">去结算</a></div>
                      </div>
                    </td>
                  </tr>
                </tfoot>
              </table>
            </div>
            <div class="center_doing_table">
              <table class="center_car_lto">
                <thead class="thead">
                  <tr class="table_tr no_border">
                   <td >订单号</td>
                   <td>下单时间</td>
                   <td>订单总金额</td>
                   <td>订单状态</td>
                   <td>操作</td>
                 </tr>
               </thead>
               <tbody class="table_tbody">
                <tr class="table_tr">
                  <td>12123197398</td>
                  <td>2018-3-27</td>
                  <td>￥336</td>
                  <td>已发货</td>
                  <td><a>退货</a></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="center_finished_table">
           <table class="center_car_lto">
            <thead class="thead">
              <tr class="table_tr no_border">
               <td >订单号</td>
               <td>下单时间</td>
               <td>订单总金额</td>
               <td>订单状态</td>
               <td>操作</td>
             </tr>
           </thead>
           <tbody class="table_tbody">
            <tr class="table_tr">
              <td>12123197398</td>
              <td>2018-3-27</td>
              <td>￥336</td>
              <td>已发货</td>
              <td><a>退货</a></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="center_tables">
       <table class="center_car_lto">
        <thead class="thead">
          <tr class="table_tr no_border">
           <td >订单号</td>
           <td>下单时间</td>
           <td>订单总金额</td>
           <td>订单状态</td>
           <td>操作</td>
         </tr>
       </thead>
       <tbody class="table_tbody">
        <tr class="table_tr">
          <td>12123197398</td>
          <td>2018-3-27</td>
          <td>￥336</td>
          <td>已发货</td>
          <td><a>退货</a></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="center_fankui">
    <span class="fankui_title">我们一直想要变得更好，更加让您满意。当您先我们反馈后，我们会通知相关人员，给您一个合理的解决方案，并打电话给您。</span>
    <textarea class="fankui_content"></textarea> 
    <br>
    <input type="button" class="submit_fankui" value="提交，感谢您的反馈！" name="">
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
   <script type="text/javascript" src="http://47.106.111.76/todaystore/public/Home/js/index_center.js"></script>
</body>
</html>