<?php
namespace Home\Controller;
use \Think\Controller;
use \Think\Model;

class BackController extends Controller {
  public function back(){
    $this->redirect('back_index');
  }
  public function initlist(){
    $fruitlistModel=new \Home\Model\BackModel('fruit');
    $rows=$fruitlistModel->select();
    $this->ajaxReturn($rows); 
  }
 public function business_list(){
  $buslistModel=new \Home\Model\BackModel('client_buylist');
    $rows=$buslistModel->order('listid desc')->select();
    $this->ajaxReturn($rows); 
 }
 public function client_list(){
  $infoModel=new \Home\Model\BackModel('client_information');
    $rows=$infoModel->select();
    $this->ajaxReturn($rows); 
 }
 public function mon_list(){
  $infoModel=new \Home\Model\BackModel('client_money');
    $rows=$infoModel->select();
    $this->ajaxReturn($rows); 
 }
 public function fankui(){
  $fanModel=new \Home\Model\BackModel('fankui');
    $rows=array_reverse($fanModel->select());
    $this->ajaxReturn($rows); 
 }
 public function upmonstatus(){
  $phone=I('phone');
  $money=I('money');
  if(!empty(I('phone'))){
   $model=new \Home\Model\BackModel('client_money');
   $res=$model->where(array('phone' => $phone))->field('nowmoney')->select();
   $money=$res[0]['nowmoney']+$money;
        $data=array(
          'status' => 1,
          'nowmoney' => $money,
          'money' => 0
        );

        if(!($model->where(array('phone' => $phone))->save($data))){
            $this.error('更改失败');
        }
        else{
          $data1 = array(  
            'info' => '12',  
                // 'sessonname' => $user['username']
          );
          $this->ajaxReturn($data1); 
  }
 }
 }
 public function fankui_finish(){
  if(!empty(I('listid'))){
   $model=new \Home\Model\BackModel('fankui');
        $data=array(
          'fankuistatu' => 0
        );
        if(!($model->where(array('fankuiid' => I('listid')))->save($data))){
            $this.error('更改失败');
        }
        else{
          $data1 = array(  
            'info' => 'changed',  
                // 'sessonname' => $user['username']
          );
          $this->ajaxReturn($data1); 
  }
 }
}
public function newclient(){
  $name = I('clientname');
   $pass=I('clientpassword');
   $phone=I('clientphone');
   $place=I('clientplace');
   if(!empty($name)){
       $model=new \Home\Model\BackModel('client_information');
   $data=array(
        'clientname' =>$name,
        'clientphone' =>$phone,
        'clientpwd' =>$pass,
        'clientplace' =>$place,
      );
      if(!($model->add($data))){
        $this->error('注册失败');
      }
      else{
      $data1 = array(  
                'info' => 'oksummer',  
                'name' => $name
                // 'sessonname' => $user['username']
            );
    }
  }
      $this->ajaxReturn($data1); 
}
public function updateclient(){
  $name = I('name');
   $id=I('id');
   $phone=I('phone');
   $place=I('place');
    if(!empty($name)){
       $model=new \Home\Model\BackModel('client_information');
        $data=array(
          'clientname' =>$name,
          'clientphone' =>$phone,
          'clientplace' =>$place,
        );
        if(!($model->where(array('clientid' => $id))->save($data))){
          $this.error('更改失败');
        }
        else{
          $data1 = array(  
            'info' => 'ok',  
                // 'sessonname' => $user['username']
          );
          $this->ajaxReturn($data1);  
        }
    }
  }
  public function imgssave(){   
   $type=I('type');
   $china=I('china');

   $name = I('name');
   $weight=I('weight');
   $price=I('price');
   $left=I('left');
   $status=I('status');



   if(!empty($name)){
    if (!empty($_FILES)) {
            //图片上传设置
      $config = array(   
        'maxSize'    =>    3145728,
        'savePath'   =>    '',  
        'saveName'   =>    $name,
        'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),  
      );
            $upload = new \Think\Upload($config);// 实例化上传类
            $images = $upload->upload();
            //判断是否有图
            if($images){
              $info=$images['Filedata']['savepath'].$images['Filedata']['savename'];
                //返回文件地址和名给JS作回调用
              // echo $info;
              // echo "yesimg!";
            }else{
                $this->error($upload->getError());//获取失败信息
                echo "99";
              }


            }
            $model=new \Home\Model\BackModel('fruit');
            $data=array(
              'fruitname' => $name,
              'fruitchina' => $china,
              'fruitstatu' => $status,
              'fruitleft' => $left,
              'fruittype' => $type,
              'fruitprice' => $price,
              'fruitweight' => $weight,
            );
            if(!($model->add($data))){
              $this->error('注册失败');
            }
            else{
              $data1 = array(  
                'info' => 'yesadd',  
                // 'sessonname' => $user['username']
              );
              $this->ajaxReturn($data1); 
            }
}
//   //       var_dump($_FILES);
// 		// // $bg = I('file');
//     $bg = I('file');//获取图片流
// $url = explode(',',$bg);
// $filename = md5(time()).'.png';//自定义图片名
// $filepath = '/today/todaystore/public/Home/images/';//图片存储路径
// $bgurl = '/images/'.$filename;//图片url ，具体看自己后台环境，我用的是laravel
// file_put_contents($filepath, base64_decode($bg));//保存图片到自定义的路径
// // var_dump($_POST);
// // echo("ok".$filepath);
          }
        public function fruitlist(){
         $fruitlistModel=new \Home\Model\BackModel('fruit');
         $rows=$fruitlistModel->select();
         $this->ajaxReturn($rows); 
       }
       
       public function delclient(){

        $id=I('id');
        var_dump($id);
        if(empty($id)){
          $this.error('内容为空');

        }
        $model=new \Home\Model\BackModel('client_information');
        if(!($model->where(array('clientid' => $id))->delete())){
          $this.error('删除失败');
        }
        else{
          $data1 = array(  
            'info' => 'ok',  
                // 'sessonname' => $user['username']
          );
       }
     }
       public function delfruit(){

        $fruitid=I('id');
        if(empty($fruitid)){
          $this.error('内容为空');

        }
        $model=new \Home\Model\BackModel('fruit');
        if(!($model->where(array('fruitid' => $fruitid))->delete())){
          $this.error('删除失败');
        }
        else{
          $data1 = array(  
            'info' => 'deleted',  
                // 'sessonname' => $user['username']
          );
          $this->ajaxReturn($data1); 
       }
     }

     public function upfruit(){
      $id=I('id');
      $name=I('name');
      $weight=I('fruitweight');
      $price=I('fruitprice');
      $statu=I('fruitstatu');
      if(empty($name)){
          $this.error('内容为空');
        }
        $model=new \Home\Model\BackModel('fruit');
        $data=array(
          'fruitname' =>$name,
          'fruitweight' =>$weight,
          'fruitprice' =>$price,
          'fruitstatu' =>$statu,
        );
        if(!($model->where(array('fruitid' => $id))->save($data))){
          $this.error('更改失败');
        }
        else{
          $data1 = array(  
            'info' => 'changed',  
                // 'sessonname' => $user['username']
          );
          $this->ajaxReturn($data1);  
        }
     }
     public function updateliststatu(){
        $listid=I('listid');
        $liststatus=I('liststatus');
        if(empty($listid)){
          $this.error('内容为空');
        }
        $model=new \Home\Model\BackModel('client_buylist');
        $data=array(
          'liststatus' =>$liststatus
        );
        if(!($model->where(array('listid' => $listid))->save($data))){
          $this.error('更改失败');
        }
        else{
          $data1 = array(  
            'info' => 'ok,changed',  
                // 'sessonname' => $user['username']
          );
          $this->ajaxReturn($data1);  
        }
      }
       public function updateleft(){
        $left=I('fruitleft');
        $name=I('name');
        if(empty($name)){
          $this.error('内容为空');
        }
        $model=new \Home\Model\BackModel('fruit');
        $data=array(
          'name' =>$name,
          'fruitleft' =>$left
        );
        if(!($model->where(array('fruitname' => $name))->save($data))){
          $this.error('更改失败');
        }
        else{
          $data1 = array(  
            'info' => 'ok,changed',  
                // 'sessonname' => $user['username']
          );
          $this->ajaxReturn($data1);  
        }
      }
    }




