 new Vue({
  el: '#back',
  data: {
    listdata: '',
    listarray: [],
    whichstatu: ''
    
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

    
list: function(){
  var that=this;
  this.$http.get('/today/todaystore/index.php?m=Home&c=back&a=business_list').then(response => {
            // that.fruit=response.data;
            that.listarray= response.data;
            // console.log(that.fruitlists);
          }, response => {
    // error callback
  });

},
upliststatu: function(listid){
  if(this.whichstatu ==0){
   var msg = "你确定把订单状态更改为已完成吗？"; 
  }
  else if(this.whichstatu ==1){
   var msg = "你确定把订单状态更改为未完成吗？"; 
  }
  else if(this.whichstatu ==2){
   var msg = "你确定把订单状态更改为退货中吗？"; 
  }
 if (confirm(msg)==true){ 
  var formstatu =new FormData();
    formstatu.append('listid', listid);
    formstatu.append('liststatus', this.whichstatu);
    this.$http.post('/today/todaystore/index.php?m=Home&c=back&a=updateliststatu',formstatu).then(response => {
            // that.fruit=response.data;
            // that.fruitlists= response.data;
            console.log(response.data);
          location.reload();
          }, response => {
    // error callback
  });
 }else{ 
  return false; 
 } 
}
}


})