new Vue({
  el: '#app_index',
  data: {
    client: {
      name: '',
      phone: '',
      password: '',
    },
    client1: {
      phone: '',
      password: '',
    },
    fruit: [],
    fruitlocal: [],  
    fruitlocal2: [],
    fruitforeign2: [],
    fruitforeign: [],
    onefruit1: [],
    onefruit: [],
    car_num: 1
  },
  mounted: function() { 
    this.name1();
    this.list();
    // this.chinalist();

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
        sessionStorage.removeItem("user_phone");
        this.changeSign=0;
      },
    }
  },
  // 'modalFruit': {
  //    data: function () {
  //     return {
  //       onefruit: []
  //     }
  //   },
  //   props: ['onefruit1'],
  //   mounted: function() { 
  //     // this.start_model();

  //   },
  //   template:'<div><img src=""><span>'+1+'</span><span></span></div>',
  //   methods: {
  //     start_model: function(){console.log(this)}

  //   }
  // }
},
methods: {
  poplogin: function(e){

    if(sessionStorage.getItem("user_name")!=null){
     if(e==2){
      window.location.href="center.html";
    }else if(e==1){
      window.location.href="center.html?tab=2";
    }
  }
  else{
    alert("请先登录");
    window.location.href="log.html";
  }
},
sub_car: function(e){
  if(sessionStorage.getItem("user_name")!=null){
   var formData = new FormData();
   formData.append('num', this.car_num);
   formData.append('fruitid', e);
   formData.append('phone', sessionStorage.getItem("user_phone"));
   this.$http.post('http://47.106.111.76/todaystore/index.php?m=Home&c=index&a=upcar', formData).then(response => {
    if(response.info2="fine"){
      alert('添加成功');
      this.start_model(0);
    }
  }, response => {
    // error callback
  });
 }
 else{
  alert("请先登录");
  window.location.href="log.html";
}

},
start_model: function(e){
  var that=this;
  if(e==0){
          // alert(1);
        }else{

          var y=0;
          var arr=that.fruitlocal2.slice(0,that.fruitlocal2.length);
          var len=arr.length;
          for(var x=0;x<len;x++){
            if(arr[x].fruitid==e){
              that.onefruit1[y]=arr[x];

                // break;
              }
            }
          }
          that.onefruit1.splice(len + 1, 1)
          that.onefruit=that.onefruit1;
          $(".fruit_model_bg").toggleClass("hidden");
          $("#except_model").toggleClass("is_model");
          $("body").toggleClass("nosrcoll");
        },
        start_modelF: function(e){
  var that=this;
  if(e==0){
          // alert(1);
        }else{

          var y=0;
          var arr=that.fruitforeign2.slice(0,that.fruitforeign2.length);
          var len=arr.length;
          for(var x=0;x<len;x++){
            if(arr[x].fruitid==e){
              that.onefruit1[y]=arr[x];

                // break;
              }
            }
          }
          that.onefruit1.splice(len + 1, 1)
          that.onefruit=that.onefruit1;
          $(".fruit_model_bg").toggleClass("hidden");
          $("#except_model").toggleClass("is_model");
          $("body").toggleClass("nosrcoll");
        },
        filterfruitType: function(type){
          // alert(1);
          var that = this;
          var arr=that.fruitlocal2.slice(0,that.fruitlocal2.length);
          var len=arr.length;
          var arr6=new Array();
          var j=0;
          if(type=="默认"){
            // alert(1);
            arr6=arr.slice(0,arr.length);
          }else{
          for (var i=0;i<len;i++){
            if(arr[i].fruittype==type){
              arr6[j]=arr[i];
              j++;
            }
          }
          }
          console.log(arr6);
         Vue.nextTick(function () {
          // alert(1)
            that.fruitlocal =arr6;
          })
        },
        filterfruitTypeF: function(type){
          // alert(1);
          var that = this;
          var arr=that.fruitforeign2.slice(0,that.fruitforeign2.length);
          var len=arr.length;
          var arr6=new Array();
          var j=0;
          if(type=="默认"){
            // alert(1);
            arr6=arr.slice(0,arr.length);
          }else{
          for (var i=0;i<len;i++){
            if(arr[i].fruittype==type){
              arr6[j]=arr[i];
              j++;
            }
          }
          }
          console.log(arr6);
         Vue.nextTick(function () {
          // alert(1)
            that.fruitforeign =arr6;
          })
        },
        orderALL: function(){

          $(".filter_list1").children('a').removeClass();
          $(".filter_list1").children('a').eq(0).addClass('filter_active');
          that= this;
          var arr3=that.fruitlocal2.slice(0,that.fruitlocal2.length);
          Vue.nextTick(function () {
            that.fruitlocal =arr3;
          })
        },
        orderALLF: function(){

          $(".filter_list1").children('a').removeClass();
          $(".filter_list1").children('a').eq(0).addClass('filter_active');
          that= this;
          var arr3=that.fruitforeign2.slice(0,that.fruitforeign2.length);
          Vue.nextTick(function () {
            that.fruitforeign =arr3;
          })
        },
        orderUPc: function(){
          $(".filter_list1").children('a').removeClass();
          $(".filter_list1").children('a').eq(1).addClass('filter_active');
          var that= this;

          var arr1= that.fruitlocal;
          　　var len = arr1.length;
          　　for (var x = 0; x < len; x++) {
            　　　　for (var y = 0; y < len - 1 - x; y++) {
              　　　　　　if (arr1[y].fruitprice - arr1[y+1].fruitprice > 0) { 
                　　　　　　　　var temp = arr1[y+1]; 
                　　　　　　　　arr1[y+1] = arr1[y];
                　　　　　　　　arr1[y] = temp;

              　　　　　　}
            　　　　}
          　　}
          that.fruitlocal.splice(len + 1, 1); 
          that.$set(that.fruitlocal , arr1);
        },
        orderUPcF: function(){
          $(".filter_list1").children('a').removeClass();
          $(".filter_list1").children('a').eq(1).addClass('filter_active');
          var that= this;

          var arr1= that.fruitforeign;
          　　var len = arr1.length;
          　　for (var x = 0; x < len; x++) {
            　　　　for (var y = 0; y < len - 1 - x; y++) {
              　　　　　　if (arr1[y].fruitprice - arr1[y+1].fruitprice > 0) { 
                　　　　　　　　var temp = arr1[y+1]; 
                　　　　　　　　arr1[y+1] = arr1[y];
                　　　　　　　　arr1[y] = temp;

              　　　　　　}
            　　　　}
          　　}
          that.fruitforeign.splice(len + 1, 1); 
          that.$set(that.fruitforeign , arr1);
        },
        orderDOWNc: function(){
          $(".filter_list1").children('a').removeClass();
          $(".filter_list1").children('a').eq(2).addClass('filter_active');
          var that= this;
          var arr2= that.fruitlocal;
          　　var len = arr2.length;
          for (var x = 0; x < len; x++) {
            　　　　for (var y = 0; y < len - 1 - x; y++) {
              　　　　　　if (arr2[y].fruitprice - arr2[y+1].fruitprice < 0) {
                　　　　　　　　var temp = arr2[y+1]; 
                　　　　　　　　arr2[y+1] = arr2[y];
                　　　　　　　　arr2[y] = temp;
              　　　　　　}
            　　　　}
          　　}
          that.fruitlocal.splice(len + 1, 1); 
        },
        orderDOWNcF: function(){
          $(".filter_list1").children('a').removeClass();
          $(".filter_list1").children('a').eq(2).addClass('filter_active');
          var that= this;
          var arr2= that.fruitforeign;
          　　var len = arr2.length;
          for (var x = 0; x < len; x++) {
            　　　　for (var y = 0; y < len - 1 - x; y++) {
              　　　　　　if (arr2[y].fruitprice - arr2[y+1].fruitprice < 0) {
                　　　　　　　　var temp = arr2[y+1]; 
                　　　　　　　　arr2[y+1] = arr2[y];
                　　　　　　　　arr2[y] = temp;
              　　　　　　}
            　　　　}
          　　}
          that.fruitforeign.splice(len + 1, 1); 
        },
        name1: function(){ 
    // alert(sessionStorage.getItem("user_name"));
    if(sessionStorage.getItem("user_name")!=null){
      this.changeSign=true;
         // alert(sessionStorage.getItem("user_name")); 
       }
     },
     list: function(){
      var that=this;
      this.$http.get('http://47.106.111.76/todaystore/index.php?m=Home&c=index&a=initlist').then(response => {
            // that.fruit=response.data;
            var j=0;
            var k=0;
            var fruitlocal1=new Array();
            var fruitforeign1=new Array();
            // console.log(that.fruit);
            // console.log(response);
            for(var i=0;i<response.data.length;i++){
              if(response.data[i].fruitchina==1)
              {
                fruitlocal1[j]=response.data[i];
                that.fruitlocal2[j]=response.data[i];
                j++;
              }
              else if(response.data[i].fruitchina==2){
                fruitforeign1[k]=response.data[i];
                that.fruitforeign2[k]=response.data[i];
                k++;
                
              }
            }
            // var test=new Array();
            // test=fruitlocal1;
            // test[test.length]=1;
            // test.splice(test.length,1);
            //   // that.fruit=response.data;
            //   that.fruitlocal2=test;

            that.fruitlocal=fruitlocal1;
            console.log(fruitlocal1);
            that.fruitforeign=fruitforeign1;
            // return{
            //             fruitlocal:data[0].data.knowledgeList,
            //             alllist:data[1].data.knowledgeList
            //         }
          // this.$set('fruitlocal' , response.data);

           // }
           // console.log(typeof(response.data));
           // console.log(that.fruitlocal);
           // console.log(th.length);
         }, response => {
    // error callback
  });

    },
    // chinalist: function(){
    //   console.log(this.fruit);
    //   var fruit = this.fruit;
    //    return this.fruit.filter(function(item){  
    //                     return item.fruitstatu<3;

    //                   })
    // },
    submitLog: function(){
      var that=this;
      if(that.client1.phone==0||that.client1.password==0){
        alert('不能为空哦！')
      }
      else{
        var logn=/^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
        var logp=/^\d{6}$/;
        if(logn.test(that.client1.phone)==false){
         alert("请输入正确手机号码");
       }else if(logp.test(that.client1.password)==false){
        alert("请输入六位密码");
      }
      else{
       var formData = new FormData();
       formData.append('phone',that.client1.phone);
       formData.append('password',that.client1.password);
       this.$http.post('http://47.106.111.76/todaystore/index.php?m=Home&c=index&a=logit', formData).then(response => {
        alert('登录成功啦！');
        sessionStorage.setItem('user_name', response.data.name);
        sessionStorage.setItem('user_phone', response.data.info);
        window.location.href="tdindex.html";
      }, response => {
    // error callback
  });
     }
   }

 },
 submitSign: function() {
   var that=this;
   if(that.client.name==0||that.client.phone==0||that.client.password==0){
    alert('不能为空哦！')
  }
  else{
    var logn=/^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
    var logp=/^\d{6}$/;
    if(logn.test(that.client.phone)==false){
     alert("请输入正确手机号码");
   }else if(logp.test(that.client.password)==false){
    alert("请输入六位数字密码");
  }
  else{
   var formData = new FormData();
   formData.append('name', that.client.name);
   formData.append('phone',that.client.phone);
   formData.append('password',that.client.password);
   this.$http.post('http://47.106.111.76/todaystore/index.php?m=Home&c=index&a=signit', formData).then(response => {
    if(response.data.res=='oksign'){
    alert('注册成功啦！');
    sessionStorage.setItem('user_name', response.data.name);
    sessionStorage.setItem('user_phone', response.data.info);
    window.location.href="tdindex.html";
  }else{
    alert("注册失败！")
  }
  }, response => {
    alert("此电话号码已被注册");
    // error callback
  });
 }
}

} 
}
})