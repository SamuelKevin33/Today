 new Vue({
  el: '#back',
  data: {
    image: '',
    gtype: '',
    gprice: '',
    gweight: '',
    gname: '',
    gchina: '',
    gstatus: '',
    gleft: '',
    fruitlists: [],
    thisleft: '',
    thissearch: ''
  },
  created: function() { 
    this.fruitlist();

  },
  computed: {
    searchData: function() {
      var that=this;
var search = that.thissearch;

if (search) {
return that.fruitlists.filter(function(product) {
return Object.keys(product).some(function(key) {
return String(product[key]).toLowerCase().indexOf(search) >-1
})
})
}
console.log(that.fruitlists);
return this.fruitlists;
},
  },
  methods: {

    add_img: function(e){
      // alert(1);
      this.image=e.target.files[0];
    },
    upload: function() {
      var that=this;
      var formimg = new FormData();
      formimg.append('file', that.image);
      formimg.append('type', that.gtype);
      formimg.append('price', that.gprice);
      formimg.append('weight', that.gweight);
      formimg.append('name', that.gname);
      formimg.append('china', that.gchina);
      formimg.append('status', that.gstatus);
      formimg.append('left', that.gleft);
// console.log(vm.image)
var config={headers:{'Content-Type':'multipart/form-data'}};
this.$http.post('/today/todaystore/index.php?m=Home&c=back&a=imgssave',formimg,config).then(function(response){
      // console.log(response.data);
      // console.log(response);
    })

},
fruitlist: function(){
  var that=this;
  this.$http.get('/today/todaystore/index.php?m=Home&c=back&a=fruitlist').then(response => {
            // that.fruit=response.data;
            that.fruitlists= response.data;
            // console.log(that.fruitlists);
          }, response => {
    // error callback
  });

},
sub_fruitleft: function(res,resname){

  var thisleft=$("#upleft").children().eq(res).children().eq(1).val();
  if(thisleft==0){
    alert("请输入值后在提交")
    return false;
  }
  var msg = "您真的确定要把“"+resname+"”的库存改为"+thisleft+""; 
  if (confirm(msg)==true){ 
    var formleft =new FormData();
    formleft.append('name', resname);
    formleft.append('fruitleft', thisleft)
    this.$http.post('/today/todaystore/index.php?m=Home&c=back&a=updateleft',formleft).then(response => {
            // that.fruit=response.data;
            // that.fruitlists= response.data;
            console.log(response.data);
          }, response => {
    // error callback
  });
  }else{ 
    return false; 
  } 

},
upthisfruit: function(resid,res){
  var formupfruit=new FormData();
  formupfruit.append('id',resid);
    formupfruit.append('name',$("#fru"+res+"").children().eq(1).children().val());
  formupfruit.append('fruitweight',$("#fru"+res+"").children().eq(2).children().val());
  formupfruit.append('fruitprice',$("#fru"+res+"").children().eq(3).children().val());
  formupfruit.append('fruitstatu',$("#fru"+res+"").children().eq(4).children().val());
  this.$http.post('/today/todaystore/index.php?m=Home&c=back&a=upfruit',formupfruit).then(response => {
            // that.fruit=response.data;
            // that.fruitlists= response.data;
            console.log(response.data);
          }, response => {
    // error callback
  });
},
delthisfruit: function(res){
  var formdel =new FormData();
    formdel.append('id', res);
this.$http.post('/today/todaystore/index.php?m=Home&c=back&a=delfruit',formdel).then(response => {
            // that.fruit=response.data;
            // that.fruitlists= response.data;
            console.log(response.data);
          }, response => {
    // error callback
  });
}
}


})