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
        <li class="selected_map_bc"><div class="selected_map"></div>首页</li>
        <li><a class="white" href="back_person.html">用户管理</a></li>
        <li><a class="white" href="back_business.html">订单管理</a></li>
        <li><a class="white" href="back_goods.html">商品管理</a></li>
        <li><a class="white" href="back_fankui.html">反馈管理</a></li>
      </ul>
    </nav>
    <div>
      <div class="newstitle">最新动态<span class="font14">（请尽快处理反馈和未完成订单）<span></div>
        <div class="newscontent">
          <label class="newscontent_title">基本信息</label>
          <br><br>
          <ul id="change">
            <li class="newscontent_item bColor1"><span class="data_important">36</span><br>商品种类</li>
            <li class="newscontent_item bColor2"><span class="data_important">5</span><br>未处理反馈</li>
            <li class="newscontent_item bColor3"><span class="data_important">1003</span><br>用户数量</li>
            <li class="newscontent_item bColor4"><span class="data_important">2018/5/5</span><br>今天</li>
          </ul>
        </div>
        <div class="newscontent">
          <label class="newscontent_title">订单消息最新动态</label>
          <br><br>
          <div class="xiaoxilan_div" style="height:160px;overflow: hidden;">

            <ul id="xiaoxilan">
             <li>用户1 2018-4-22 14：31下单啦,请尽快发货</li>
             <li>用户2 2018-4-22 14：32下单啦,请尽快发货</li>
             <li>用户3 2018-4-22 14：33下单啦,请尽快发货</li>
             <li>用户4 2018-4-22 14：34下单啦,请尽快发货</li>
             <li>用户5 2018-4-22 14：35下单啦,请尽快发货</li>
             <li>用户6 2018-4-22 14：36下单啦,请尽快发货</li>
             <li>用户7 2018-4-22 14：37下单啦,请尽快发货</li>
             <li>用户8 2018-4-22 14：38下单啦,请尽快发货</li>
             <li>用户9 2018-4-22 14：39下单啦,请尽快发货</li>
             <li>用户10 2018-4-22 14：28下单啦,请尽快发货</li>
             <li>用户11 2018-4-22 14：48下单啦,请尽快发货</li>
           </ul>
         </div>
         <ul class="mark_color">
           <li>未完成订单 50%</li>
           <li>已完成订单 30%</li>
           <li>退货订单   20%</li>
         </ul>
         <div class="pie_chart">
          <div id="browse-IE" class="hold">
            <div class="pie"></div>
          </div>
          <div id="browse-Safari" class="hold">
            <div class="pie"></div>
          </div>   
        </div>
      </div>
      <div class="newscontent">
        <label class="newscontent_title">近期水果专区</label>
          <br><br>
        <ul id="hot_act">
          <li class="hotfruit">
            <ul class="sign_left_ul">
      <li class="sign_left_list"><img src="/today/todaystore/public/Home/images/sign1.jpg"/></li>
      <li class="sign_left_list"><img src="/today/todaystore/public/Home/images/sign2.jpg"/></li>
      <li class="sign_left_list"><img src="/today/todaystore/public/Home/images/sign3.jpg"/></li>
    </ul></li>
          <li class="hotfruit marginL10">
            <ul class="sign_left_ul ">
      <li class="sign_left_list"><img src="/today/todaystore/public/Home/images/log1.jpg"/></li>
      <li class="sign_left_list"><img src="/today/todaystore/public/Home/images/log2.jpg"/></li>
      <li class="sign_left_list"><img src="/today/todaystore/public/Home/images/log3.jpg"/></li>
    </ul>
  </li>
        </ul>
      </div>

    </div>
  </section>
</div><!-- /.modal-content -->
</div><!-- /.modal -->
</div>
   <script type="text/javascript" src="/today/todaystore/public/Home/js/jiaohu.js"></script>
</body>
</html>