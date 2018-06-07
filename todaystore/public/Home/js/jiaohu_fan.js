 new Vue({
  el: '#back',
  data: {
    thissearch: '',
    listarray: [],
    whichstatu: ''
    
  },
  created: function() { 
    this.fanlist();

  },
  methods: {

    
fanlist: function(){
  var that=this;
  this.$http.get('http://47.106.111.76/todaystore/index.php?m=Home&c=back&a=fankui').then(response => {
            // that.fruit=response.data;
            that.listarray= response.data;
            // console.log(that.fruitlists);
          }, response => {
    // error callback
  });

},
finish_fankui: function(fankuiid){
  var formstatu1 =new FormData();
    formstatu1.append('listid', fankuiid);
  this.$http.post('http://47.106.111.76/todaystore/index.php?m=Home&c=back&a=fankui_finish',formstatu1).then(response => {
        if(response.data.info=="changed"){
        alert('更改成功！');
        location.reload();
      }else{
        alert('更改失败！');
      }
          }, response => {
    // error callback
  });
},

}


})