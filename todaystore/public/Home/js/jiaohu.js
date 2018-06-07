 new Vue({
  el: '#thisapp',
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
    thissearch: '',
    fruitlen: '',
    fankuilen: '',
    renlen: '',
    date: '',
    unf:'',
    fin:'',
    tui: '',
    unflist: []
  },
  created: function() { 
    this.fruitlist();
    this.fanlist();
    this.renlist();
    this.buslist();
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
fanlist: function(){
  var that=this;
  this.$http.get('http://47.106.111.76/todaystore/index.php?m=Home&c=back&a=fankui').then(response => {
            // that.fruit=response.data;
            var len= response.data.length;
            var arr=new Array();
            arr=response.data;
            var j=0;
            for(var i=0; i<len; i++){
              if(arr[i].fankuistatu==1){
                j++;
              }
            }
            that.fankuilen=j;
            // console.log(that.fruitlists);
          }, response => {
    // error callback
  });

},
renlist: function(){
  var that=this;
  var currentDT = new Date();
  var y,m,date;  
  y = currentDT.getFullYear(); //四位整数表示的年份  
  m = currentDT.getMonth(); //月  
  date = currentDT.getDate(); //日   
  theDateStr = y+"/"+  (m+1) +"/"+date;  
    that.date=theDateStr;
  this.$http.get('http://47.106.111.76/todaystore/index.php?m=Home&c=back&a=client_list').then(response => {
            // that.fruit=response.data;
            that.renlen= response.data.length;
            // console.log(that.fruitlists);
          }, response => {
    // error callback
  });

},
buslist: function(){
  var that=this;
  this.$http.get('http://47.106.111.76/todaystore/index.php?m=Home&c=back&a=business_list').then(response => {
            // that.fruit=response.data;
            var len=response.data.length;
            var arr1=new Array();
            var arr2=new Array();
            var m=0,n=0;
            arr1=response.data;
            for(var i=0;i<len;i++){
             if(arr1[i].liststatus==1){
              arr2[m]=arr1[i];
                m++;
                
              }else if(arr1[i].liststatus==2){
                n++;
              }
            }
            that.unflist=arr2;
            console.log(that.unflist);
            this.unf=Math.ceil(m*10000/len)/100;
            this.tui=Math.ceil(n*10000/len)/100;
            this.fin=Math.ceil((100-this.unf-this.tui)*100)/100;
            // // 
            // console.log(m);
            // console.log(len);
            m=m*360/len;
            n=n*360/len;
            $('#browse-IE .pie').css('transform','rotate('+n+'deg)');
            $('#browse-Safari').css('transform','rotate('+(n+180)+'deg)');
            $('#browse-Safari .pie').css('transform','rotate('+m+'deg)');
            // console.log(s);
            // that.listarray= response.data;
            // console.log(that.fruitlists);
          }, response => {
    // error callback
  });

},
    add_img: function(e){
      // alert(1);
      this.image=e.target.files[0];
    },
    upload: function() {
      var that=this;
      var c;
      if(that.gchina==true){
         c=2;
      }else{
         c=1;
      }
      var formimg = new FormData();
      formimg.append('file', that.image);
      formimg.append('type', that.gtype);
      formimg.append('price', that.gprice);
      formimg.append('weight', that.gweight);
      formimg.append('name', that.gname);
      formimg.append('china', c);
      formimg.append('status', that.gstatus);
      formimg.append('left', that.gleft);
// console.log(vm.image)
var config={headers:{'Content-Type':'multipart/form-data'}};
this.$http.post('http://47.106.111.76/todaystore/index.php?m=Home&c=back&a=imgssave',formimg,config).then(function(response){
      // console.log(response.data);
      if(response.data.info=="yesadd"){
        alert('添加成功！');
        location.reload();
      }else{
        alert('添加失败！');
      }
      // console.log(response);
    })

},
fruitlist: function(){
  var that=this;
  this.$http.get('http://47.106.111.76/todaystore/index.php?m=Home&c=back&a=fruitlist').then(response => {
            // that.fruit=response.data;
            that.fruitlists= response.data;
            that.fruitlen=response.data.length;
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
    this.$http.post('http://47.106.111.76/todaystore/index.php?m=Home&c=back&a=updateleft',formleft).then(response => {
            // that.fruit=response.data;
            // that.fruitlists= response.data;
            location.reload();
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
  this.$http.post('http://47.106.111.76/todaystore/index.php?m=Home&c=back&a=upfruit',formupfruit).then(response => {
            // that.fruit=response.data;
             if(response.data.info=="changed"){
        alert('修改成功！');
        location.reload();
      }else{
        alert('修改失败！');
      }
            // that.fruitlists= response.data;
            console.log(response.data);
          }, response => {
    // error callback
  });
},
delthisfruit: function(res){
  var formdel =new FormData();
    formdel.append('id', res);
this.$http.post('http://47.106.111.76/todaystore/index.php?m=Home&c=back&a=delfruit',formdel).then(response => {
            // that.fruit=response.data;
            // that.fruitlists= response.data;
            if(response.data.info=="deleted"){
        alert('删除成功！');
        location.reload();
      }else{
        alert('删除失败！');
      }
            console.log(response.data);
          }, response => {
    // error callback
  });
}
}


})