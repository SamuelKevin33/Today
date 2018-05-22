new Vue({
  el: '#app_index',
  data: {
    carlist: [],
    sum_price: 0
  },
  mounted: function() { 
    this.judge_car();

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
    this.$http.post('/today/todaystore/index.php?m=Home&c=index&a=initcarlist',formData).then(response => {
      this.carlist=response.data;
   })
  },
  judge_car: function(){
   var url=window.location .href;
   var aa=url.indexOf('=');
   if (aa == -1)
    return "";
  url=url.substring(aa+1);
  if(url==2){
    $(".center_client").children(":not('.center_nav')").hide();
    $(".center_car").show();
    this.init_car();
  }
}
} 
})