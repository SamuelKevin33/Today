 new Vue({
  el: '#back',
  data: {
    listdata: '',
    listarray: [],
    clientplace: '',
    clientpassword: '',
    clientphone: '',
    clientname: ''
  },
  created: function() { 
    this.list();

  },
  computed: {
   
    searchData: function() {
      var that=this;
var search = that.listdata;

if (search) {
return that.listarray.filter(function(product) {
return Object.keys(product).some(function(key) {
return String(product[key]).toLowerCase().indexOf(search) >-1
})
})
}
console.log(that.listarray);
return that.listarray;
},
  },
  methods: {
     sub_newclient: function(){
       var msg = "你确定要添加新用户吗？"; 
 if (confirm(msg)==true){ 
  var formclient =new FormData();
    formclient.append('clientname', this.clientname);
    formclient.append('clientpassword', this.clientpassword);
    formclient.append('clientphone', this.clientphone);
    formclient.append('clientplace', this.clientplace);
     this.$http.post('http://47.106.111.76/todaystore/index.php?m=Home&c=back&a=newclient',formclient).then(response => {
            console.log(response.data);
            location.reload();
          }, response => {
    // error callback
  });

 }else{ 
  return false; 
}
    },
del_client: function(resid){
     var msg = "你确定要删掉编号为"+resid+"的用户吗？"; 
 if (confirm(msg)==true){ 
  var formclient =new FormData();
    formclient.append('id', resid);
     this.$http.post('http://47.106.111.76/todaystore/index.php?m=Home&c=back&a=delclient',formclient).then(response => {
            console.log(response.data);
            if(response.data.info=="ok"){
              alert("删除成功！");
            
            location.reload();
            }
          }, response => {
    // error callback
  });

 }else{ 
  return false; 
}
  
},
    save_client: function(res,resid){
       var name=$("#client"+res+"").children().children('input').eq(0).val();
       var phone=$("#client"+res+"").children().children('input').eq(1).val();
       var place=$("#client"+res+"").children().children('input').eq(2).val();
         var formclient =new FormData();
    formclient.append('id', resid);
    formclient.append('name', name);
    formclient.append('phone', phone);
    formclient.append('place', place);
    console.log(formclient)
    this.$http.post('http://47.106.111.76/todaystore/index.php?m=Home&c=back&a=updateclient',formclient).then(response => {
            // that.fruit=response.data;
            if(response.data.info=="ok"){
              alert("更改成功！");
              location.reload();
            }
            // that.fruitlists= response.data;
            console.log(response.data);
          }, response => {
    // error callback
  });
    },
list: function(){
  var that=this;
  this.$http.get('http://47.106.111.76/todaystore/index.php?m=Home&c=back&a=client_list').then(response => {
            // that.fruit=response.data;
            that.listarray= response.data;
            // console.log(that.fruitlists);
          }, response => {
    // error callback
  });

},
}


})