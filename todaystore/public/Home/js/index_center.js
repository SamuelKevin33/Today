new Vue({
  el: '#app_index',
  data: {
    carlist: [],
    sum_price: 0,
    Pname: '',
    Pmonth: '',
    Pday: '',
    Pplace: '',
    Pphone: '',
    oldpwd: '',
    newpwd: '',
    newpwd2: '',
    addadress: '',
    addperson: '',
    addphone: '',
    addresslist: [],
    howmuchs: '',
    pay: '',
    paytab: 0,
    leftmoney: '',
    moneyed: '',
    pickwhich: 999
  },
  mounted: function() { 
    this.judge_car();
    this.init_add();
    this.init_money();
  },
  components: {
    'MyComponentName': {
     data: function () {
      return {
        changeSign: 0
      }
    },
    mounted: function() { 
      this.name1();

    },
    template:'<div class="floatright"><div v-if="changeSign>0"><a class="td_navright_a">'+sessionStorage.getItem("user_name")+',你好</a><a class="td_navright_a" id="logout" v-on:click="logout">注销</a></div><div v-if="changeSign<3"><a  id="sign" class="td_navright_a" href="sign.html">注册</a><a id="log" class="td_navright_a" href="log.html">登录</a></div></div>',
    methods: {
      name1: function(){ 
        if(sessionStorage.getItem("user_name")!=null){
          this.changeSign=3;
        }
      },
      logout: function(){
        sessionStorage.removeItem("user_name");
        this.changeSign=0;
      },
    }
  },
},
methods: { 
  delthiscar: function(e){
    var formData1 = new FormData();
    formData1.append('phone', sessionStorage.getItem("user_phone"));
    formData1.append('fruitid', e);
    this.$http.post('http://47.106.111.76/todaystore/index.php?m=Home&c=index&a=deletethiscar',formData1).then(response => {

      alert("删除成功！");
      location.reload();
    })
  },
  gopay: function(e,key){
    var len=this.carlist.length;
    var havechoose;
  for(var i=0;i<len;i++){
    if($("#fruit"+i+"").is(':checked')){
      var havechoose=111;
    }
  }
  if(havechoose!=111){
    alert("请选择商品！");
  }else{
    if(this.pickwhich==999){
      alert("请选择地址");
    }else{
    if(this.howmuchs<e){
      alert("您的钱包不够支付这笔订单");
    }else{
  for(var i=0;i<len;i++){
    if($("#fruit"+i+"").is(':checked')){
      var fruitid=this.carlist[i].fruitid;
    
    var currentDT = new Date();  
  var y,m,date,day,hs,ms,ss,theDateStr;  
  y = currentDT.getFullYear(); //四位整数表示的年份  
  m = currentDT.getMonth(); //月  
  date = currentDT.getDate(); //日  
  hs = currentDT.getHours(); //时  
  ms = currentDT.getMinutes(); //分  
  ss = currentDT.getSeconds(); //秒  
  theDateStr = y+"年"+  m +"月"+date+"日 "+hs+":"+ms+":"+ss;  
  var add=this.addresslist[key].friendplace;
  var fphone=this.addresslist[key].friendphone;
    var formData1 = new FormData();
    formData1.append('phone', sessionStorage.getItem("user_phone"));
    formData1.append('sum', e);
    formData1.append('date', theDateStr);
    formData1.append('status', 1);
    formData1.append('address', add);
    formData1.append('friendphone', fphone);
    formData1.append('id', currentDT.getTime());
    formData1.append('fruitid', fruitid);
    this.$http.post('http://47.106.111.76/todaystore/index.php?m=Home&c=index&a=addbuylist',formData1).then(response => {
      if(response.data.info="ok,deleted"){
        alert("恭喜下单成功！");
      }
    })
    }}
    }
    }
    }
  },
  deleteadd: function(e,re){
    var formData1 = new FormData();
    formData1.append('phone', sessionStorage.getItem("user_phone"));
    formData1.append('friendphone', e);
    formData1.append('friendplace', re);
    this.$http.post('http://47.106.111.76/todaystore/index.php?m=Home&c=index&a=deleteadd',formData1).then(response => {

      alert("删除成功！");
      location.reload();
    })

  },
  subnewpwd: function(){
    var that=this;
    var thispersonpwd=0;
    var formData1 = new FormData();
    formData1.append('phone', sessionStorage.getItem("user_phone"));
    this.$http.post('http://47.106.111.76/todaystore/index.php?m=Home&c=index&a=selectpwd',formData1).then(response => {
      thispersonpwd=response.data;
      if(that.oldpwd==0||that.newpwd==0||that.newpwd2==0){
        alert('不能为空哦！')
      }
      else{
       if(thispersonpwd==that.oldpwd){
        if(that.newpwd2!=that.newpwd){
         alert("新密码填写不一致！");
       }else if(that.newpwd.length!=6){
        alert("请输入6位密码！");
      }else{
       var formData = new FormData();
       formData.append('password', this.newpwd);
       formData.append('phone', sessionStorage.getItem("user_phone"));
       this.$http.post('http://47.106.111.76/todaystore/index.php?m=Home&c=index&a=upclientpwd',formData).then(response => {
        alert("密码已更改");
      })
     }
   }else{
    alert("当前密码输入有误");
  }
} 
})


  } ,
  subclientinfo: function(){
    var that=this;
    if(that.Pphone==0||that.Pname==0||that.Pmonth==0||that.Pday==0||that.Pplace==0){
      alert('不能为空哦！')
    }
    else{
      var logn=/^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
      var logp=/^\d{6}$/;
      if(logn.test(that.Pphone)==false){
       alert("请输入正确手机号码");
     }else{
       var formData = new FormData();
       var birth=this.Pmonth+'-'+this.Pday;
       formData.append('name', this.Pname);
       formData.append('birth', birth);
       formData.append('place', this.Pplace);
       formData.append('phone', this.Pphone);
       formData.append('oldphone', sessionStorage.getItem("user_phone"));
       this.$http.post('http://47.106.111.76/todaystore/index.php?m=Home&c=index&a=upclientinfo',formData).then(response => {
        alert("信息已更改");
      })
     }
   }

 },
 subclientadd: function(){
  var that=this;
  var len=this.addresslist.length;
  if(len ==5){
    alert("最多可添加5个地址哦！");
  }else{
    if(that.addphone==0||that.addperson==0||that.addadress==0){
      alert('不能为空哦！')
    }
    else{
      var logn=/^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
      var logp=/^\d{6}$/;
      if(logn.test(that.addphone)==false){
       alert("请输入正确手机号码");
     }else{
       var formData = new FormData();
       formData.append('addname', this.addperson);
       formData.append('addadress', this.addadress);
       formData.append('addphone', this.addphone);
       formData.append('phone', sessionStorage.getItem("user_phone"));
       this.$http.post('http://47.106.111.76/todaystore/index.php?m=Home&c=index&a=upclientadd',formData).then(response => {
        alert("地址已添加");
        this.addresslist=response.data.list;
      })
     }
   }
 }
},
forsum: function(s,e,key){
  var sum=0;
  var len=this.carlist.length;
  for(var i=0;i<len;i++){
    if($("#fruit"+i+"").is(':checked')){
      if(i==key && e==1){
        sum=parseInt($("#findprice"+i+"").text())-parseInt($("#findprice1"+i+"").text())+sum;
      }
      else if(i==key && e==2){
        sum=parseInt($("#findprice"+i+"").text())+parseInt($("#findprice1"+i+"").text())+sum;
      }
      else{
        sum=parseInt($("#findprice"+i+"").text())+sum;
      }
    }
  }
  if(this.sum_price!=sum){
    this.sum_price=sum;
  }
},
init_car: function(){
  var formData = new FormData();
  formData.append('phone', sessionStorage.getItem("user_phone"));
  this.$http.post('http://47.106.111.76/todaystore/index.php?m=Home&c=index&a=initcarlist',formData).then(response => {
    this.carlist=response.data;
  })
},
init_add: function(){
  var formData = new FormData();
  formData.append('phone', sessionStorage.getItem("user_phone"));
  this.$http.post('http://47.106.111.76/todaystore/index.php?m=Home&c=index&a=selectaddress',formData).then(response => {
    this.addresslist=response.data;
  })
},
init_money: function(){
  var formData = new FormData();
  formData.append('phone', sessionStorage.getItem("user_phone"));
  this.$http.post('http://47.106.111.76/todaystore/index.php?m=Home&c=index&a=selectmon',formData).then(response => {
    if(response.data.info!=null){
    this.howmuchs=response.data.info;
    this.leftmoney=response.data.info2;
    }
    else{
      this.moneyed=33;
      this.howmuchs=0;
    }
  })
},
judge_car: function(){
 var url=window.location.href;
 var aa=url.indexOf('=');
 if (aa == -1){
  return "";
}
url=url.substring(aa+1);
if(url==2){
  $(".center_client").children(":not('.center_nav')").hide();
  $(".center_car").show();
  this.init_car();
}
},

start_model: function(e,key){
  if(e!=0){
  this.pay=e;
          $(".fruit_model_bg").toggleClass("hidden");
          $("#except_model").toggleClass("is_model");
          $("body").toggleClass("nosrcoll");
          }else{
            
                var msg = "您已支付吗？"; 
  if (confirm(msg)==true){ 
    var currentDT = new Date();  
  var y,m,date,day,hs,ms,ss,theDateStr;  
  y = currentDT.getFullYear(); //四位整数表示的年份  
  m = currentDT.getMonth(); //月  
  date = currentDT.getDate(); //日  
  hs = currentDT.getHours(); //时  
  ms = currentDT.getMinutes(); //分  
  ss = currentDT.getSeconds(); //秒  
  theDateStr = y+"年"+  m +"月"+date+"日 "+hs+":"+ms+":"+ss;  
    var formData = new FormData();
  formData.append('phone', sessionStorage.getItem("user_phone"));
  formData.append('time', theDateStr);
  formData.append('status', 0);
  if(key=1){
              var money=50;
             
            }else if(key=2){
              var money=100;
      
            }else if(key=3){
              var money=300;
       
            }
            else if(key=4){
              var money=500;
         
            }
           
formData.append('money',money);
 if(this.moneyed!=33)  {  
  
  this.$http.post('http://47.106.111.76/todaystore/index.php?m=Home&c=index&a=addmoney',formData).then(response => {
    this.addresslist=response.data;
      })
  }else{
    this.$http.post('http://47.106.111.76/todaystore/index.php?m=Home&c=index&a=upmoney',formData).then(response => {
    this.addresslist=response.data;
      })
  }

        }
          }
        },
        changepay: function(){
          $(".wepay").toggleClass("activepay");
          $(".alipay").toggleClass("activepay");
        }
} 
})